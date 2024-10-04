<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlantAttributesController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
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

Route::middleware(['auth', 'user-access:master'])->group(function () {
    // Dashboard for master
    Route::get('/master/dashboard', [HomeController::class, 'masterDashboard'])->name('master/dashboard');

    // Permissions Management
    Route::prefix('master/permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('master.permissions');
        Route::get('/create', [PermissionController::class, 'create'])->name('master.permissions.create');
        Route::post('/store', [PermissionController::class, 'store'])->name('master.permissions.store');
        Route::get('/{id}', [PermissionController::class, 'show'])->name('master.permissions.show');
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('master.permissions.edit');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('master.permissions.update');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('master.permissions.destroy');
    });

    // User Management
    Route::prefix('master/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('master.users');
        Route::get('/create', [UserController::class, 'create'])->name('master.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('master.users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('master.users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('master.users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('master.users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('master.users.destroy');
    });

    // Plant Inventory Management
    Route::prefix('master/inventaris/plants')->group(function () {
        Route::get('/', [PlantController::class, 'index'])->name('master.plants');
        Route::get('/create', [PlantController::class, 'create'])->name('master.plants.create');
        Route::post('/store', [PlantController::class, 'store'])->name('master.plants.store');
        Route::get('/{plantAttribute}', [PlantController::class, 'show'])->name('master.plants.show');
        Route::get('/{id}/edit', [PlantController::class, 'edit'])->name('master.plants.edit');
        Route::put('/{id}', [PlantController::class, 'update'])->name('master.plants.update');
        Route::delete('/{id}', [PlantController::class, 'destroy'])->name('master.plants.destroy');
    });

    // Categories
    Route::prefix('master/attributes/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('master.categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('master.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('master.categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('master.categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('master.categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('master.categories.destroy');
    });

    // Benefits
    Route::prefix('master/attributes/benefits')->group(function () {
        Route::get('/', [BenefitController::class, 'index'])->name('master.benefits');
        Route::get('/create', [BenefitController::class, 'create'])->name('master.benefits.create');
        Route::post('/store', [BenefitController::class, 'store'])->name('master.benefits.store');
        Route::get('/{id}/edit', [BenefitController::class, 'edit'])->name('master.benefits.edit');
        Route::put('/{id}', [BenefitController::class, 'update'])->name('master.benefits.update');
        Route::delete('/{id}', [BenefitController::class, 'destroy'])->name('master.benefits.destroy');
    });

    // Locations
    Route::prefix('master/attributes/locations')->group(function () {
        Route::get('/', [LocationController::class, 'index'])->name('master.locations');
        Route::get('/create', [LocationController::class, 'create'])->name('master.locations.create');
        Route::post('/store', [LocationController::class, 'store'])->name('master.locations.store');
        Route::get('/{id}/edit', [LocationController::class, 'edit'])->name('master.locations.edit');
        Route::put('/{id}', [LocationController::class, 'update'])->name('master.locations.update');
        Route::delete('/{id}', [LocationController::class, 'destroy'])->name('master.locations.destroy');
    });

    // Plant Attributes
    Route::prefix('master/attributes/plant-attributes')->group(function () {
        Route::get('/', [PlantAttributesController::class, 'index'])->name('master.plantAttributes');
        Route::get('/create', [PlantAttributesController::class, 'create'])->name('master.plantAttributes.create');
        Route::post('/store', [PlantAttributesController::class, 'store'])->name('master.plantAttributes.store');
        Route::get('/{id}/edit', [PlantAttributesController::class, 'edit'])->name('master.plantAttributes.edit');
        Route::put('/{id}', [PlantAttributesController::class, 'update'])->name('master.plantAttributes.update');
        Route::delete('/{id}', [PlantAttributesController::class, 'destroy'])->name('master.plantAttributes.destroy');
    });
});

// Middleware untuk admin access
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Dashboard untuk admin
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin/dashboard');

    // Tanaman
    Route::prefix('admin/inventaris/plants')->group(function () {
        Route::get('/', [PlantController::class, 'index'])->name('plants');
        Route::get('/create', [PlantController::class, 'create'])->name('plants.create');
        Route::post('/store', [PlantController::class, 'store'])->name('plants.store');
        Route::get('/{plantAttribute}', [PlantController::class, 'show'])->name('plants.show');
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
        Route::get('/', [PlantAttributesController::class, 'index'])->name('plantAttributes');
        Route::get('/create', [PlantAttributesController::class, 'create'])->name('plantAttributes.create');
        Route::post('/', [PlantAttributesController::class, 'store'])->name('plantAttributes.store');
        Route::get('/{id}/edit', [PlantAttributesController::class, 'edit'])->name('plantAttributes.edit');
        Route::put('/{id}', [PlantAttributesController::class, 'update'])->name('plantAttributes.update');
        Route::delete('/{id}', [PlantAttributesController::class, 'destroy'])->name('plantAttributes.destroy');
    });

    // Transaksi
    Route::prefix('admin/transactions')->group(function () {
        Route::get('/tanaman-masuk', [TransactionController::class, 'tanamanMasuk'])->name('transactions.tanaman-masuk');
        Route::get('/tanaman-keluar', [TransactionController::class, 'tanamanKeluar'])->name('transactions.tanaman-keluar');
    });

    // User Management
    Route::prefix('admin/users')->group(function () {
        Route::get('/usersList', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Permissions
    Route::prefix('admin/role-permissions/permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permissions');
        Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    });


    // Roles
    Route::prefix('admin/role-permissions/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/{id}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});
