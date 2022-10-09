<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

use App\Http\View\Composers\CommandeComposer;

use Illuminate\Support\ServiceProvider;


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

        // Using class based composers...
        //View::composer(['guest/product-detail', 'guest/index'], CommandeComposer::class);

        // // Using closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });
    }
}
