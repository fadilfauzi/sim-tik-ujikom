<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AssetRequestController;
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssetRequestController as AdminAssetRequestController;    
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| Rute yang dapat diakses tanpa login.
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| General Authenticated Routes (Semua Role: Admin, Teknisi, User)
|--------------------------------------------------------------------------
| Rute ini membutuhkan autentikasi (Auth) dan verifikasi email (Verified).
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // --- Dashboard Role-Based Redirection ---
    // Mengarahkan pengguna ke dashboard yang sesuai berdasarkan peran mereka.
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // --- Modul Tiket (Diakses oleh Semua Role) ---
    
    // Rute resource lengkap untuk tiket
    Route::resource('tickets', TicketController::class)->only(['index', 'show', 'create', 'store']);

    // Rute pengajuan aset - Khusus untuk role 'user'
    Route::resource('asset-requests', AssetRequestController::class)->names([
        'index' => 'asset-requests.index',
        'create' => 'asset-requests.create',
        'store' => 'asset-requests.store',
        'show' => 'asset-requests.show',
    ]);

    // Rute khusus untuk Admin/Teknisi: Update Status dan Penugasan Tiket
    // Middleware 'role:admin,technician' memastikan hanya Admin/Teknisi yang bisa mengakses
    Route::post('tickets/{ticket}/update-status', [TicketController::class, 'updateStatus'])
        ->name('tickets.update.status')
        ->middleware('role:admin,technician');
        
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    
    // 1. Dashboard Admin (dihandle oleh DashboardController melalui /dashboard)
    // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // 2. CRUD Manajemen Pengajuan Aset (Approval System)
    Route::get('asset-requests', [AdminAssetRequestController::class, 'index'])->name('admin.asset-requests.index');
    Route::get('asset-requests/{assetRequest}', [AdminAssetRequestController::class, 'show'])->name('admin.asset-requests.show');
    Route::post('asset-requests/{assetRequest}/approve', [AdminAssetRequestController::class, 'approve'])
        ->name('admin.asset-requests.approve');
    Route::post('asset-requests/{assetRequest}/reject', [AdminAssetRequestController::class, 'reject'])
        ->name('admin.asset-requests.reject');

    // 3. CRUD Manajemen Kategori Aset (Data Master)
    Route::resource('categories', CategoryController::class)->names('admin.categories');

    // 4. CRUD Manajemen Aset (Data Master)
    Route::resource('assets', AssetController::class)->names('admin.assets');

    // 5. CRUD Manajemen Pengguna/Teknisi
    Route::resource('users', UserController::class)->names('admin.users'); 
});


/*
|--------------------------------------------------------------------------
| Authentication Routes (Breeze)
|--------------------------------------------------------------------------
| Rute Login, Register, Logout, Reset Password, dll.
*/

require __DIR__.'/auth.php';