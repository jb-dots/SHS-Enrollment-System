<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('enrollments', EnrollmentController::class);
    Route::post('/enrollments/{enrollment}/approve', [App\Http\Controllers\EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::post('/enrollments/{enrollment}/reject', [App\Http\Controllers\EnrollmentController::class, 'reject'])->name('enrollments.reject');
});

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/manage-users', [AdminDashboardController::class, 'manageUsers'])->name('admin.manage-users');
        Route::get('/admin/manage-tracks', [AdminDashboardController::class, 'manageTracks'])->name('admin.manage-tracks');

        Route::resource('tracks', App\Http\Controllers\TracksController::class);
        Route::resource('strands', App\Http\Controllers\StrandsController::class);
    });

require __DIR__.'/auth.php';
