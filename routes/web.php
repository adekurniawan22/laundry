<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\UserController;

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticationLogin'])->name('user.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('owner.dashboard');
Route::get('/user', [UserController::class, 'index'])->name('owner.user');
