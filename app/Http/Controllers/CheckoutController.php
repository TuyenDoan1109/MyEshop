<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Subcategory;
use App\Product;
use Cart;

class CheckoutController extends Controller
{
    public function checkout() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $shipping_fee = 20000;
        $contents = Cart::content();
        if(Cart::count() > 0) {
            return view('pages.checkout', compact('categories', 'brands', 'subcategories', 'contents', 'shipping_fee'));
        } else {
            return Redirect()->back()->with('toast_error', 'Buy at least one item!');
        }
        
    }

    public function checkoutPayment() {
        
    }
}
