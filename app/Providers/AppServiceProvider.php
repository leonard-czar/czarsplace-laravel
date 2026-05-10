<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        AbstractPaginator::$defaultView = 'vendor.pagination.bootstrap-5';
        AbstractPaginator::$defaultSimpleView = 'vendor.pagination.simple-bootstrap-5';

        view()->composer('layouts.portal', function ($view) {
            if (! Auth::check()) {
                $view->with('carts', collect());

                return;
            }

            $view->with(
                'carts',
                Cart::with('product')->where('user_id', Auth::id())->get()
            );
        });

        if ($this->app->environment('local')) {
            $uploadDir = storage_path('app/public/Watchimages');
            $publicServed = public_path('storage/Watchimages');
            if (is_dir($uploadDir)) {
                $hasFiles = count(glob($uploadDir.'/*')) > 0;
                if ($hasFiles && ! is_dir($publicServed)) {
                    Log::warning(
                        'Czarsplace: files exist in storage/app/public/Watchimages but public/storage is not serving them. Run: php artisan storage:link'
                    );
                }
            }
        }
    }
}
