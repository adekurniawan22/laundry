<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Owner\CabangController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\KategoriController;
use App\Http\Controllers\Owner\PelangganController;
use App\Http\Controllers\Owner\UserController;

// Auth Routes
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticationLogin'])->name('user.login');

// Owner Routes
Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
        Route::get('/', [PelangganController::class, 'index'])->name('index');
        Route::get('/create', [PelangganController::class, 'create'])->name('create');
        Route::post('/create', [PelangganController::class, 'store'])->name('store');
        Route::get('{id_pelanggan}/edit', [PelangganController::class, 'edit'])->name('edit');
        Route::put('{id_pelanggan}', [PelangganController::class, 'update'])->name('update');
        Route::delete('{id_pelanggan}', [PelangganController::class, 'destroy'])->name('destroy');
    });
});
