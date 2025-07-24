<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
// TODO: remove this commit when this issue resove
// Route::get('/admin/admin/products', function () {
//     return redirect('/admin/products');
// });
Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::get('/instructor/dashboard', function () {
    return redirect()->route('filament.instructor.pages.dashboard');
})->middleware(['auth','role:instructor'])->name('instructor.dashboard');

Route::get('/admin/dashboard', function () {
    return redirect()->route('filament.admin.pages.dashboard');
})->middleware(['auth','role:admin'])->name('admin.dashboard');

Route::get('/parent/dashboard', function () {
    return redirect()->route('filament.parent.pages.dashboard');
})->middleware(['auth','role:parent'])->name('parent.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
