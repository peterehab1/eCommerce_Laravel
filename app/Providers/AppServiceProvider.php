<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Category;
use App\Cart;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) 
        {
            $categories = Category::all();

            //...with this variable
            $view->with('categories', $categories );    
        });  


        view()->composer('*', function ($view) 
        {
            $cart = Cart::all()->where('user_id', Auth::id())->where('ordered', 0);
            $total = 0;

            //Get the Sum of the order
            foreach ($cart as $c) {
                $total = $total + $c->product->first()->price * $c->quantity;
            }

            //...with this variable
            $view->with('cart', $cart);    
        });  

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
