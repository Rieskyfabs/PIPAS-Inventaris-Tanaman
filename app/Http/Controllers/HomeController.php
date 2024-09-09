<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('dashboard');
    }
    public function adminDashboard(){
        $plants = Plant::with(['category', 'benefit', 'location'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin-dashboard', compact('plants'));

    }
}
