<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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

        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });
    }
}
