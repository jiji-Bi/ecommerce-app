<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

use App\Http\View\Composers\CategorieComposer;
use App\Models\Categorie;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Carbon;

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

        //Using class based composers...
        //View::composer(['guest/product-detail', 'guest/index'], CommandeComposer::class);
        View::composer(['guest/index', 'guest/components/categories_products'], CategorieComposer::class);
        View::composer('*', function ($view) {
            View::share('fivecategories', Categorie::take(2)->get());
            View::share('view_name', $view->getName());
            $mytime = Carbon::now();
            View::share('mytime', $mytime);
        });


        // // Using closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });
    }
}
