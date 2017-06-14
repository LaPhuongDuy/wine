<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('categories', 'CategoriesController', ['except' => 'show']);
    Route::resource('brands', 'BrandsController', ['except' => 'show']);
    Route::resource('products', 'ProductsController', ['except' => 'show']);
    Route::resource('users', 'UsersController', ['except' => 'show']);
  //  Route::resource('posts', 'PostsController');
});

Auth::routes();

Route::resource('/home', 'User\HomeController');
Route::resource('/product', 'User\ProductController');
Route::resource('/rating', 'User\RatingController');
Route::resource('/category', 'User\CategoryController');
//Route::get('/compare', 'User\CompareController@index')->name('compare_product');
//Route::get('/compare/{id}', 'User\CompareController@show')->name('compare');
Route::resource('/compare', 'User\CompareController');
//Route::post('/compare/store', 'User\CompareController@store')->name('delete_compare');
Route::post('/comment', 'User\CommentController@store');
Route::resource('/comments', 'User\CommentsController');
Route::post('/cart/destroy', 'User\CartController@destroy');
Route::resource('/cart', 'User\CartController',  ['except' => ['destroy']]);
Route::resource('/search', 'User\SearchController');
Route::resource('/profile', 'User\ProfileController');
Route::resource('/wishlists', 'User\WishlistsController');
Route::resource('/payment', 'User\PaymentController');


//Route::resource('/nganluong', 'User\NganLuongController');
Route::resource('gio-hang', 'BillController');
Route::post('submit-payment', 'BillController@submit_payment');
Route::get('success-ngan-luong', 'BillController@success_nl');
Route::get('store-bill/{payment_name}/{order_code}/{status_payment}', 'BillController@store_bill');



