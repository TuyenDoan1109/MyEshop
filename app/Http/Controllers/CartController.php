<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Cart;
use App\Models\Wishlist;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $id = $request->product_id;

        $qty = $request->product_qty ?? 1;
        $product = Product::find($id); 
        $color = $request->product_color ?? $product->product_color;
        $data = array();
        $data['id'] = $id;
        $data['name'] = $product->product_name . ' - ' . $product->product_size . ' - ' . $product->product_color;
        $data['qty'] = $qty;
        $data['price'] = $product->discount_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_1;
        $data['options']['size'] = $product->product_size;
        $data['options']['color'] = $color;
        $data['options']['code'] = $product->product_code;
        Cart::add($data);

        $currentURL = url()->current();
        $wishlist_count = 0;
        if(Auth::Check() && strpos($currentURL, 'wishlist') >= 0) {
            $user_id = Auth::id();
            $wishlist_item = Wishlist::where('user_id', $user_id)->where('product_id', $id)->first();
            if($wishlist_item){
                $wishlist_item->delete();
            }
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        
        return response()->json([
            'success' => 'Product added successfully',
            'cartCount' => Cart::count(), 
            'wishlist_count' => $wishlist_count
        ]);
    }

    public function showCart() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $contents = Cart::content();
        $shipping_fee = 20000;
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.showCart', compact('categories', 'brands', 'subcategories', 'contents', 'shipping_fee', 'wishlist_count', 'currentURL'));
    }

    public function removeCartItem(Request $request, $rowId) {
        Cart::remove($rowId);
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
                'shipping_fee' => '20000',
                'result' => Cart::get($rowId),
                'cart' => Cart::content(),
                'initial' => Cart::initial(),
                'tax' => Cart::tax(),
                'total' => Cart::total(),
                'cartCount' => Cart::count(), 
                
            ]);
        } else {
            return $result = Cart::get($rowId);
        }
    }
}
