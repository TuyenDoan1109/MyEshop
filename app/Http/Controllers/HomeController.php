<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Wishlist;

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
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlists = Wishlist::all();
        $featured_products = Product::where('best_rated', 1)->get();
        $hotdeal_products = Product::where('hot_deal', 1)->get();
        return view('home', compact('categories', 'brands', 'subcategories', 'wishlists', 'featured_products', 'hotdeal_products'));
    }
}
