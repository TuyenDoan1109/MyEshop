<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function orderItems() {
        $orders = Order::with('shipping')->with('order_details')->with('payment_method')->with('order_status')->get();
        return $orders;
    }

    public static function orderItem($order_id) {
        $order = Order::find($order_id)->with('order_details')->with('payment_method')->with('order_status')->first();
        return $order;
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function shipping() {
        return $this->hasOne('App\Models\Shipping', 'id', 'shipping_id');
    }

    public function order_details() {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function payment_method() {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'payment_method_id');
    }

    public function order_status() {
        return $this->hasOne('App\Models\OrderStatus','id', 'order_status_id');
    }
}
