<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenteeismController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ClockRecordController;
use App\Models\Absenteeism;

Route::get('/', function () {
    $search = request('search');
    $absenteeisms = Absenteeism::query()
        ->when($search, function ($query, $search) {
            return $query->where('employee_name', 'like', '%' . $search . '%');
        })
        ->get();

    return view('welcome', compact('absenteeisms', 'search'));
})->name('welcome');

Route::patch('/absenteeism/{absenteeism}/toggle', [AbsenteeismController::class, 'toggleStatus'])->name('absenteeism.toggle');

Route::get('/clock-records', [ClockRecordController::class, 'index'])->name('clock.records.index');
Route::patch('/clock-records/toggle/{employeeId}', [ClockRecordController::class, 'toggle'])->name('clock.records.toggle');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/absenteeism', [AbsenteeismController::class, 'index'])->name('absenteeism.index');
    Route::get('/absenteeism/create', [AbsenteeismController::class, 'create'])->name('absenteeism.create');
    Route::post('/absenteeism', [AbsenteeismController::class, 'store'])->name('absenteeism.store');
    Route::get('/absenteeism/{absenteeism}/edit', [AbsenteeismController::class, 'edit'])->name('absenteeism.edit');
    Route::put('/absenteeism/{absenteeism}', [AbsenteeismController::class, 'update'])->name('absenteeism.update');
    Route::delete('/absenteeism/{absenteeism}', [AbsenteeismController::class, 'destroy'])->name('absenteeism.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.post');
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
