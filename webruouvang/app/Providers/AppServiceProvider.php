<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\District;
use App\Models\Product;
use App\Models\Province;
use App\Models\Ward;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Support\Facades\View;

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

        $cate_parent = Category::where('parent_id', 0)->get();
        View::share('cate_parent', $cate_parent);

        $high_product = Product::where('score', '>', 8)->get()->take(10);
        View::share('high_product', $high_product);

        $brands = Brand::all();
        View::share('brands', $brands);

        // $provinces = Province::all()->pluck('name', 'id');
        // View::share('provinces', $provinces);


        // $districts = District::where('province_id', 01)->pluck('name', 'id');
        // View::share('districts', $districts);

        // $wards = Ward::where('district_id', 001)->pluck('name', 'id');
        // View::share('wards', $wards);

        //dd(Cart::content());

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
