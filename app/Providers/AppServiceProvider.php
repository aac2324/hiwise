<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register admin middleware alias if router is available
        if ($this->app->bound('router')) {
            $this->app['router']->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
        }
    }
}
