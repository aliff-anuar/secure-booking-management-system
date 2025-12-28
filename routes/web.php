<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Secure Booking CRUD
    Route::resource('bookings', BookingController::class);
});

require __DIR__.'/auth.php';

use App\Http\Controllers\Admin\BookingController as AdminBookingController;

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])
        ->name('admin.bookings.index');

    Route::delete('/admin/bookings/{booking}', [AdminBookingController::class, 'destroy'])
        ->name('admin.bookings.destroy');
});

use App\Http\Controllers\Admin\AuditLogController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/audit-logs', [AuditLogController::class, 'index'])
        ->name('admin.audit.index');
});
