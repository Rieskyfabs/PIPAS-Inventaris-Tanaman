<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingPage');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('registerSave');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth', 'user-access:user'])->group(function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin/dashboard');
    Route::get('/admin/students', [StudentController::class, 'index'])->name('students');
    Route::get('/admin/materi', [HomeController::class, 'showMateri'])->name('materi');
    Route::get('/admin/kebersihan', [HomeController::class, 'showKebersihan'])->name('kebersihan');
    Route::get('/admin/tanaman', [HomeController::class, 'showTanaman'])->name('tanaman');
    Route::get('/admin/pemilahan-sampah', [HomeController::class, 'showPemilahanSampah'])->name('pemilahan-sampah');
    Route::get('/admin/observasi', [HomeController::class, 'showObservasi'])->name('observasi');
    Route::get('/admin/portfolio', [HomeController::class, 'showPortfolio'])->name('portfolio');
});

