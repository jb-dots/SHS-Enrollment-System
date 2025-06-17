<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('enrollments', EnrollmentController::class);
    Route::post('/enrollments/{enrollment}/approve', [App\Http\Controllers\EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::post('/enrollments/{enrollment}/reject', [App\Http\Controllers\EnrollmentController::class, 'reject'])->name('enrollments.reject');

    Route::get('/tracks', [App\Http\Controllers\TracksController::class, 'index'])->name('tracks.index');
    Route::get('/strands', [App\Http\Controllers\StrandsController::class, 'index'])->name('strands.index');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
