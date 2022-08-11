<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Brand;
use App\Category;
use App\Subcategory;

class WishlistController extends Controller
{
    public function addWishlist($product_id) {
        $user_id = Auth::id();

        if(Auth::Check()) {
            $check = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
            if($check){
                return \Response::json(['error' => 'Product Already have in Your Wishlist']);
            } else {
                $wishlist = new Wishlist;
                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
                return \Response::json(['success' => 'Product Added on wishlist']);
            }
        } else {
            return \Response::json(['error' => 'Login Your Acount first!']);
        }
    }

    public function showWishlist($user_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlists = Wishlist::where('user_id', $user_id)->get();
        
        return view('pages.showWishlist', compact('categories', 'brands', 'subcategories', 'wishlists'));
    }

}
