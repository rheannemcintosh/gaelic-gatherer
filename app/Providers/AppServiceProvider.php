<?php

namespace App\Providers;

use App\View\Composers\BadgeComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Pass badges to all views
        View::composer('*', BadgeComposer::class);
    }
}
