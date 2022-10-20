<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function orderItems() {
        $orders = Order::with('shipping')->get();
        return $orders;
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');

    }

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function shipping() {
        return $this->hasOne('App\Shipping', 'id');
    }

    // public static function WishlistItems() {
    //     $user_id = Auth::user()->id;
    //     $wishlist_items = Wishlist::with('product')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
    //     return $wishlist_items;
    // }

    

    
}
