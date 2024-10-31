<?php

namespace App\Http\Controllers;

use App\Events\PlantCreated;
use App\Events\PlantHarvested;
use App\Helpers\ActivityLogger;
use App\Models\ActivityLog;
use App\Models\TanamanKeluar;
use App\Models\TipeTanaman;
use Illuminate\Support\Facades\Validator;
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
use Illuminate\Support\HtmlString;


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
            MIN(plant_scientific_name_id) as scientific_name, MIN(type_id) as type_id, 
            MIN(category_id) as category_id, MIN(benefit_id) as benefit_id, 
            MIN(location_id) as location_id, MIN(status) as status, 
            MIN(seeding_date) as seeding_date, COUNT(*) as total_quantity, 
            MAX(created_at) as created_at, MIN(harvest_status) as harvest_status,
            SUM(CASE WHEN harvest_status = "siap panen" THEN 1 ELSE 0 END) as ready_to_harvest_count
        ')
        ->groupBy('plant_code_id')
        ->orderBy('created_at', 'desc')
        ->with(['plantAttribute', 'category', 'location', 'plantType'])
        ->get();

        // Hitung total tanaman masuk (belum dipanen)
        $totalPlants = $plants->sum('total_quantity');

        // Hitung total tanaman pada periode sebelumnya
        $previousTotalPlants = Plant::where('harvest_status', '!=', 'sudah dipanen')
        ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
        ->count();

        // Hitung jumlah tanaman masuk (belum dipanen) berdasarkan seeding_date dan periode filter
        // $plantsIn = Plant::where('harvest_status', '!=', 'sudah dipanen')
        // ->whereBetween('created_at', [$startDate, $endDate])
        // ->count();

        $plantsIn = Plant::whereBetween('created_at', [$startDate, $endDate])->count();

        // Hitung jumlah tanaman masuk pada periode sebelumnya
        $previousPlantsIn = Plant::where('harvest_status', '!=', 'sudah dipanen')
        ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
        ->count();

        // Hitung jumlah tanaman keluar (sudah dipanen) berdasarkan harvest_date dan periode filter
        // $plantsOut = Plant::where('harvest_status', 'sudah dipanen')
        // ->whereBetween('harvest_date', [$startDate, $endDate])
        // ->count();

        // Hitung jumlah tanaman keluar (sudah dipanen) berdasarkan updated_at
        $plantsOut = Plant::where('harvest_status', 'sudah dipanen')
        ->whereBetween('updated_at', [$startDate, $endDate])
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

        $title = 'Hapus Data Tanaman';
        $text = "Apakah anda yakin ingin menghapus data tanaman ini?";
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
        // $benefits = Benefit::all();
        $locations = Location::all();
        $plantTypes = TipeTanaman::all();
        $plantAttributes  = PlantAttributes::all();

        return view('admin.pages.plants.create', compact('categories', 'plantTypes', 'locations', 'plantAttributes'));
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
            'type_id' => 'required|exists:tipe_tanaman,id',
            'plant_code_id' => 'required|exists:plant_attributes,id',
            'benefit_id' => 'required|exists:plant_attributes,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
            'harvest_date' => 'required|date', // Tanggal panen diinput manual
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plants', 'public');
        }

        // Buat tanaman baru tanpa logika tanggal panen otomatis
        $plant = Plant::create(array_merge(
            $request->all(),
            ['image' => $imagePath]
        ));

        // Kode Tanaman Masuk
        $kodeTanamanMasuk = 'TM-' . $this->generateUniqueKodeTanamanMasuk();
        TanamanMasuk::create([
            'plant_id' => $plant->id,
            'kode_tanaman_masuk' => $kodeTanamanMasuk,
            'tanggal_masuk' => Carbon::now()->format('Y-m-d'),
            'jumlah_masuk' => 1,
        ]);

        // Log aktivitas
        $location = Location::find($request->location_id);
        $locationName = $location ? $location->name : 'Lokasi tidak ditemukan';
        ActivityLogger::log(
            'Create',
            'Menambahkan data tanaman di lokasi: <b>' . e($locationName) . '</b>'
        );

        // Tampilkan pesan sukses
        Alert::success('Data Tanaman Ditambahkan', 'Berhasil menambahkan data Tanaman');
        return redirect()->back();
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $categories = Category::all();
        $plantTypes = TipeTanaman::all();
        $locations = Location::all();
        $plantAttributes = plantAttributes::all();

        return view('admin.pages.plants.edit', compact('plant', 'categories', 'plantTypes', 'locations', 'plantAttributes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plant_name_id' => 'required|string|max:255',
            'plant_scientific_name_id' => 'required|string|max:255',
            'qr_code' => 'nullable|string|unique:plants,qr_code,' . $id,
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:tipe_tanaman,id',
            'plant_code_id' => 'required|exists:plant_attributes,id',
            'benefit_id' => 'required|exists:plant_attributes,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
            'harvest_date' => 'required|date', // Tanggal panen diinput manual
        ]);

        $plant = Plant::findOrFail($id);

        // Ambil nama lokasi berdasarkan location_id
        $location = Location::find($request->location_id);

        // Update data tanaman tanpa logika tanggal panen otomatis
        $plant->update($request->all());

        // Log aktivitas
        ActivityLogger::log(
            'update',
            'Mengupdate tanaman dengan ID: ' . $plant->id
        );

        // Tampilkan pesan sukses
        Alert::success('Data Tanaman DiUpdate', 'Berhasil mengUpdate data Tanaman');

        return redirect()->route('plants');
    }


    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);

        // Hapus record tanaman dari database
        $plant->delete();

        ActivityLogger::log('delete', 'Data tanaman di hapus dengan ID: ' . $plant->id);
        
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
        $plants = Plant::with('category', 'plantType', 'location')
        ->whereHas('plantAttribute', function ($query) use ($plantAttribute) {
            $query->where('plant_code', $plantAttribute);
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        // Retrieve the specific plant based on the plant code for the detail title
        $plantDetail = Plant::with('category', 'plantType', 'location')
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

        // Cek apakah relasi plantAttribute dan location tersedia
        $namaTanaman = $plant->plantAttribute->name ?? 'Nama tanaman tidak tersedia';
        $namaLokasi = $plant->location->name ?? 'Lokasi tidak tersedia';

        // Catat aktivitas panen ke log dengan nama tanaman dan lokasi dalam format bold
        ActivityLogger::log(
            'Harvested',
            new HtmlString('Tanaman <b>' . $namaTanaman . '</b> dipanen di lokasi: <b>' . $namaLokasi . '</b>')
        );

        Alert::success('Tanaman Dipanen', 'Tanaman berhasil dipanen dan ditambahkan ke data tanaman keluar.');

        return redirect()->back();
    }

    public function addNewLocation(Request $request)
    {
        // Validasi nama lokasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:locations,name',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        // Menyimpan data lokasi baru
        $location = Location::create([
            'name' => $request->input('name')
        ]);

        return response()->json([
            'success' => true,
            'id' => $location->id,
            'name' => $location->name
        ]);
    }

    // USERS 
    public function userIndex(Request $request)
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
            MIN(plant_scientific_name_id) as scientific_name, MIN(type_id) as type_id, 
            MIN(category_id) as category_id, MIN(benefit_id) as benefit_id, 
            MIN(location_id) as location_id, MIN(status) as status, 
            MIN(seeding_date) as seeding_date, COUNT(*) as total_quantity, 
            MAX(created_at) as created_at, MIN(harvest_status) as harvest_status,
            SUM(CASE WHEN harvest_status = "siap panen" THEN 1 ELSE 0 END) as ready_to_harvest_count
        ')
            ->groupBy('plant_code_id')
            ->orderBy('created_at', 'desc')
            ->with(['plantAttribute', 'category', 'plantType', 'location'])
            ->get();

        // Hitung total tanaman masuk (belum dipanen)
        $totalPlants = $plants->sum('total_quantity');

        // Hitung total tanaman pada periode sebelumnya
        $previousTotalPlants = Plant::where('harvest_status', '!=', 'sudah dipanen')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->count();

        // Hitung jumlah tanaman masuk (belum dipanen) berdasarkan seeding_date dan periode filter
        // $plantsIn = Plant::where('harvest_status', '!=', 'sudah dipanen')
        // ->whereBetween('created_at', [$startDate, $endDate])
        // ->count();

        $plantsIn = Plant::whereBetween('created_at', [$startDate, $endDate])->count();

        // Hitung jumlah tanaman masuk pada periode sebelumnya
        $previousPlantsIn = Plant::where('harvest_status', '!=', 'sudah dipanen')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->count();

        // Hitung jumlah tanaman keluar (sudah dipanen) berdasarkan harvest_date dan periode filter
        // $plantsOut = Plant::where('harvest_status', 'sudah dipanen')
        // ->whereBetween('harvest_date', [$startDate, $endDate])
        // ->count();

        // Hitung jumlah tanaman keluar (sudah dipanen) berdasarkan updated_at
        $plantsOut = Plant::where('harvest_status', 'sudah dipanen')
            ->whereBetween('updated_at', [$startDate, $endDate])
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

        return view('pages.plants.index', compact(
            'plants',
            'totalPlants',
            'plantsIn',
            'plantsOut',
            'countByStatus',
            'chartData',
            'period',
        ));
    }

    public function userShow($plantAttribute)
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

        return view('pages.plants.show', compact('plants', 'plantDetail'));
    }


}
