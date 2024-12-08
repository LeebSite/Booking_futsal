<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole; // Pastikan ini ada
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;

Route::get('/', [LandingController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'autentic'])->name('autentic');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('register');
});

// Admin Routes
Route::middleware(['auth', CheckRole::class.':admin'])->prefix('admin')->group(function () {
    Route::get('/beranda', function () {
        return view('admin.beranda');
    })->name('admin.beranda');

    // Route::resource('lapangan', LapanganController::class);
    
    Route::get('/pesanan', function () {
        return view('admin.pesanan');
    })->name('admin.pesanan');
});

// Customer Routes
Route::middleware(['auth', CheckRole::class.':customer'])->prefix('customer')->group(function () {
    Route::get('/beranda', function () {
        return view('customer.beranda');
    })->name('customer.beranda');
});