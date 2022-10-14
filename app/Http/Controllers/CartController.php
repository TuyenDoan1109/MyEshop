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
        $id = $request->product_id;
        $color = $request->product_color;
        $qty = $request->product_qty;
        $product = Product::find($id); 
        $data = array();
        $data['id'] = $id;
        $data['name'] = $product->product_name . ' - ' . $product->product_size;
        $data['qty'] = $qty;
        $data['price'] = $product->discount_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_1;
        $data['options']['size'] = $product->product_size;
        $data['options']['color'] = $color;
        Cart::add($data);
        return response()->json([
            'success' => 'Product added successfully',
            'cartCount' => Cart::count()
        ]);
    }

    public function showCart() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $contents = Cart::content();
        $shipping_fee = 20000;
        return view('pages.showCart', compact('categories', 'brands', 'subcategories', 'contents', 'shipping_fee'));
    }

    public function removeCartItem(Request $request, $id) {
        Cart::remove($id);
        return response()->json([
            'cartCount' => Cart::count(), 
            'success' => 'Product removed successfully',
            'initial' => Cart::initial(),
            'tax' => Cart::tax(),
            'total' => Cart::total(),
            'shipping_fee' => '20000'
        ]);
    }

    public function updateCart(Request $request) { 
        $qty = $request->qty;
        $rowId = $request->rowId;
        if($qty > 0) {
            Cart::update($rowId, $qty);
            return response()->json([
                'result' => Cart::get($rowId),
                'cart' => Cart::content(),
                'initial' => Cart::initial(),
                'tax' => Cart::tax(),
                'total' => Cart::total(),
                'cartCount' => Cart::count(), 
                'shipping_fee' => '20000'
            ]);
        } else {
            return $result = Cart::get($rowId);
        }
    }
}
