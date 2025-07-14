<?php

namespace App\Providers;

use App\Policies\ArtikelPolicy;
use App\Policies\GaleriPolicy;
use App\Policies\KesenianPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Artikel' => ArtikelPolicy::class,
        'App\Models\Galeri' => GaleriPolicy::class,
        'App\Models\Kesenian' => KesenianPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
