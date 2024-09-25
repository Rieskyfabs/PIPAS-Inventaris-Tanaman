<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\ActivityLog;
use App\Models\Plant;
use App\Models\Category;
use App\Models\Benefit;
use App\Models\Location;
use App\Models\PlantCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        // Ambil data tanaman dan group berdasarkan kode tanaman
        $plants = Plant::selectRaw('
            MIN(id) as id, plant_code_id, MIN(plant_name_id) as name, 
            MIN(plant_scientific_name_id) as scientific_name, MIN(type) as type, 
            MIN(category_id) as category_id, MIN(benefit_id) as benefit_id, 
            MIN(location_id) as location_id, MIN(status) as status, 
            MIN(seeding_date) as seeding_date, COUNT(*) as total_quantity, 
            MAX(created_at) as created_at, MIN(harvest_status) as harvest_status
        ')
        ->groupBy('plant_code_id')
        ->orderBy('created_at', 'desc')
        ->with(['plantCode', 'category', 'benefit', 'location'])
        ->get();

        // Hitung total tanaman
        $totalPlants = $plants->sum('total_quantity');

        // Hitung total tanaman pada periode sebelumnya
        $previousTotalPlants = Plant::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // Hitung jumlah tanaman masuk berdasarkan seeding_date dan periode filter
        $plantsIn = Plant::whereBetween('created_at', [$startDate, $endDate])->count();

        // Hitung jumlah tanaman masuk pada periode sebelumnya
        $previousPlantsIn = Plant::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // Hitung jumlah tanaman keluar berdasarkan harvest_date dan periode filter
        $plantsOut = Plant::whereBetween('harvest_date', [$startDate, $endDate])->count();

        // Hitung jumlah tanaman keluar pada periode sebelumnya
        $previousPlantsOut = Plant::whereBetween('harvest_date', [$previousStartDate, $previousEndDate])->count();

        // Hitung jumlah berdasarkan status tanaman
        $countByStatus = Plant::selectRaw('status, COUNT(*) as total_quantity')
        ->groupBy('status')
        ->pluck('total_quantity', 'status');

        // Data untuk chart
        $chartData = [
            'series' => $countByStatus->values()->toArray(),
            'labels' => $countByStatus->keys()->toArray()
        ];

        $activityLogs = ActivityLog::latest()->limit(5)->get();

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
            'activityLogs'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        $benefits = Benefit::all();
        $locations = Location::all();
        $plantCodes  = PlantCode::all();

        return view('admin.pages.plants.create', compact('categories', 'benefits', 'locations', 'plantCodes'));
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
            'plant_code_id' => 'required|exists:plant_codes,id',
            'benefit_id' => 'required|exists:benefits,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
        ]);

        // Ambil tanggal tanam
        $seedingDate = $request->input('seeding_date');

        // Estimasi tanggal panen (misalnya 90 hari setelah tanam)
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +90 days'));

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

        // Buat tanaman baru dengan data yang digabung dan tambahkan harvest_status serta harvest_date
        Plant::create(array_merge(
            $request->all(),
            [
                'harvest_date' => $harvestDate,
                'harvest_status' => $harvestStatus,
            ]
        ));

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
        $plantCodes = PlantCode::all();

        return view('admin.pages.plants.edit', compact('plant', 'categories', 'benefits', 'locations', 'plantCodes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plant_name_id' => 'required|string|max:255',
            'plant_scientific_name_id' => 'required|string|max:255',
            'qr_code' => 'nullable|string|unique:plants,qr_code,' . $id,
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Sayuran',
            'plant_code_id' => 'required|exists:plant_codes,id',
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

        return redirect()->route('plants');
    }

    public function show($plantCode)
    {
        // Update harvest status based on harvest_date automatically
        $today = Carbon::today();

        // Update status to 'sudah dipanen' if harvest_date is less than or equal to today
        Plant::where('harvest_date', '<=', $today)
            ->where('harvest_status', '!=', 'sudah dipanen')
            ->update(['harvest_status' => 'sudah dipanen']);

        // Update status to 'siap panen' if harvest_date is within the next 7 days
        Plant::whereBetween('harvest_date', [$today, $today->copy()->addDays(7)])
            ->where('harvest_status', '!=', 'siap panen')
            ->where('harvest_status', '!=', 'sudah dipanen')
            ->update(['harvest_status' => 'siap panen']);

        // Update status to 'belum panen' if harvest_date is in the future
        Plant::where('harvest_date', '>', $today->copy()->addDays(7))
            ->where('harvest_status', '!=', 'belum panen')
            ->update(['harvest_status' => 'belum panen']);

        // Retrieve plant data based on the selected plant code
        $plants = Plant::with('category', 'benefit', 'location')
            ->whereHas('plantCode', function ($query) use ($plantCode) {
                $query->where('plant_code', $plantCode);
            })->get();

        // Confirmation for deletion
        $title = 'Delete Plants!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.pages.plants.show', compact('plants'));
    }

}
