<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlantCodesController;
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
    Route::prefix('admin/users')->group(function () {
        Route::get('/usersList', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/plants/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Tanaman
    Route::prefix('admin/inventaris/plants')->group(function () {
        Route::get('/', [PlantController::class, 'index'])->name('plants');
        Route::get('/create', [PlantController::class, 'create'])->name('plants.create');
        Route::post('/store', [PlantController::class, 'store'])->name('plants.store');
        Route::get('/{plantCode}', [PlantController::class, 'show'])->name('plants.show');
        Route::get('/{id}/edit', [PlantController::class, 'edit'])->name('plants.edit');
        Route::put('/{id}', [PlantController::class, 'update'])->name('plants.update');
        Route::delete('/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');
    });

    // Kategori
    Route::prefix('admin/attributes/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Manfaat
    Route::prefix('admin/attributes/benefits')->group(function () {
        Route::get('/', [BenefitController::class, 'index'])->name('benefits');
        Route::get('/create', [BenefitController::class, 'create'])->name('benefits.create');
        Route::post('/', [BenefitController::class, 'store'])->name('benefits.store');
        Route::get('/{id}/edit', [BenefitController::class, 'edit'])->name('benefits.edit');
        Route::put('/{id}', [BenefitController::class, 'update'])->name('benefits.update');
        Route::delete('/{id}', [BenefitController::class, 'destroy'])->name('benefits.destroy');
    });

    // Lokasi
    Route::prefix('admin/attributes/locations')->group(function () {
        Route::get('/', [LocationController::class, 'index'])->name('locations');
        Route::get('/create', [LocationController::class, 'create'])->name('locations.create');
        Route::post('/', [LocationController::class, 'store'])->name('locations.store');
        Route::get('/{id}/edit', [LocationController::class, 'edit'])->name('locations.edit');
        Route::put('/{id}', [LocationController::class, 'update'])->name('locations.update');
        Route::delete('/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
    });

    // Lokasi
    Route::prefix('admin/attributes/plant-attributes')->group(function () {
        Route::get('/', [PlantCodesController::class, 'index'])->name('plantCodes');
        Route::get('/create', [PlantCodesController::class, 'create'])->name('plantCodes.create');
        Route::post('/', [PlantCodesController::class, 'store'])->name('plantCodes.store');
        Route::get('/{id}/edit', [PlantCodesController::class, 'edit'])->name('plantCodes.edit');
        Route::put('/{id}', [PlantCodesController::class, 'update'])->name('plantCodes.update');
        Route::delete('/{id}', [PlantCodesController::class, 'destroy'])->name('plantCodes.destroy');
    });

});