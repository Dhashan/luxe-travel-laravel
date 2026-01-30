<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically used after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard'; // Adjusted to match typical Laravel Breeze home

    /**
     * Define your route model bindings, pattern filters, and other route configurations.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Configuration for API routes (e.g., /api/destinations)
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Configuration for Web routes (e.g., login, register, test)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}