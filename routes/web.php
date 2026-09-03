<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUnregisteredSpeciesController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminAquariumController;
use App\Http\Controllers\AquariumSpeciesController;
use App\Http\Controllers\AdminSpeciesController;
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
use App\Http\Controllers\StaffAreaController;
use App\Http\Controllers\StaffAquariumSpeciesController;
use App\Http\Controllers\StaffProfileController;

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

Route::get(
    '/species/{species}/aquariums',
    [SpeciesController::class, 'aquariums']
)->name('species.aquariums');

Route::get(
    '/species/{species}/areas',
    [SpeciesController::class, 'areas']
)->name('species.areas');

Route::get(
    '/aquariums/{aquarium}/species',
    [AquariumController::class, 'species']
)->name('aquarium.species');

Route::get(
    '/areas/{area}/species',
    [AreaController::class, 'species']
)->name('areas.species');

Route::get(
    '/aquarium-species/{aquariumSpecies}',
    [AquariumSpeciesController::class, 'show']
)->name('aquarium-species.show');

});

// 一般ユーザー（ログイン済みなら誰でも）
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// 水族館担当者
Route::middleware(['auth', 'role:staff'])
    ->prefix('staff')
    ->name('staff.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [StaffDashboardController::class, 'index']
        )->name('dashboard');

        Route::resource(
            'areas',
            StaffAreaController::class
        );

    Route::resource(
    'species',
    StaffAquariumSpeciesController::class
  );

  Route::get(
    '/profile',
    [StaffProfileController::class, 'show']
)->name('profile.show');
});

// システム管理者
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get(
    '/aquariums',
    [AdminAquariumController::class, 'index']
)->name('aquariums.index');

Route::get(
    '/aquariums/create',
    [AdminAquariumController::class, 'create']
)->name('aquariums.create');

Route::post(
    '/aquariums',
    [AdminAquariumController::class, 'store']
)->name('aquariums.store');
Route::get(
    '/aquariums/{aquarium}/edit',
    [AdminAquariumController::class, 'edit']
)->name('aquariums.edit');

Route::put(
    '/aquariums/{aquarium}',
    [AdminAquariumController::class, 'update']
)->name('aquariums.update');

Route::delete(
    '/aquariums/{aquarium}',
    [AdminAquariumController::class, 'destroy']
)->name('aquariums.destroy');

Route::get(
    '/staff',
    [AdminStaffController::class, 'index']
)->name('staff.index');

Route::get(
    '/staff/create',
    [AdminStaffController::class, 'create']
)->name('staff.create');

Route::post(
    '/staff',
    [AdminStaffController::class, 'store']
)->name('staff.store');

Route::get(
    '/staff/{staff}/edit',
    [AdminStaffController::class, 'edit']
)->name('staff.edit');

Route::put(
    '/staff/{staff}',
    [AdminStaffController::class, 'update']
)->name('staff.update');

Route::delete(
    '/staff/{staff}',
    [AdminStaffController::class, 'destroy']
)->name('staff.destroy');

Route::get(
    '/species',
    [AdminSpeciesController::class, 'index']
)->name('species.index');

Route::get(
    '/species/create',
    [AdminSpeciesController::class, 'create']
)->name('species.create');

Route::post(
    '/species',
    [AdminSpeciesController::class, 'store']
)->name('species.store');

Route::get(
    '/species/{species}/edit',
    [AdminSpeciesController::class, 'edit']
)->name('species.edit');

Route::put(
    '/species/{species}',
    [AdminSpeciesController::class, 'update']
)->name('species.update');

Route::delete(
    '/species/{species}',
    [AdminSpeciesController::class, 'destroy']
)->name('species.destroy');

Route::get(
    '/unregistered-species',
    [AdminUnregisteredSpeciesController::class, 'index']
)->name('unregistered-species.index');

Route::get(
    '/unregistered-species/{aquariumSpecies}/approve',
    [AdminUnregisteredSpeciesController::class, 'approve']
)->name('species.unregistered.approve');

Route::post(
    '/unregistered-species/{aquariumSpecies}/approve',
    [AdminUnregisteredSpeciesController::class, 'store']
)->name('species.unregistered.store');

Route::delete(
    '/unregistered-species/{aquariumSpecies}',
    [AdminUnregisteredSpeciesController::class, 'destroy']
)->name('unregistered-species.destroy');

Route::get(
    '/posts',
    [AdminPostController::class, 'index']
)->name('posts.index');

Route::get(
    '/posts/{post}',
    [AdminPostController::class, 'show']
)->name('posts.show');

Route::delete(
    '/posts/{post}',
    [AdminPostController::class, 'destroy']
)->name('posts.destroy');

Route::get(
    '/profile',
    [AdminProfileController::class, 'show']
)->name('profile.show');

});

require __DIR__.'/auth.php';