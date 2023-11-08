<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('isAdmin', function () {
            return auth()->user()->role === 'admin';
        });
    
        Blade::if('isWorker', function () {
            return auth()->user()->role === 'worker';
        });
    
        Blade::if('isUser', function () {
            return auth()->user()->role === 'user';
        });
    }
}
