<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Wishlist;

class PageController extends Controller
{
    public function index() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlists = Wishlist::all();
        $featured_products = Product::where('best_rated', 1)->get();
        $hotdeal_products = Product::where('hot_deal', 1)->get();
        return view('home', compact('categories', 'brands', 'subcategories', 'wishlists', 'featured_products', 'hotdeal_products'));
    }

    public function showProducts() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $products = Product::where('status', 1)->get();
        $wishlists = Wishlist::all();
        return view('pages.products', compact('products', 'categories', 'brands', 'subcategories', 'wishlists'));
    }

    public function showProductDetail($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlists = Wishlist::all();
        $product = Product::find($id);
        $product_colors = explode(',', $product->product_color);
        $product_sizes = explode(',', $product->product_size);
        return view('pages.productDetail', compact('product', 'product_colors', 'product_sizes', 'categories', 'brands', 'subcategories', 'wishlists'));
    }

    public function showContact() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('pages.contact', compact('categories', 'brands', 'subcategories'));
    }

    public function showProductBySubcategory($subcategory_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $products = Product::where('subcategory_id', $subcategory_id)->get();
        return view('pages.products', compact('products', 'categories', 'brands', 'subcategories'));
    }

    public function showProductByCategory($category_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $products = Product::where('category_id', $category_id)->get();
        return view('pages.products', compact('products', 'categories', 'brands', 'subcategories'));
    }
}
