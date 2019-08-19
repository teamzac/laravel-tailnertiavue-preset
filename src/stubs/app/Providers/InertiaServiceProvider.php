<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class InertiaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::setRootView('layouts.app');
        
        Inertia::share('app', [
            //
        ]);

        Inertia::share('errors', function() {
            return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages() : (object) [];
        });

        Inertia::share('auth.user', function() {
            return auth()->check() ? 
                [
                    'id' => request()->user()->id,
                ] :
                null;
        });
    }
}
