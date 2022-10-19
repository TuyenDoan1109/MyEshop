<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Wishlist;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlist_count = 0;
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        $featured_products = Product::where('best_rated', 1)->get();
        $hotdeal_products = Product::where('hot_deal', 1)->get();
        $currentURL = url()->current();
        return view('home', compact('categories', 'brands', 'subcategories', 'wishlist_count', 'featured_products', 'hotdeal_products', 'currentURL'));
    }
}
