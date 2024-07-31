<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Owner\CabangController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\UserController;

// Auth Routes
Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticationLogin'])->name('auth.login.submit');

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
});
