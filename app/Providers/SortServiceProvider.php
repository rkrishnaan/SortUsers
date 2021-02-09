<?php

namespace App\Providers;

use App\Services\QuickSortService;
use Illuminate\Support\ServiceProvider;

class SortServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\SortServiceInterface', 'App\Services\QuickSortService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
