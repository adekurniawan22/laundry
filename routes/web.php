<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Owner\{
    CabangController,
    DashboardController as OwnerDashboardController,
    KategoriController,
    PelangganController as OwnerPelangganController,
    UserController,
    TransaksiController as OwnerTransaksiController
};
use App\Http\Controllers\Kasir\{
    DashboardController as KasirDashboardController,
    PelangganController as KasirPelangganController,
    TransaksiController
};

// Auth Routes
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticationLogin'])->name('user.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Owner Routes
Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('store');
        Route::get('{id_user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('{id_user}', [UserController::class, 'update'])->name('update');
        Route::delete('{id_user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('cabang')->name('cabang.')->group(function () {
        Route::get('/', [CabangController::class, 'index'])->name('index');
        Route::get('/create', [CabangController::class, 'create'])->name('create');
        Route::post('/create', [CabangController::class, 'store'])->name('store');
        Route::get('{id_cabang}/edit', [CabangController::class, 'edit'])->name('edit');
        Route::put('{id_cabang}', [CabangController::class, 'update'])->name('update');
        Route::delete('{id_cabang}', [CabangController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('/create', [KategoriController::class, 'create'])->name('create');
        Route::post('/create', [KategoriController::class, 'store'])->name('store');
        Route::get('{id_kategori}/edit', [KategoriController::class, 'edit'])->name('edit');
        Route::put('{id_kategori}', [KategoriController::class, 'update'])->name('update');
        Route::delete('{id_kategori}', [KategoriController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
        Route::get('/', [OwnerPelangganController::class, 'index'])->name('index');
        Route::get('/create', [OwnerPelangganController::class, 'create'])->name('create');
        Route::post('/create', [OwnerPelangganController::class, 'store'])->name('store');
        Route::get('{id_pelanggan}/edit', [OwnerPelangganController::class, 'edit'])->name('edit');
        Route::put('{id_pelanggan}', [OwnerPelangganController::class, 'update'])->name('update');
        Route::delete('{id_pelanggan}', [OwnerPelangganController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('/', [OwnerTransaksiController::class, 'index'])->name('index');
    });
});

// Kasir Routes
Route::prefix('kasir')->name('kasir.')->group(function () {
    Route::get('/dashboard', [KasirDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
        Route::get('/', [KasirPelangganController::class, 'index'])->name('index');
        Route::get('/create', [KasirPelangganController::class, 'create'])->name('create');
        Route::post('/create', [KasirPelangganController::class, 'store'])->name('store');
        Route::get('{id_pelanggan}/edit', [KasirPelangganController::class, 'edit'])->name('edit');
        Route::put('{id_pelanggan}', [KasirPelangganController::class, 'update'])->name('update');
        Route::delete('{id_pelanggan}', [KasirPelangganController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('index');
        Route::get('/create', [TransaksiController::class, 'create'])->name('create');
        Route::post('/create', [TransaksiController::class, 'store'])->name('store');
        Route::get('{id_pelanggan}/edit', [TransaksiController::class, 'edit'])->name('edit');
        Route::put('{id_pelanggan}', [TransaksiController::class, 'update'])->name('update');
        Route::delete('{id_pelanggan}', [TransaksiController::class, 'destroy'])->name('destroy');
    });
});
