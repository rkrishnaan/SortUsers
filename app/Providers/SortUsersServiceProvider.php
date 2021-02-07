<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SortUsersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sortUsers', function ($app) {
            return new SortUsersService();
        });
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
