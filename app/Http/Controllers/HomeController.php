<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Wishlist;
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
        $phones = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('category_name', 'Phone')
            ->select('products.*')
            ->limit(8)
            ->get();
        $laptops = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('category_name', 'Laptop')
        ->select('products.*')
        ->limit(8)
        ->get();
        $tablets = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('category_name', 'Tablet')
        ->select('products.*')
        ->limit(8)
        ->get();

        // $trancategories = Category::join('translation_cate', 'categories.id', '=', 'translation_cate.id')
        // ->select('translation_cate.name as transname','categories.id as cateid')->get();

        $currentURL = url()->current();
        return view('home', compact(
            'categories',
            'brands',
            'subcategories',
            'wishlist_count',
            'phones',
            'laptops',
            'tablets',
            'currentURL'
        ));
    }
}
