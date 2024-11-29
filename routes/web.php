<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserTransaksiController;
use Illuminate\Support\Facades\Route;

// Route Login
Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/todashboard', [AdminAuthController::class, 'doLogin'])->middleware('guest');

// Route Logout
Route::get('logout', [AdminAuthController::class, 'logout'])->middleware('auth');

// Route Register
Route::get('/register', [AdminAuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AdminAuthController::class, 'doRegister'])->middleware('guest');

// Halaman Dashboard
Route::get('/admin', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
})->middleware('auth');


Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin.dashboard.index'
        ];
        return view('admin.layouts.wrapper', $data);
    });

    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);
});

Route::prefix('/')->middleware('auth')->group(function () {
    // Halaman Dashboard User
    Route::get('/', function () {
        $data = [
            'content' => 'user.dashboard.index',
        ];
        return view('user.layouts.wrapper', $data);
    });

    // Route Resource untuk Transaksi
    Route::resource('/transaksi', UserTransaksiController::class);
});
