<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KesenianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/about', fn() => view('pages.about'))->name('about');

Route::prefix('galeri')->name('galeri.')->group(function () {
    Route::get('/', [GaleriController::class, 'index'])->name('index');
    Route::get('/{id}', [GaleriController::class, 'showInPage'])->name('show');
});

Route::prefix('artikel')->name('artikel.')->group(function () {
    Route::get('/', [ArtikelController::class, 'index'])->name('index');
    Route::get('/{judul}', [ArtikelController::class, 'show'])->name('show');
});

Route::get('/kesenian/{sub_judul}', [KesenianController::class, 'show'])->name('kesenian.show');

Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});
