<?php

use App\Http\Controllers\{ArtikelController, GaleriController, KesenianController, ProfileController, UserController};
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;
use App\Models\{Artikel, Galeri, Kesenian};

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

Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/about'))
        ->add(Url::create('/artikel'))
        ->add(Url::create('/galeri'));

    Artikel::all()->each(function ($artikel) use ($sitemap) {
        $sitemap->add(Url::create("/artikel/{$artikel->judul}"));
    });

    Kesenian::all()->each(function ($kesenian) use ($sitemap) {
        $sitemap->add(Url::create("/kesenian/" . Str::slug($kesenian->sub_judul)));
    });

    return $sitemap->toResponse(request());
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});
