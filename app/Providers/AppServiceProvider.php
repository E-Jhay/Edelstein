<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
// use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as FacadesView;

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
        Schema::defaultStringLength(191);
        FacadesView::composer('*', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
