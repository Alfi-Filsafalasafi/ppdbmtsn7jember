<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

    Route::get('/pendaftaran', [RegistrationController::class, 'create'])->name('pendaftaran.form');
    Route::post('/pendaftaran', [RegistrationController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/download-pdf/{id}', [RegistrationController::class, 'downloadPdf']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')
    ->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/students/{id}/pdf', [StudentController::class, 'downloadPdf'])
    ->name('students.pdf');

    Route::resource('students', StudentController::class);
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', fn () => view('user.dashboard'));
});

require __DIR__.'/auth.php';
