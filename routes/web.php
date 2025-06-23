<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole; // Pastikan ini ada
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\CustomerBookingController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\SuperadminController;

Route::get('/', [LandingController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'autentic'])->name('autentic');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

//------- Superadmin Routes
Route::middleware(['auth', CheckRole::class.':superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/beranda', [SuperadminController::class, 'dashboard'])->name('superadmin.beranda');

    // Dashboard
    Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');

    // User management
    Route::get('/users', [SuperadminController::class, 'index'])->name('superadmin.users');
    Route::get('/users/{id}/edit', [SuperadminController::class, 'edit'])->name('superadmin.users.edit');
    Route::put('/users/{id}', [SuperadminController::class, 'update'])->name('superadmin.users.update');
    Route::delete('/users/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.users.destroy');
    Route::post('/users/{id}/restore', [SuperadminController::class, 'restore'])->name('superadmin.users.restore');
    Route::delete('/users/{id}/force-delete', [SuperadminController::class, 'forceDelete'])->name('superadmin.users.force-delete');
});

//------- Admin Routes
Route::middleware(['auth', CheckRole::class.':admin'])->prefix('admin')->group(function () {
    Route::get('/beranda', [AdminBookingController::class, 'dashboard'])->name('admin.beranda');

    Route::resource('lapangan', LapanganController::class);

    // Booking management
    Route::get('booking', [AdminBookingController::class, 'index'])->name('admin.booking.index');
    Route::get('booking/{id}', [AdminBookingController::class, 'show'])->name('admin.booking.show');
    Route::post('booking/{id}/accept', [AdminBookingController::class, 'accept'])->name('admin.booking.accept');
    Route::post('booking/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.booking.reject');
    Route::get('booking/detail', [AdminBookingController::class, 'detail'])->name('admin.booking.detail');

    // Dashboard
    Route::get('dashboard', [AdminBookingController::class, 'dashboard'])->name('admin.dashboard');


});

//------- Customer Routes
Route::middleware(['auth', CheckRole::class.':customer'])->prefix('customer')->group(function () {
    Route::get('/beranda', function () {
        return view('customer.beranda');
    })->name('customer.beranda');

    // Booking routes
    Route::get('/bookinglap', [CustomerBookingController::class, 'index'])->name('customer.bookinglap');
    Route::get('/bookinglap/create/{id}', [CustomerBookingController::class, 'create'])->name('customer.booking.create');
    Route::post('/bookinglap', [CustomerBookingController::class, 'store'])->name('customer.booking.store');
    Route::get('/bookinglap/detail/{id}', [CustomerBookingController::class, 'show'])->name('customer.detailbooking');
    Route::delete('/bookinglap/cancel/{id}', [CustomerBookingController::class, 'cancel'])->name('customer.bookinglap.cancel');

    // Payment proof upload
    Route::post('/bookinglap/{id}/upload-payment', [CustomerBookingController::class, 'uploadPaymentProof'])->name('customer.booking.upload-payment');

    // Booking history
    Route::get('/riwayat', [CustomerBookingController::class, 'history'])->name('customer.booking.history');
});

// Debug route untuk testing gambar (hanya untuk development)
if (config('app.debug')) {
    Route::get('/debug/images', function () {
        return view('debug.image-test');
    })->name('debug.images');
}
