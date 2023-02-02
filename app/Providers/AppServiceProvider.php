<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
        // You can also bind the same variable with multiple views 
        // by just giving the first argument as array of views. like
        // view()->composer(['layouts.portal','layouts.mylayouts','layouts.admin'],function(){})
        view()->composer('layouts.portal', function ($view) {
            $view->with('carts', Cart::where('user_id', auth()->id())->get());
        });
    }
}
