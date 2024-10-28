<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;
use App\Models\Plant;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // Hitung total quantity tanaman
        $totalPlantsQuantity = Plant::count();

        // Hitung total lokasi inventaris
        $totalLocations = Location::count();

        // Hitung total user
        $totalUsers = User::count();

        // Ambil data tanaman dengan pagination
        $plants = Plant::with(['category', 'benefit', 'location', 'plantAttribute', 'tanamanMasuk'])
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        // Ambil data tanaman per lokasi
        $dataPerLocation = Plant::select('locations.name as location_name', DB::raw('count(*) as count'))
        ->join('locations', 'plants.location_id', '=', 'locations.id')
        ->groupBy('locations.name')
        ->pluck('count', 'location_name')
        ->toArray();

        // Fetch room names (locations) along with UUIDs as keys
        $ruangan = Location::pluck('name', 'id')->toArray();

        // Retrieve plant data grouped by `location_id` with UUIDs
        $belumDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'belum panen')
            ->groupBy('location_id')
            ->pluck(
                'count',
                'location_id'
            )
            ->toArray();

        $siapDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'siap panen')
            ->groupBy('location_id')
            ->pluck(
                'count',
                'location_id'
            )
            ->toArray();

        $sudahDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'sudah dipanen')
        ->groupBy('location_id')
        ->pluck(
            'count',
            'location_id'
        )
        ->toArray();

        // Populate data using the updated helper function
        $dataBelumDipanen = $this->fillLocationData(array_keys($ruangan), $belumDipanen);
        $dataSiapDipanen = $this->fillLocationData(array_keys($ruangan), $siapDipanen);
        $dataSudahDipanen = $this->fillLocationData(array_keys($ruangan), $sudahDipanen);

        $activityLogs = ActivityLog::latest()->limit(4)->get();

        // Ambil 5 tanaman terbaru untuk galeri
        $recentPlants = Plant::with('plantAttribute') // Pastikan ada relasi yang sesuai
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal dibuat
        ->take(5) // Mengambil 5 tanaman terbaru
            ->get();

        // Kirim data ke view
        return view('dashboard', compact(
            'plants',
            'totalPlantsQuantity',
            'totalLocations',
            'totalUsers',
            'dataPerLocation',
            'ruangan',
            'dataBelumDipanen',
            'dataSiapDipanen',
            'dataSudahDipanen',
            'activityLogs',
            'recentPlants' // Tambahkan recentPlants ke view
        ));
    }

    public function adminDashboard()
    {
        // Hitung total quantity tanaman
        $totalPlantsQuantity = Plant::count();

        // Hitung total lokasi inventaris
        $totalLocations = Location::count();

        // Hitung total user
        $totalUsers = User::count();

        // Ambil data tanaman dengan pagination
        $plants = Plant::with(['category', 'benefit', 'location', 'plantAttribute', 'tanamanMasuk'])
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        // Ambil data tanaman per lokasi
        $dataPerLocation = Plant::select('locations.name as location_name', DB::raw('count(*) as count'))
        ->join('locations', 'plants.location_id', '=', 'locations.id')
        ->groupBy('locations.name')
        ->pluck('count', 'location_name')
        ->toArray();

        // Fetch room names (locations) along with UUIDs as keys
        $ruangan = Location::pluck('name', 'id')->toArray();

        // Retrieve plant data grouped by `location_id` with UUIDs
        $belumDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'belum panen')
        ->groupBy('location_id')
        ->pluck('count',
            'location_id'
        )
        ->toArray();

        $siapDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'siap panen')
        ->groupBy('location_id')
        ->pluck('count',
            'location_id'
        )
        ->toArray();

        $sudahDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'sudah dipanen')
        ->groupBy('location_id')
        ->pluck('count',
            'location_id'
        )
        ->toArray();

        // Populate data using the updated helper function
        $dataBelumDipanen = $this->fillLocationData(array_keys($ruangan), $belumDipanen);
        $dataSiapDipanen = $this->fillLocationData(array_keys($ruangan), $siapDipanen);
        $dataSudahDipanen = $this->fillLocationData(array_keys($ruangan), $sudahDipanen);

        $activityLogs = ActivityLog::latest()->limit(4)->get();

        // Ambil 5 tanaman terbaru untuk galeri
        $recentPlants = Plant::with('plantAttribute') // Pastikan ada relasi yang sesuai
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal dibuat
        ->take(5) // Mengambil 5 tanaman terbaru
        ->get();

        // Kirim data ke view
        return view('admin-dashboard', compact(
            'plants',
            'totalPlantsQuantity',
            'totalLocations',
            'totalUsers',
            'dataPerLocation',
            'ruangan',
            'dataBelumDipanen',
            'dataSiapDipanen',
            'dataSudahDipanen',
            'activityLogs',
            'recentPlants' // Tambahkan recentPlants ke view
        ));
    }
    /**
     * Helper function untuk mengisi data tanaman per ruangan (lokasi).
     */
    private function fillLocationData($ruangan, $data)
    {
        $locationData = [];
        foreach ($ruangan as $locationName) {
            // Assuming $ruangan contains location names and $data uses UUID as keys
            $locationData[] = $data[$locationName] ?? 0; // Use location name as the key
        }
        return $locationData;
    }

    public function masterDashboard()
    {
        // Hitung total quantity tanaman
        $totalPlantsQuantity = Plant::count();

        // Hitung total lokasi inventaris
        $totalLocations = Location::count();

        // Hitung total user
        $totalUsers = User::count();

        // Ambil data tanaman dengan pagination
        $plants = Plant::with(['category', 'benefit', 'location', 'plantAttribute'])
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        // Ambil data tanaman berdasarkan ruangan dan status panen
        $belumDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'belum panen')
        ->groupBy('location_id')
        ->pluck('count', 'location_id')
        ->toArray();

        $siapDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'siap panen')
        ->groupBy('location_id')
        ->pluck('count', 'location_id')
        ->toArray();

        $sudahDipanen = Plant::select('location_id', DB::raw('count(*) as count'))
        ->where('harvest_status', 'sudah dipanen')
        ->groupBy('location_id')
        ->pluck('count', 'location_id')
        ->toArray();

        // Ambil semua nama ruangan (lokasi) secara dinamis
        $ruangan = Location::pluck('name')->toArray();

        // Ambil 5 tanaman terbaru untuk galeri
        $recentPlants = Plant::with('plantAttribute') // Pastikan ada relasi yang sesuai
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal dibuat
        ->take(5) // Mengambil 5 tanaman terbaru
        ->get();

        // Mengisi data tanaman per ruangan
        $dataBelumDipanen = $this->fillLocationData($ruangan, $belumDipanen);
        $dataSiapDipanen = $this->fillLocationData($ruangan, $siapDipanen);
        $dataSudahDipanen = $this->fillLocationData($ruangan, $sudahDipanen);

        $activityLogs = ActivityLog::latest()->limit(4)->get();

        // Ambil data tanaman per lokasi
        $dataPerLocation = Plant::select('locations.name as location_name', DB::raw('count(*) as count'))
        ->join('locations', 'plants.location_id', '=', 'locations.id')
        ->groupBy('locations.name')
        ->pluck('count', 'location_name')
        ->toArray();

        // Kirim data ke view
        return view('master-dashboard', compact(
            'plants',
            'totalPlantsQuantity',
            'totalLocations',
            'totalUsers',
            'dataPerLocation',
            'ruangan',
            'dataBelumDipanen',
            'dataSiapDipanen',
            'dataSudahDipanen',
            'activityLogs',
            'recentPlants'
        ));
    }

}
