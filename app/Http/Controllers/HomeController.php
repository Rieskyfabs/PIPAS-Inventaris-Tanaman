<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

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
        // $totalPlantsQuantity = Plant::sum('quantity');
        $totalPlantsQuantity = Plant::count();

        // Hitung total lokasi inventaris
        $totalLocations = Location::count(); // Asumsi ada model Location

        // Hitung total user
        $totalUsers = User::count(); // Asumsi ada model User

        // Ambil data tanaman dengan pagination
        $plants = Plant::with(['category', 'benefit', 'location', 'plantCode'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // Kirim data ke view
        return view('admin-dashboard', compact('plants', 'totalPlantsQuantity', 'totalLocations', 'totalUsers'));
    }

}
