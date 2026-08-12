<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AquariumController;
use App\Http\Controllers\SpeciesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])
    ->middleware(['auth'])
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('profile.update');

Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('profile.destroy');

Route::get('/aquariums', [AquariumController::class, 'index'])
    ->name('aquariums.index');

Route::get('/aquariums/{aquarium}', [AquariumController::class, 'show'])
    ->name('aquariums.show');

Route::get('/species', [SpeciesController::class, 'index'])
    ->name('species.index');

Route::get('/species/{species}', [SpeciesController::class, 'show'])
    ->name('species.show');

// 一般ユーザー（ログイン済みなら誰でも）
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// 水族館担当者
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
});

// システム管理者
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';