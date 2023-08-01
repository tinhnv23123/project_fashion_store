<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use IlLuminate\Pagination\Paginator;
use App\Models\Cart;
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
        Paginator::useBootstrap();
        view()->composer('layouts.client', function ($view) {
            if (Auth::id()) {
                $userId = Auth::id();
                $cartCount = Cart::where('user_id', $userId)->count();
                $view->with('cartCount', $cartCount);
            } else {
                $view->with('cartCount', 0); // User chưa đăng nhập, cartCount mặc định là 0.
            }
        });
    }
}
