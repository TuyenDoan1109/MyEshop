<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Wishlist extends Model
{
    public static function WishlistItems() {
        $user_id = Auth::user()->id;
        $wishlist_items = Wishlist::with('product')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return $wishlist_items;
    }

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
