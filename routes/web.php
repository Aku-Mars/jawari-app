<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KesenianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{id}', [GaleriController::class, 'showInPage'])->name('galeri.show');

Route::get('/artikel', function () {
    return view('pages.artikel');
})->name('artikel');

Route::get('/kesenian/{sub_judul}', [KesenianController::class, 'show'])->name('kesenian.show');

Route::resource('artikel', ArtikelController::class);
Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
