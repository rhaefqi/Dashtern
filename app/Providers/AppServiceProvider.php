<?php

namespace App\Providers;

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
        // Buat helper global di AppServiceProvider atau langsung di controller dan share ke semua view
        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $nim = auth()->user()->username;
                $mahasiswa = \App\Models\Mahasiswa::where('nim', $nim)->first();
                $view->with('mahasiswa_login', $mahasiswa);
            }
        });
    }
}
