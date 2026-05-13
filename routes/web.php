<?php

// routes/web.php
// Defines all URL routes for the application

use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| These are accessible without logging in.
*/

// Redirect root URL to login page
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (provided by Laravel Breeze)
|--------------------------------------------------------------------------
| Includes: /login, /register, /logout, /forgot-password, etc.
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Protected Routes (requires login)
|--------------------------------------------------------------------------
| Wrapped in 'auth' middleware — redirects to login if not authenticated.
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard — shown after login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // --- MODULE 2: CRUD ---
    // resource() auto-creates: index, create, store, edit, update, destroy
    Route::resource('records', RecordController::class);

    // --- MODULE 3: REPORTS ---
    Route::get('/reports',              [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export-csv',   [ReportController::class, 'exportCsv'])->name('reports.csv');
    Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.excel');
    Route::get('/reports/export-pdf',   [ReportController::class, 'exportPdf'])->name('reports.pdf');
});