<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        $product1 = Product::find(Session::get('compare1'));
        $product2 = Product::find(Session::get('compare2'));

        if ($category->parent_id == null) {
            $subCategories = $category->subcategories()->get()->pluck('id');

            $products = Product::getByParentCate($subCategories)
                ->paginate(config('common.number.paginate_category'));
        } else {
            $products = Product::getByChildCate($id)
                ->paginate(config('common.number.paginate_category'));
        }
        return view('user.category_product', compact('products', 'category', 'product1', 'product2'));
    }

    public function filter(Request $request)
    {
        $category = Category::find($request->data_category);

        if ($category->parent_id == null) {
            $subCategories = $category->subcategories()->get()->pluck('id');

            $products = Product::getByParentCate($subCategories)->filterLow(config('common.priceFilter.'.$request->id.'.low.value'));
            if (config('common.priceFilter.'.$request->id.'.high.value') != -1) {
                $products = $products->filterHigh(config('common.priceFilter.'.$request->id.'.high.value'));
            }
            $products = $products->paginate(config('common.number.paginate_category'));
        } else {
            $products = Product::getByChildCate($request->data_category)->filterLow(config('common.priceFilter.'.$request->id.'.low.value'));
            if (config('common.priceFilter.'.$request->id.'.high.value') != -1) {
                $products = $products->filterHigh(config('common.priceFilter.'.$request->id.'.high.value'));
            }
            $products = $products->paginate(config('common.number.paginate_category'));
        }

        return view('user.layouts.section.app_blockCategoryProduct', compact('products'));
    }
}
