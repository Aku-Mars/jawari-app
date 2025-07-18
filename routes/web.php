<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KesenianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// dynamic pages - WIP (article and gallery from DB)
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// static Pages - WIP
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// dynamic pages - WIP
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// dynamic pages - WIP
Route::get('/artikel', function () {
    return view('pages.artikel');
})->name('artikel');

// Route::get('/sejarah', function () {
//     return view('pages.sejarah');
// })->name('sejarah');

Route::get('/kesenian/{slug}', [KesenianController::class, 'show'])->name('kesenian.show');

Route::resource('artikel', ArtikelController::class);
// Route::resource('galeri', GaleriController::class);
// Route::resource('kesenian', KesenianController::class);
Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
