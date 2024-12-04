<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

// Route untuk halaman landing
Route::get('/', [LandingController::class, 'index']);

// Route untuk halaman login
Route::get('/masuk', function () {
    return view('login');
});

// Route untuk halaman pendaftaran
Route::get('/daftar', function () {
    return view('register');
});

// Route untuk halaman booking lapangan (dalam folder customer)
Route::get('/pemesanan', function () {
    return view('customer.pemesanan'); // Perhatikan tambahan 'customer.'
});
