<?php

namespace App\Providers;

use App\Cart;
use App\Category;
use App\Slide;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { Schema::defaultStringLength(191);

            view()->composer('inc.header',function($view){ // dùng cái này để chia sẻ dữ liệu với cái view trong đó- là cái view khó mà chỏ dược trực tiếp từ controller
            $slide=Slide::all();
            $categorychung=Category::where('parent_id','=',0)->get();
            $mobile=Category::where('parent_id','=',1)->get();
            $laptop=Category::where('parent_id','=',2)->get();

            $pc=Category::where('parent_id','=',19)->get();
            $view->with(['slide'=>$slide,'categorychung'=>$categorychung,'mobile'=>$mobile,'laptop'=>$laptop,'pc'=>$pc]);
        });// cái $view này là biến bất kì thôi
            view()->composer('inc.header',function ($view){
                $oldCart=Session::get('cart');
                $cart= new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);

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
