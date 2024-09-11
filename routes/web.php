<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\UserController;
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

// Middleware untuk admin access
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Dashboard untuk admin
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin/dashboard');

    // Daftar pengguna
    Route::get('/admin/users/usersList', [UserController::class, 'index'])->name('users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users/plants', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Tanaman
    Route::get('/admin/inventaris/plants', [PlantController::class, 'index'])->name('plants');
    Route::get('/admin/inventaris/plants/create', [PlantController::class, 'create'])->name('plants.create');
    Route::post('/admin/inventaris/plants', [PlantController::class, 'store'])->name('plants.store');
    Route::get('/admin/inventaris/plants/{plantCode}', [PlantController::class, 'show'])->name('plants.show');
    Route::get('/admin/inventaris/plants/{id}/edit', [PlantController::class, 'edit'])->name('plants.edit');
    Route::put('/admin/inventaris/plants/{id}', [PlantController::class, 'update'])->name('plants.update');
    Route::delete('/admin/inventaris/plants/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');

    // Kategori
    Route::get('/admin/inventaris/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/admin/inventaris/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/inventaris/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/inventaris/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/inventaris/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/inventaris/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Manfaat
    Route::get('/admin/inventaris/benefits', [BenefitController::class, 'index'])->name('benefits');
    Route::get('/admin/inventaris/benefits/create', [BenefitController::class, 'create'])->name('benefits.create');
    Route::post('/admin/inventaris/benefits', [BenefitController::class, 'store'])->name('benefits.store');
    Route::get('/admin/inventaris/benefits/{id}/edit', [BenefitController::class, 'edit'])->name('benefits.edit');
    Route::put('/admin/inventaris/benefits/{id}', [BenefitController::class, 'update'])->name('benefits.update');
    Route::delete('/admin/inventaris/benefits/{id}', [BenefitController::class, 'destroy'])->name('benefits.destroy');

    // Locations
    Route::get('/admin/inventaris/locations', [LocationController::class, 'index'])->name('locations');
    Route::get('/admin/inventaris/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/admin/inventaris/locations', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/admin/inventaris/locations/{id}/edit', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('/admin/inventaris/locations/{id}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/admin/inventaris/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');

});

