<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Toko;
use Illuminate\Support\Facades\DB;


class NavigationComposerServiceProvider extends ServiceProvider
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
    public function boot()
{
    View::composer('layouts.navigation', function ($view) {
        $lowStockCount = Toko::where('jumlah', '<=', DB::raw('minLimit'))->count();
        $view->with('lowStockCount', $lowStockCount);
    });
}

}
