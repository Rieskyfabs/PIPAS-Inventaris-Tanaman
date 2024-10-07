<?php

namespace App\Http\Controllers;

use App\Events\PlantCreated;
use App\Events\PlantHarvested;
use App\Helpers\ActivityLogger;
use App\Models\ActivityLog;
use App\Models\TanamanKeluar;
use Intervention\Image\Facades\Image;
use App\Models\Plant;
use App\Models\Category;
use App\Models\Benefit;
use App\Models\Location;
use App\Models\PlantAttributes;
use App\Models\TanamanMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class PlantController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter periode dari request, default 'today'
        $period = $request->input('period', 'today');

        // Tentukan tanggal awal dan akhir berdasarkan periode yang dipilih
        $startDate = Carbon::today(); // Default untuk 'Hari ini'
        $endDate = Carbon::now(); // Hari ini adalah batas akhir

        // Tentukan periode sebelumnya
        $previousStartDate = Carbon::yesterday();
        $previousEndDate = Carbon::yesterday();

        switch ($period) {
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                $previousStartDate = Carbon::now()->subMonth()->startOfMonth();
                $previousEndDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'this_year':
                $startDate = Carbon::now()->startOfYear();
                $previousStartDate = Carbon::now()->subYear()->startOfYear();
                $previousEndDate = Carbon::now()->subYear()->endOfYear();
                break;
        }

        // Ambil data tanaman yang belum dipanen dan group berdasarkan kode tanaman
        $plants = Plant::selectRaw('
            MIN(id) as id, plant_code_id, MIN(plant_name_id) as name, 
            MIN(plant_scientific_name_id) as scientific_name, MIN(type) as type, 
            MIN(category_id) as category_id, MIN(benefit_id) as benefit_id, 
            MIN(location_id) as location_id, MIN(status) as status, 
            MIN(seeding_date) as seeding_date, COUNT(*) as total_quantity, 
            MAX(created_at) as created_at, MIN(harvest_status) as harvest_status,
            SUM(CASE WHEN harvest_status = "siap panen" THEN 1 ELSE 0 END) as ready_to_harvest_count
        ')
        ->groupBy('plant_code_id')
        ->orderBy('created_at', 'desc')
        ->with(['plantAttribute', 'category', 'benefit', 'location'])
        ->get();

        // Hitung total tanaman masuk (belum dipanen)
        $totalPlants = $plants->sum('total_quantity');

        // Hitung total tanaman pada periode sebelumnya
        $previousTotalPlants = Plant::where('harvest_status', '!=', 'sudah dipanen')
        ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
        ->count();

        // Hitung jumlah tanaman masuk (belum dipanen) berdasarkan seeding_date dan periode filter
        $plantsIn = Plant::where('harvest_status', '!=', 'sudah dipanen')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

        // Hitung jumlah tanaman masuk pada periode sebelumnya
        $previousPlantsIn = Plant::where('harvest_status', '!=', 'sudah dipanen')
        ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
        ->count();

        // Hitung jumlah tanaman keluar (sudah dipanen) berdasarkan harvest_date dan periode filter
        $plantsOut = Plant::where('harvest_status', 'sudah dipanen')
        ->whereBetween('harvest_date', [$startDate, $endDate])
        ->count();

        // Hitung jumlah tanaman keluar pada periode sebelumnya
        $previousPlantsOut = Plant::where('harvest_status', 'sudah dipanen')
        ->whereBetween('harvest_date', [$previousStartDate, $previousEndDate])
        ->count();

        // Hitung jumlah berdasarkan status tanaman
        $countByStatus = Plant::selectRaw('status, COUNT(*) as total_quantity')
        ->groupBy('status')
        ->pluck('total_quantity', 'status');

        // Data untuk chart
        $chartData = [
            'series' => $countByStatus->values()->toArray(),
            'labels' => $countByStatus->keys()->toArray()
        ];

        $title = 'Delete Plants!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.pages.plants.index', compact(
            'plants',
            'totalPlants',
            'plantsIn',
            'plantsOut',
            'countByStatus',
            'chartData',
            'period',
        ));
    }   
    public function create()
    {
        $categories = Category::all();
        $benefits = Benefit::all();
        $locations = Location::all();
        $plantAttributes  = PlantAttributes::all();

        return view('admin.pages.plants.create', compact('categories', 'benefits', 'locations', 'plantAttributes'));
    }

    // Function to generate unique numeric kode_tanaman_masuk
    private function generateUniqueKodeTanamanMasuk()
    {
        do {
            $kodeTanamanMasuk = random_int(100000000000, 999999999999); // Generate 12-digit numeric code
        } while (TanamanMasuk::where('kode_tanaman_masuk', 'TM-' . $kodeTanamanMasuk)->exists());

        return $kodeTanamanMasuk;
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'plant_name_id' => 'required',
            'plant_scientific_name_id' => 'required',
            'qr_code' => 'nullable|string|unique:plants,qr_code',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Sayuran',
            'plant_code_id' => 'required|exists:plant_attributes,id',
            'benefit_id' => 'required|exists:benefits,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Ambil tanggal tanam
        $seedingDate = $request->input('seeding_date');

        // Estimasi tanggal panen (misalnya 90 hari setelah tanam)
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +7 days'));

        // Tentukan status panen secara otomatis
        $today = Carbon::now();
        $harvestDateCarbon = Carbon::parse($harvestDate);

        $harvestStatus = 'belum panen';

        // Tentukan jika tanaman siap panen atau sudah dipanen
        if ($harvestDateCarbon->isBefore($today)) {
            $harvestStatus = 'sudah dipanen';
        } elseif ($harvestDateCarbon->copy()->subDays(7)->lessThanOrEqualTo($today)) {
            // 7 hari sebelum panen dianggap siap panen
            $harvestStatus = 'siap panen';
        }

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plants', 'public'); // Menyimpan gambar di folder storage/app/public/plants
        }

        // Buat tanaman baru
        $plant = Plant::create(array_merge(
            $request->all(),
            [
                'harvest_date' => $harvestDate,
                'harvest_status' => $harvestStatus,
                'image' => $imagePath, // Menyimpan path gambar di database
            ]
        ));

        // Generate unique kode_tanaman_masuk with 'TM-' prefix
        $kodeTanamanMasuk = 'TM-' . $this->generateUniqueKodeTanamanMasuk();

        // Store data in the tanaman_masuk table
        TanamanMasuk::create([
            'plant_id' => $plant->id,
            'kode_tanaman_masuk' => $kodeTanamanMasuk,
            'tanggal_masuk' => Carbon::now()->format('Y-m-d'),
            'jumlah_masuk' => 1, // You can modify this based on your requirement
        ]);

        // Mencatat aktivitas
        ActivityLogger::log('create', 'Created a new plant with code: ' . $request->plant_code_id);

        // Tampilkan pesan sukses
        Alert::success('Data Tanaman Ditambahkan', 'Berhasil menambahkan data Tanaman');

        // Redirect ke halaman sebelumnya
        return redirect()->back();
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $categories = Category::all();
        $benefits = Benefit::all();
        $locations = Location::all();
        $plantAttributes = plantAttributes::all();

        return view('admin.pages.plants.edit', compact('plant', 'categories', 'benefits', 'locations', 'plantAttributes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plant_name_id' => 'required|string|max:255',
            'plant_scientific_name_id' => 'required|string|max:255',
            'qr_code' => 'nullable|string|unique:plants,qr_code,' . $id,
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Sayuran',
            'plant_code_id' => 'required|exists:plant_attributes,id',
            'benefit_id' => 'required|exists:benefits,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
        ]);

        $plant = Plant::findOrFail($id);

        $seedingDate = $request->input('seeding_date');
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +90 days'));

        $plant->update(array_merge($request->all(), ['harvest_date' => $harvestDate]));

        ActivityLogger::log('update', 'Updated plant with ID: ' . $plant->id);

        // Tampilkan pesan sukses
        Alert::success('Data Tanaman DiUpdate', 'Berhasil mengUpdate data Tanaman');

        // Redirect ke halaman users
        return redirect()->route('plants');
    }

    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);

        // Hapus record tanaman dari database
        $plant->delete();

        ActivityLogger::log('delete', 'Deleted plant with ID: ' . $plant->id);
        
        Alert::success('Hapus Data Tanaman', 'Berhasil mengHapus data Tanaman');

        return redirect()->back();
    }

    public function show($plantAttribute)
    {
        $today = Carbon::today();

        // Automatically update status to 'siap panen' if harvest_date is less than or equal to today and within the next 7 days
        Plant::whereBetween('harvest_date', [$today, $today->copy()->addDays(7)])
            ->where('harvest_status', '!=', 'siap panen')
            ->where('harvest_status', '!=', 'sudah dipanen')  // Ensure we don't change 'sudah dipanen'
            ->update(['harvest_status' => 'siap panen']);

        // Update status to 'belum panen' if the harvest_date is further than 7 days in the future
        Plant::where('harvest_date', '>', $today->copy()->addDays(7))
            ->where('harvest_status', '!=', 'belum panen')
            ->update(['harvest_status' => 'belum panen']);

        // Retrieve plants based on the plant code
        $plants = Plant::with('category', 'benefit', 'location')
        ->whereHas('plantAttribute', function ($query) use ($plantAttribute) {
            $query->where('plant_code', $plantAttribute);
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        // Retrieve the specific plant based on the plant code for the detail title
        $plantDetail = Plant::with('category', 'benefit', 'location')
        ->whereHas('plantAttribute', function ($query) use ($plantAttribute) {
            $query->where('plant_code', $plantAttribute);
        })->first();

        // Confirmation for deletion
        $title = 'Delete Plants!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.pages.plants.show', compact('plants', 'plantDetail'));
    }

    private function generateUniqueKodeTanamanKeluar()
    {
        do {
            $kodeTanamanKeluar = random_int(100000000000, 999999999999); // Generate 12-digit numeric code
        } while (TanamanKeluar::where('kode_tanaman_keluar', 'TK-' . $kodeTanamanKeluar)->exists());

        return $kodeTanamanKeluar;
    }

    public function panen($id)
    {
        $plant = Plant::findOrFail($id);

        $kodeTanamanKeluar = 'TK-' . $this->generateUniqueKodeTanamanMasuk();

        // Update status menjadi sudah dipanen
        $plant->update([
            'harvest_status' => 'sudah dipanen',
        ]);

        // Masukkan data ke tabel tanaman_keluar
        TanamanKeluar::create([
            'plant_id' => $plant->id,
            'kode_tanaman_keluar' => $kodeTanamanKeluar,
            'tanggal_keluar' => now(),
            'jumlah_keluar' => 1, // Sesuaikan dengan field jumlah tanaman
        ]);

        ActivityLogger::log('Harvested', 'Tanaman DiPanen dengan ID: ' . $plant->id);

        Alert::success('Tanaman DiPanen', 'Tanaman berhasil dipanen dan ditambahkan ke data tanaman keluar.');

        return redirect()->back();
    }


}
