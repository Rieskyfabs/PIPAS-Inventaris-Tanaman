<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;
use App\Models\Plant;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function dashboard(){
        return view('dashboard');
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

        // Ambil semua nama ruangan (lokasi) secara dinamis
        $ruangan = Location::pluck('name')->toArray();

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

        // Mengisi data tanaman per ruangan
        $dataBelumDipanen = $this->fillLocationData($ruangan, $belumDipanen);
        $dataSiapDipanen = $this->fillLocationData($ruangan, $siapDipanen);
        $dataSudahDipanen = $this->fillLocationData($ruangan, $sudahDipanen);

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
        foreach ($ruangan as $key => $value) {
            $locationData[] = $data[$key + 1] ?? 0; // Isi 0 jika data lokasi tersebut tidak ada
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

        // Ambil data tanaman per lokasi
        $dataPerLocation = Plant::select('locations.name as location_name', DB::raw('count(*) as count'))
        ->join('locations', 'plants.location_id', '=', 'locations.id')
        ->groupBy('locations.name')
        ->pluck('count', 'location_name')
        ->toArray();

        // Kirim data ke view
        return view('master-dashboard', compact('plants', 'totalPlantsQuantity', 'totalLocations', 'totalUsers', 'dataPerLocation'));
    }

}
