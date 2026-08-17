<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AquariumController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AreaController;

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

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('posts.update');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
    ->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])
    ->middleware('auth')
    ->name('comments.edit');

Route::put('/comments/{comment}', [CommentController::class, 'update'])
    ->middleware('auth')
    ->name('comments.update');

Route::middleware('auth')->group(function () {

Route::get('/mypage', function () {
        return view('mypage');
    })->name('mypage');

Route::get('/mypage/posts', [PostController::class, 'myPosts'])
    ->middleware('auth')
    ->name('mypage.posts');

Route::get('/mypage/favorites', [FavoriteController::class, 'index'])
    ->middleware('auth')
    ->name('mypage.favorites');

Route::post('/species/{species}/favorite', [FavoriteController::class, 'store'])
    ->name('favorites.store');

Route::delete('/species/{species}/favorite', [FavoriteController::class, 'destroy'])
    ->name('favorites.destroy');

Route::get('/areas/{area}', [AreaController::class, 'show'])
    ->name('areas.show');

Route::get('/areas/{area}', [AreaController::class, 'show'])
    ->name('areas.show');

Route::get(
    '/aquariums/{aquarium}/areas',
    [AreaController::class, 'index']
    )->name('areas.index');
});

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