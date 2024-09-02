<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');

    // Tanaman
    Route::get('/admin/plants', [PlantController::class, 'index'])->name('plants');
    Route::get('/admin/plants/create', [PlantController::class, 'create'])->name('plants.create');
    Route::post('/admin/plants', [PlantController::class, 'store'])->name('plants.store');
    Route::get('/admin/plants/{id}', [PlantController::class, 'show'])->name('plants.show');
    Route::get('/admin/plants/{id}/edit', [PlantController::class, 'edit'])->name('plants.edit');
    Route::put('/admin/plants/{id}', [PlantController::class, 'update'])->name('plants.update');
    Route::delete('/admin/plants/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');

    // Kategori
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Manfaat
    Route::get('/admin/benefits', [BenefitController::class, 'index'])->name('benefits');
    Route::get('/admin/benefits/create', [BenefitController::class, 'create'])->name('benefits.create');
    Route::post('/admin/benefits', [BenefitController::class, 'store'])->name('benefits.store');
    Route::get('/admin/benefits/{id}/edit', [BenefitController::class, 'edit'])->name('benefits.edit');
    Route::put('/admin/benefits/{id}', [BenefitController::class, 'update'])->name('benefits.update');
    Route::delete('/admin/benefits/{id}', [BenefitController::class, 'destroy'])->name('benefits.destroy');

    // Peminjaman tanaman
    Route::get('/admin/borrowing', [BorrowingController::class, 'index'])->name('borrowing');
    Route::get('/admin/borrowing/create', [BorrowingController::class, 'create'])->name('borrowing.create');
    Route::post('/admin/borrowing', [BorrowingController::class, 'store'])->name('borrowing.store');
    Route::get('/admin/borrowing/{id}', [BorrowingController::class, 'show'])->name('borrowing.show');
    Route::get('/admin/borrowing/{id}/edit', [BorrowingController::class, 'edit'])->name('borrowing.edit');
    Route::put('/admin/borrowing/{id}', [BorrowingController::class, 'update'])->name('borrowing.update');
    Route::delete('/admin/borrowing/{id}', [BorrowingController::class, 'destroy'])->name('borrowing.destroy');
});

