<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::get('/instructor/dashboard', function () {
    // return view('instructor.dashboard');
    return redirect()->route('filament.instructor.pages.dashboard');
})->middleware(['auth','role:instructor'])->name('instructor.dashboard');

Route::get('/admin/dashboard', function () {
    // return view('admin.dashboard');
    return redirect()->route('filament.admin.pages.dashboard');
})->middleware(['auth','role:admin'])->name('admin.dashboard');

Route::get('/parents/dashboard', function () {
    return redirect()->route('filament.parents.pages.dashboard');
})->middleware(['auth','role:parent'])->name('parents.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
