<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuoteManagementController;

// Public quote routes
Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
Route::get('/quotes/latest', [QuoteController::class, 'latest'])->name('quotes.latest');
Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('quotes.show');

// Favorites (requires auth)
Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/quotes/{quote}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/quotes/{quote}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});

// Admin area
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('management/quotes', QuoteManagementController::class)->names([
        'index' => 'management.quotes.index',
        'create' => 'management.quotes.create',
        'store' => 'management.quotes.store',
        'edit' => 'management.quotes.edit',
        'update' => 'management.quotes.update',
        'destroy' => 'management.quotes.destroy',
    ])->parameters(['management/quotes' => 'quote']);
});
