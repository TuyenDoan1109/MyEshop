<?php

use RealRashid\SweetAlert\Facades\Alert;
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

// BACKEND
Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::get('/', 'HomeController@index')->name('admin.home');
	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('/logout', 'LoginController@logout')->name('admin.logout');
		Route::get('/register', 'RegisterController@showRegisterForm')->name('admin.register');
		Route::post('/register', 'RegisterController@register');
	});
});

// Categories backend
Route::prefix('admin')->group(function () {
    Route::get('category', 'Admin\CategoryController@index')->name('category.index');
    Route::post('category', 'Admin\CategoryController@store')->name('category.store');
    Route::get('category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::put('category/{id}', 'Admin\CategoryController@update')->name('category.update');
    Route::get('category/{id}', 'Admin\CategoryController@show')->name('category.show');
    Route::delete('category/{id}', 'Admin\CategoryController@destroy')->name('category.destroy');
    Route::get('category/{id}/edit', 'Admin\CategoryController@edit')->name('category.edit');
});

// Subcategories backend
Route::prefix('admin')->group(function () {
    Route::get('subcategory', 'Admin\SubcategoryController@index')->name('subcategory.index');
    Route::post('subcategory', 'Admin\SubcategoryController@store')->name('subcategory.store');
    Route::get('subcategory/create', 'Admin\SubcategoryController@create')->name('subcategory.create');
    Route::put('subcategory/{id}', 'Admin\SubcategoryController@update')->name('subcategory.update');
    Route::get('subcategory/{id}', 'Admin\SubcategoryController@show')->name('subcategory.show');
    Route::delete('subcategory/{id}', 'Admin\SubcategoryController@destroy')->name('subcategory.destroy');
    Route::get('subcategory/{id}/edit', 'Admin\SubcategoryController@edit')->name('subcategory.edit');
});

// Brands backend
Route::prefix('admin')->group(function () {
    Route::get('brand', 'Admin\BrandController@index')->name('brand.index');
    Route::post('brand', 'Admin\BrandController@store')->name('brand.store');
    Route::get('brand/create', 'Admin\BrandController@create')->name('brand.create');
    Route::put('brand/{id}', 'Admin\BrandController@update')->name('brand.update');
    Route::get('brand/{id}', 'Admin\BrandController@show')->name('brand.show');
    Route::delete('brand/{id}', 'Admin\BrandController@destroy')->name('brand.destroy');
    Route::get('brand/{id}/edit', 'Admin\BrandController@edit')->name('brand.edit');
});

// Products backend
Route::prefix('admin')->group(function () {
    Route::get('product', 'Admin\ProductController@index')->name('product.index');
    Route::post('product', 'Admin\ProductController@store')->name('product.store');
    Route::get('product/create', 'Admin\ProductController@create')->name('product.create');
    Route::put('product/{id}', 'Admin\ProductController@update')->name('product.update');
    Route::get('product/{id}', 'Admin\ProductController@show')->name('product.show');
    Route::delete('product/{id}', 'Admin\ProductController@destroy')->name('product.destroy');
    Route::get('product/{id}/edit', 'Admin\ProductController@edit')->name('product.edit');
    Route::get('product/{id}/active', 'Admin\ProductController@active')->name('product.active');
    Route::get('product/{id}/inactive', 'Admin\ProductController@inactive')->name('product.inactive');

    Route::post('product/getSubcategory', 'Admin\ProductController@getSubcategory')->name('product.getSubcategory');
});







// FRONTEND
Route::get('/', 'PageController@index');

// Products
Route::get('/products', 'PageController@showProducts');
Route::get('/product/{id}', 'PageController@showProductDetail');
Route::get('/product-by-subcategory/{subcategory_id}', 'PageController@showProductBySubcategory');
Route::get('/product-by-category/{category_id}', 'PageController@showProductByCategory');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Wishlist
Route::get('/wishlist/add/{product_id}', 'WishlistController@addWishlist')->name('wishlist.add');
Route::get('/wishlist/show/{user_id}', 'WishlistController@showWishlist')->name('wishlist.show');

// Contact
Route::get('/contact', 'PageController@showContact')->name('contact');

// Cart
Route::post('/cart/add', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/index', 'CartController@showCart')->name('cart.index');
Route::get('/cart/remove/{product_id}', 'CartController@removeCartItem')->name('cart.remove');
Route::post('/cart/update/{product_id}', 'CartController@updateCart')->name('cart.update');

// Checkout
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/checkout/payment', 'CheckoutController@checkoutPayment')->name('checkout.payment');


