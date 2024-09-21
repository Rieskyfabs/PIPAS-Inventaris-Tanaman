<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
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
        $plants = Plant::with(['category', 'benefit', 'location', 'plantCode'])
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        // Ambil data tanaman per lokasi
        $dataPerLocation = Plant::select('locations.name as location_name', DB::raw('count(*) as count'))
        ->join('locations', 'plants.location_id', '=', 'locations.id')
        ->groupBy('locations.name')
        ->pluck('count', 'location_name')
        ->toArray();

        // Kirim data ke view
        return view('admin-dashboard', compact('plants', 'totalPlantsQuantity', 'totalLocations', 'totalUsers', 'dataPerLocation'));
    }

}
