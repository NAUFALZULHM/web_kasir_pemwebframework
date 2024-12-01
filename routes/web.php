<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserTransaksiController;
use App\Http\Controllers\UserTransaksiDetailController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'index'])->name('login');
    Route::post('/login/todashboard', [AdminAuthController::class, 'doLogin']);
    Route::get('/register', [AdminAuthController::class, 'register'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'doRegister']);
});

// Route Logout
// Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('logout', [AdminAuthController::class, 'logout'])->middleware('auth');

// Halaman Dashboard
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Admin route
// Admin Routes
// Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return redirect()->route('admin.dashboard');
//     })->name('admin');

//     Route::resource('/produk', AdminProdukController::class);
//     Route::resource('/kategori', AdminKategoriController::class);
//     Route::resource('/user', AdminUserController::class);
// });
Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);
});

// User Routes
// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');
//     Route::resource('/transaksi', UserTransaksiController::class);
// });
Route::prefix('/')->middleware('auth')->group(function () {
    // Halaman Dashboard User
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');
    // Route Resource untuk Transaksi
    Route::post('/transaksi/detail/create', [UserTransaksiDetailController::class, 'create']);
    Route::resource('/transaksi', UserTransaksiController::class)->names([
        'edit' => 'transaksi.edit',
    ]);
    
    // Route::resource('/transaksi', UserTransaksiController::class);
});
