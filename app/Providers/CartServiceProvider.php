<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class CartServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
            $cartCount = $cart ? $cart->total_items : 0;
            $view->with('cartCount', $cartCount);
        });
    }

    public function register(): void
    {
        //
    }
}
