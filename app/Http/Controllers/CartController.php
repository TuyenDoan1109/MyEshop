<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Subcategory;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $data = array();
        $data['id'] = $product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = $request->qty;
        $data['price'] = $product->discount_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_1;
        Cart::add($data);
        return Redirect()->back()->with('toast_success', 'Product Added to Your Cart Successfully');
    }

    public function showCart() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $contents = Cart::content();
        $shipping_fee = 20000;
    
        return view('pages.showCart', compact('categories', 'brands', 'subcategories', 'contents', 'shipping_fee'));
    }

    public function removeCartItem($rowId) {
        Cart::remove($rowId);
        return redirect(route('cart.index'))->with('toast_success', 'Item removed successfully from your Cart');
    }

    public function updateCart(Request $request, $rowId) {
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return redirect(route('cart.index'))->with('toast_success', 'Updated Cart Successfully');
    }
}
