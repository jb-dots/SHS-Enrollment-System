<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentDashboardController;

Route::view('/', 'welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');

    Route::resource('enrollments', EnrollmentController::class);
    Route::post('/enrollments/{enrollment}/approve', [App\Http\Controllers\EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::post('/enrollments/{enrollment}/reject', [App\Http\Controllers\EnrollmentController::class, 'reject'])->name('enrollments.reject');
});

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/manage-users', [AdminDashboardController::class, 'manageUsers'])->name('admin.manage-users');
        Route::get('/admin/manage-tracks', [AdminDashboardController::class, 'manageTracks'])->name('admin.manage-tracks');
        Route::get('/admin/archived-tracks', [AdminDashboardController::class, 'archivedTracks'])->name('admin.archived-tracks');

        Route::resource('tracks', App\Http\Controllers\TracksController::class);
        Route::post('/tracks/{track}/archive', [App\Http\Controllers\TracksController::class, 'archive'])->name('tracks.archive');
        Route::post('/tracks/{track}/restore', [App\Http\Controllers\TracksController::class, 'restore'])->name('tracks.restore');
        Route::get('/admin/manage-strands', [App\Http\Controllers\AdminDashboardController::class, 'manageStrands'])->name('admin.manage-strands');
    });

require __DIR__.'/auth.php';
