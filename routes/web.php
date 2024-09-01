<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TraineeReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\ReportController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/all', [ReportController::class, 'allTrainees'])->name('reports.all');
    Route::get('/reports/admitted', [ReportController::class, 'admittedTrainees'])->name('reports.admitted');
    Route::get('/reports/non-admitted', [ReportController::class, 'nonAdmittedTrainees'])->name('reports.non_admitted');
    Route::get('/reports/ward-distribution', [ReportController::class, 'wardDistribution'])->name('reports.ward_distribution');
    Route::get('/reports/role-based', [ReportController::class, 'roleBased'])->name('reports.role_based');
});



Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Manage Trainees
Route::get('/admin/trainees', [TraineeController::class, 'index'])->name('admin.trainees.index');

// Preview Reports
Route::get('/admin/reports/preview', [ReportController::class, 'preview'])->name('admin.reports.preview');

// Generate Reports
Route::get('/admin/reports/generate', [ReportController::class, 'generate'])->name('admin.reports.generate');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/trainee/report/preview', [TraineeReportController::class, 'preview'])->name('trainee.preview');
Route::get('/trainee/report/download', [TraineeReportController::class, 'download'])->name('trainee.download');


Route::get('trainees/admit', [TraineeController::class, 'admitForm'])->name('trainees.admitForm');
Route::get('trainees/by-role', [TraineeController::class, 'showByRole'])->name('trainees.showByRole');
Route::post('trainees/admit', [TraineeController::class, 'admit'])->name('trainees.admit');


Route::resource('trainees', TraineeController::class);
Route::get('get-polling-stations/{wardId}', [TraineeController::class, 'getPollingStations']);
Route::get('trainees/{trainee}/edit', [TraineeController::class, 'edit']);


Route::middleware(['auth'])->group(function () {
    Route::resource('trainees', TraineeController::class);
});

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
});


require __DIR__.'/auth.php';
