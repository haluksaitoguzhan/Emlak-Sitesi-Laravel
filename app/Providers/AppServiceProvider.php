<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::defaultView('simple-bootstrap-5');
        // Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
    }
}
