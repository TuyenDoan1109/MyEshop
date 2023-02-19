<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;

class WishlistController extends Controller
{
    public function addWishlist($product_id) {
        if(Auth::Check()) {
            $user_id = Auth::id();

            $checkExist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
            if($checkExist) {
                return \Response::json(['error' => 'Product Already have in Your Wishlist']);
            } else {
                $wishlist = new Wishlist;
                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
                $wishlist_count = Wishlist::where('user_id', $user_id)->count();
                return \Response::json([
                    'success' => 'Product Added on wishlist',
                    'wishlist_count' => $wishlist_count
                ]);
            }
        } else {
            return \Response::json(['error' => 'Login Your Acount first!']);
        }
    }

    public function indexWishlist() {
        $user_id = Auth::id(); 
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlist_items = Wishlist::WishlistItems();
        $wishlist_count = $wishlist_items->count();
        $currentURL = url()->current();
        return view('pages.indexWishlist', compact('categories', 'brands', 'subcategories', 'wishlist_items', 'wishlist_count', 'currentURL'));
    }

    public function removeWishlist(Request $request, $product_id) {
        $user_id = Auth::id(); 
        $wishlist_item = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        $wishlist_item->delete();
        $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        return \Response::json([
            'success' => 'Product deleted successfully',
            'wishlist_count' => $wishlist_count
        ]);
    }

}
