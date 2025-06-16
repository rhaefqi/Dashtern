<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Panduan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function index()
{
    Carbon::setLocale('id'); // Tambahkan ini
    $panduan = Panduan::latest()->get();
    return view('nama_view', compact('panduan'));
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id');
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
