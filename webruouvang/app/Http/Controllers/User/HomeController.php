<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class HomeController extends Controller
{
    public function index()
    {
        $best_seller = Product::bestSeller();

        $latest_product = Product::latestProduct();

        $old_product = Product::oldProduct();

        return view('user.index', compact('best_seller', 'latest_product', 'old_product'));
    }
}
