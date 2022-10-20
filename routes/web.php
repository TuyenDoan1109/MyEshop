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

// BACKEND
Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::get('/', 'HomeController@index')->name('admin.dashboard');
	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('/logout', 'LoginController@logout')->name('admin.logout');
		Route::get('/register', 'RegisterController@showRegisterForm')->name('admin.register');
		Route::post('/register', 'RegisterController@register');
	});

    // Admins
    Route::resource('admins', 'AdminController');

    //Users
    Route::resource('users', 'UserController');

    // Categories
    Route::resource('categories', 'CategoryController');

    // Subcategories
    Route::resource('subcategories', 'SubcategoryController');

    // Brands
    Route::resource('brands', 'BrandController');

    // Products
    Route::resource('products', 'ProductController');
    Route::get('products/{id}/active', 'ProductController@active')->name('products.active');
    Route::get('products/{id}/inactive', 'ProductController@inactive')->name('products.inactive');
    Route::post('products/getSubcategory', 'ProductController@getSubcategory')->name('products.getSubcategory');

    // Orders
    Route::resource('orders', 'OrderController');
});







// FRONTEND
Route::get('/', 'PageController@index');

// Products
Route::get('/products', 'PageController@showProducts');
Route::get('/product/{product_id}', 'PageController@showProductDetail')->name('product.detail');
Route::get('/product-by-subcategory/{subcategory_id}', 'PageController@showProductBySubcategory');
Route::get('/product-by-category/{category_id}', 'PageController@showProductByCategory');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Wishlist
Route::get('/wishlist/add/{product_id}', 'WishlistController@addWishlist')->name('wishlist.add');
Route::get('/wishlist/index', 'WishlistController@indexWishlist')->middleware('auth')->name('wishlist.index');
Route::delete('/wishlist/remove/{product_id}', 'WishlistController@removeWishlist')->name('wishlist.remove');

// Contact
Route::get('/contact', 'PageController@showContact')->name('contact');

// Cart
Route::post('/cart/add', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/index', 'CartController@showCart')->name('cart.index');
Route::delete('/cart/remove/{rowId}', 'CartController@removeCartItem')->name('cart.remove');
Route::patch('/cart/update', 'CartController@updateCart')->name('cart.update'); 

// Checkout
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/checkout/payment', 'CheckoutController@checkoutPayment')->name('checkout.payment');


