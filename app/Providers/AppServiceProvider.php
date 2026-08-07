<?php

namespace App\Providers;

use App\Models\Service;
use App\Services\CartService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $cart = new CartService();

            $view->with([
                'services'  => Service::latest()->get(),
                'cartItems' => $cart->getCart(),
                'cartTotal' => $cart->total(),
                'cartCount' => $cart->count(),
            ]);

        });
    }
}