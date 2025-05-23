<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlantAttributesController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantTypeController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
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
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('landingPage');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('registerSave');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->middleware('throttle:5,1')->name('login.action'); // 5 percakapan per menit

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Route::middleware(['auth', 'user-access:master'])->group(function () {
//     // Dashboard for master
//     Route::get('/master/dashboard', [HomeController::class, 'masterDashboard'])->name('master/dashboard');

//     // Permissions Management
//     Route::prefix('master/permissions')->group(function () {
//         Route::get('/', [PermissionController::class, 'index'])->name('master.permissions');
//         Route::get('/create', [PermissionController::class, 'create'])->name('master.permissions.create');
//         Route::post('/store', [PermissionController::class, 'store'])->name('master.permissions.store');
//         Route::get('/{id}', [PermissionController::class, 'show'])->name('master.permissions.show');
//         Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('master.permissions.edit');
//         Route::put('/{id}', [PermissionController::class, 'update'])->name('master.permissions.update');
//         Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('master.permissions.destroy');
//     });

//     // User Management
//     Route::prefix('master/users')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('master.users');
//         Route::get('/create', [UserController::class, 'create'])->name('master.users.create');
//         Route::post('/store', [UserController::class, 'store'])->name('master.users.store');
//         Route::get('/{id}', [UserController::class, 'show'])->name('master.users.show');
//         Route::get('/{id}/edit', [UserController::class, 'edit'])->name('master.users.edit');
//         Route::put('/{id}', [UserController::class, 'update'])->name('master.users.update');
//         Route::delete('/{id}', [UserController::class, 'destroy'])->name('master.users.destroy');
//     });

//     // Plant Inventory Management
//     Route::prefix('master/inventaris/plants')->group(function () {
//         Route::get('/', [PlantController::class, 'index'])->name('master.plants');
//         Route::get('/create', [PlantController::class, 'create'])->name('master.plants.create');
//         Route::post('/store', [PlantController::class, 'store'])->name('master.plants.store');
//         Route::get('/{plantAttribute}', [PlantController::class, 'show'])->name('master.plants.show');
//         Route::get('/{id}/edit', [PlantController::class, 'edit'])->name('master.plants.edit');
//         Route::put('/{id}', [PlantController::class, 'update'])->name('master.plants.update');
//         Route::delete('/{id}', [PlantController::class, 'destroy'])->name('master.plants.destroy');
//     });

//     // Categories
//     Route::prefix('master/attributes/categories')->group(function () {
//         Route::get('/', [CategoryController::class, 'index'])->name('master.categories');
//         Route::get('/create', [CategoryController::class, 'create'])->name('master.categories.create');
//         Route::post('/store', [CategoryController::class, 'store'])->name('master.categories.store');
//         Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('master.categories.edit');
//         Route::put('/{id}', [CategoryController::class, 'update'])->name('master.categories.update');
//         Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('master.categories.destroy');
//     });

//     // Benefits
//     Route::prefix('master/attributes/benefits')->group(function () {
//         Route::get('/', [BenefitController::class, 'index'])->name('master.benefits');
//         Route::get('/create', [BenefitController::class, 'create'])->name('master.benefits.create');
//         Route::post('/store', [BenefitController::class, 'store'])->name('master.benefits.store');
//         Route::get('/{id}/edit', [BenefitController::class, 'edit'])->name('master.benefits.edit');
//         Route::put('/{id}', [BenefitController::class, 'update'])->name('master.benefits.update');
//         Route::delete('/{id}', [BenefitController::class, 'destroy'])->name('master.benefits.destroy');
//     });

//     // Locations
//     Route::prefix('master/attributes/locations')->group(function () {
//         Route::get('/', [LocationController::class, 'index'])->name('master.locations');
//         Route::get('/create', [LocationController::class, 'create'])->name('master.locations.create');
//         Route::post('/store', [LocationController::class, 'store'])->name('master.locations.store');
//         Route::get('/{id}/edit', [LocationController::class, 'edit'])->name('master.locations.edit');
//         Route::put('/{id}', [LocationController::class, 'update'])->name('master.locations.update');
//         Route::delete('/{id}', [LocationController::class, 'destroy'])->name('master.locations.destroy');
//     });

//     // Plant Attributes
//     Route::prefix('master/attributes/plant-attributes')->group(function () {
//         Route::get('/', [PlantAttributesController::class, 'index'])->name('master.plantAttributes');
//         Route::get('/create', [PlantAttributesController::class, 'create'])->name('master.plantAttributes.create');
//         Route::post('/store', [PlantAttributesController::class, 'store'])->name('master.plantAttributes.store');
//         Route::get('/{id}/edit', [PlantAttributesController::class, 'edit'])->name('master.plantAttributes.edit');
//         Route::put('/{id}', [PlantAttributesController::class, 'update'])->name('master.plantAttributes.update');
//         Route::delete('/{id}', [PlantAttributesController::class, 'destroy'])->name('master.plantAttributes.destroy');
//     });
// });

// Middleware untuk admin access
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::prefix('admin')->group(function (){
        // Dashboard untuk admin
        Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin/dashboard');

        // Tanaman
        Route::prefix('/master-tanaman')->group(function () {
            Route::get('/list-tanaman', [PlantController::class, 'index'])->name('plants');
            Route::get('/tambah-data-tanaman', [PlantController::class, 'create'])->name('plants.create');
            Route::post('/store-tanaman', [PlantController::class, 'store'])->name('plants.store');
            Route::get('/lihat-detail/{plantAttribute}', [PlantController::class, 'show'])->name('plants.show');
            Route::put('/tanaman/{plant}/panen', [PlantController::class, 'panen'])->name('plants.panen');
            Route::get('/{id}/edit-data-tanaman', [PlantController::class, 'edit'])->name('plants.edit');
            Route::put('/{id}/update-data-tanaman', [PlantController::class, 'update'])->name('plants.update');
            Route::delete('/{id}/hapus-data-tanaman', [PlantController::class, 'destroy'])->name('plants.destroy');

            Route::post('/add-new-location', [PlantController::class, 'addNewLocation'])->name('addNewLocation');
        });

        // Kategori
        Route::prefix('/atribut-tanaman/kategori-tanaman')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories');
            Route::get('/tambah-kategori', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/{id}/edit-data-kategori', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/{id}/update-data-kategori', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        // Manfaat
        Route::prefix('/atribut-tanaman/manfaat-tanaman')->group(function () {
            Route::get('/', [BenefitController::class, 'index'])->name('benefits');
            Route::get('/tambah-manfaat', [BenefitController::class, 'create'])->name('benefits.create');
            Route::post('/', [BenefitController::class, 'store'])->name('benefits.store');
            Route::get('/{id}/edit',[BenefitController::class, 'edit'])->name('benefits.edit');
            Route::put('/{id}', [BenefitController::class, 'update'])->name('benefits.update');
            Route::delete('/{id}', [BenefitController::class, 'destroy'])->name('benefits.destroy');
        });

        // Lokasi
        Route::prefix('/atribut-tanaman/lokasi-inventaris')->group(function () {
            Route::get('/', [LocationController::class, 'index'])->name('locations');
            Route::get('/tambah-data-lokasi', [LocationController::class, 'create'])->name('locations.create');
            Route::post('/', [LocationController::class, 'store'])->name('locations.store');
            Route::get('/{id}/edit-data-lokasi', [LocationController::class, 'edit'])->name('locations.edit');
            Route::put('/{id}/update-data-lokasi', [LocationController::class, 'update'])->name('locations.update');
            Route::delete('/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
        });

        // Tipe Tanaman
        Route::prefix('/atribut-tanaman/tipe-tanaman')->group(function () {
            Route::get('/', [PlantTypeController::class, 'index'])->name('plantTypes');
            Route::get('/tambah-data-tipe-tanaman', [PlantTypeController::class, 'create'])->name('plantTypes.create');
            Route::post('/', [PlantTypeController::class, 'store'])->name('plantTypes.store');
            Route::get('/{id}/edit-data-tipe-tanaman', [PlantTypeController::class, 'edit'])->name('plantTypes.edit');
            Route::put('/{id}/update-data-tipe-tanaman', [PlantTypeController::class, 'update'])->name('plantTypes.update');
            Route::delete('/{id}', [PlantTypeController::class, 'destroy'])->name('plantTypes.destroy');
        });

        // Atribute Tanaman
        Route::prefix('/atribut-tanaman/list-atribut-tanaman')->group(function () {
            Route::get('/', action: [PlantAttributesController::class, 'index'])->name('plantAttributes');
            Route::get('/tambah-data-atribut', [PlantAttributesController::class, 'create'])->name('plantAttributes.create');
            Route::post('/', [PlantAttributesController::class, 'store'])->name('plantAttributes.store');
            Route::get('/{id}/edit-data-atribut', [PlantAttributesController::class, 'edit'])->name('plantAttributes.edit');
            Route::put('/{id}/update-data-atribut', [PlantAttributesController::class, 'update'])->name('plantAttributes.update');
            Route::delete('/{id}', [PlantAttributesController::class, 'destroy'])->name('plantAttributes.destroy');

            Route::post('/add-new-category', [PlantAttributesController::class, 'addNewCategory'])->name('addNewCategory');
            Route::post('/add-new-type', [PlantAttributesController::class, 'addNewType'])->name('addNewType');

        });

        // Data Siswa
        Route::prefix('/master-siswa')->group(function () {
            Route::get('/list-siswa', [StudentController::class, 'index'])->name('student-data');
            Route::get('/tambah-data-siswa', [StudentController::class, 'create'])->name('student-data.create');
            Route::post('/store-siswa', [StudentController::class, 'store'])->name('student-data.store');
            Route::get('/lihat-detail/{student}', [StudentController::class, 'show'])->name('student-data.show');
            Route::get('/{id}/edit-data-siswa', [StudentController::class, 'edit'])->name('student-data.edit');
            Route::put('/{id}/update-data-siswa', [StudentController::class, 'update'])->name('student-data.update');
            Route::delete('/{id}/hapus-data-siswa', [StudentController::class, 'destroy'])->name('student-data.destroy');
        });

        // Atribut Siswa: Rombel
        Route::prefix('/atribut-siswa/rombel')->group(function () {
            Route::get('/', [RombelController::class, 'index'])->name('rombel');
            Route::get('/tambah-rombel', [RombelController::class, 'create'])->name('rombel.create');
            Route::post('/', [RombelController::class, 'store'])->name('rombel.store');
            Route::get('/{id}/edit-rombel', [RombelController::class, 'edit'])->name('rombel.edit');
            Route::put('/{id}/update-rombel', [RombelController::class, 'update'])->name('rombel.update');
            Route::delete('/{id}', [RombelController::class, 'destroy'])->name('rombel.destroy');
        });

        // Atribut Siswa: Rayon
        Route::prefix('/atribut-siswa/rayon')->group(function () {
            Route::get('/', [RayonController::class, 'index'])->name('rayon');
            Route::get('/tambah-rayon', [RayonController::class, 'create'])->name('rayon.create');
            Route::post('/', [RayonController::class, 'store'])->name('rayon.store');
            Route::get('/{id}/edit-rayon', [RayonController::class, 'edit'])->name('rayon.edit');
            Route::put('/{id}/update-rayon', [RayonController::class, 'update'])->name('rayon.update');
            Route::delete('/{id}', [RayonController::class, 'destroy'])->name('rayon.destroy');
        });

        // Transaksi
        Route::prefix('/transaksi')->group(function () {
            Route::get('/tanaman-masuk', [TransactionController::class, 'tanamanMasuk'])->name('transactions.tanaman-masuk');
            Route::get('/tanaman-keluar', [TransactionController::class, 'tanamanKeluar'])->name('transactions.tanaman-keluar');
        });

        // User Management
        Route::prefix('/pengaturan/pengguna')->group(function () {
            Route::get('/list-pengguna', [UserController::class, 'index'])->name('users');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit-data-pengguna', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        });

        // Permissions
        Route::prefix('/pengaturan/pengguna/role-permissions/permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('permissions');
            Route::get('/tambah-data-permissions', [PermissionController::class, 'create'])->name('permissions.create');
            Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
            Route::get('/{id}/edit-permissions', [PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('/{id}/update-permissions', [PermissionController::class, 'update'])->name('permissions.update');
            Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        });

        // Roles
        Route::prefix('/pengaturan/pengguna/role-permissions/roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('roles');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/{id}', [RoleController::class, 'show'])->name('roles.show');
            Route::get('/{id}/edit-role', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/{id}', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifications');
        Route::post('/notifikasi/{id}/tandai-telah-dibaca', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    });

});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Tanaman
    Route::prefix('/inventaris/list-tanaman')->group(function () {
        Route::get('/', [PlantController::class, 'userIndex'])->name('users.plants');
        Route::get('/tambah-data-tanaman', [PlantController::class, 'create'])->name('users.plants.create');
        Route::post('/store', [PlantController::class, 'store'])->name('users.plants.store');
        Route::get('lihat-detail/{plantAttribute}', [PlantController::class, 'userShow'])->name('users.plants.show');
        Route::put('/plants/{plant}/panen', [PlantController::class, 'panen'])->name('users.plants.panen');
        Route::get('/{id}/edit-data-tanaman', [PlantController::class, 'edit'])->name('users.plants.edit');
        Route::put('/{id}', [PlantController::class, 'update'])->name('users.plants.update');
        Route::delete('/{id}', [PlantController::class, 'destroy'])->name('users.plants.destroy');
    });

    Route::get('/notifikasi', [NotificationController::class, 'userIndex'])->name('users.notifications');
    Route::post('/notifikasi/{id}/tandai-telah-dibaca', [NotificationController::class, 'usersMarkAsRead'])->name('users.notifications.markAsRead');
});

// Laporan
Route::prefix('/laporan')->group(function () {
    Route::get('/tanaman-masuk', [ReportController::class, 'laporanTanamanMasuk'])->name('reports.tanaman-masuk');
    Route::get('/tanaman-keluar', [ReportController::class, 'laporanTanamanKeluar'])->name('reports.tanaman-keluar');

    // Export routes
    Route::get('/tanaman-masuk/export-excel', [ReportController::class, 'exportExcel'])->name('reports.tanaman-masuk.export.excel');
    Route::get('/tanaman-masuk/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.tanaman-masuk.export.pdf');
    Route::get('/tanaman-masuk/print', [ReportController::class, 'print'])->name('reports.tanaman-masuk.print');

    Route::get('/tanaman-keluar/export-excel', [ReportController::class, 'exportExcel'])->name('reports.tanaman-keluar.export.excel');
    Route::get('/tanaman-keluar/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.tanaman-keluar.export.pdf');
    Route::get('/tanaman-keluar/print', [ReportController::class, 'print'])->name('reports.tanaman-keluar.print');
});

