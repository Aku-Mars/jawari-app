<?php

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
Route::get('/galeri', function () {
    return view('pages.galeri');
});

// dynamic pages - WIP
Route::get('/artikel', function () {
    return view('pages.artikel');
});
