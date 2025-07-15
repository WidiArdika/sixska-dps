<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Jurusan;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
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
        View::composer('*', function ($view) {
            $view->with('jurusans', Jurusan::all());
        });
    }
}
