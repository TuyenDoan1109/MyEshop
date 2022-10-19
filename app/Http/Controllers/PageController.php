<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Wishlist;
use Auth;

class PageController extends Controller
{
    public function index() {
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

    public function showProducts() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $products = Product::where('status', 1)->get();
        $wishlists = Wishlist::all();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.products', compact('products', 'categories', 'brands', 'subcategories', 'wishlists', 'wishlist_count', 'currentURL'));
    }

    public function showProductDetail($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlists = Wishlist::all();
        $product = Product::find($id);
        $product_colors = explode(',', $product->product_color);
        $product_sizes = explode(',', $product->product_size);
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.productDetail', compact('product', 'product_colors', 'product_sizes', 'categories', 'brands', 'subcategories', 'wishlists', 'wishlist_count', 'currentURL'));
    }

    public function showContact() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.contact', compact('categories', 'brands', 'subcategories', 'wishlist_count', 'currentURL'));
    }

    public function showProductBySubcategory($subcategory_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $products = Product::where('subcategory_id', $subcategory_id)->get();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.products', compact('products', 'categories', 'brands', 'subcategories', 'wishlist_count', 'currentURL'));
    }

    public function showProductByCategory($category_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $products = Product::where('category_id', $category_id)->get();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.products', compact('products', 'categories', 'brands', 'subcategories', 'wishlist_count', 'currentURL'));
    }
}
