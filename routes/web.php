<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenteeismController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Models\Absenteeism;

// Default to welcome page on root URL
Route::get('/', function () {
    // Fetch all absenteeism records
    $absenteeisms = Absenteeism::all(); // Ensure your model name matches
    return view('welcome', compact('absenteeisms')); // Pass the data to the view
})->name('home');

// Define absenteeism index route (for authenticated admin access)
Route::get('/absenteeism', [AbsenteeismController::class, 'index'])->name('absenteeism.index');

// Define toggle status route
Route::patch('/absenteeism/{absenteeism}/toggle', [AbsenteeismController::class, 'toggleStatus'])->name('absenteeism.toggle');

// Admin Authentication Routes
Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.post');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// CRUD Routes for Absenteeism (Protected by Auth Middleware)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/absenteeism/create', [AbsenteeismController::class, 'create'])->name('absenteeism.create');
    Route::post('/absenteeism', [AbsenteeismController::class, 'store'])->name('absenteeism.store');
    Route::get('/absenteeism/{absenteeism}/edit', [AbsenteeismController::class, 'edit'])->name('absenteeism.edit');
    Route::put('/absenteeism/{absenteeism}', [AbsenteeismController::class, 'update'])->name('absenteeism.update');
    Route::delete('/absenteeism/{absenteeism}', [AbsenteeismController::class, 'destroy'])->name('absenteeism.destroy');
});
