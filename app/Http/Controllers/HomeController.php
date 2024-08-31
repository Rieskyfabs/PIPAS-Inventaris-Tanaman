<?php

namespace App\Http\Controllers;

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
        return view('admin-dashboard');
    }
}
