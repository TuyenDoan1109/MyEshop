<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Shipping;
use App\Models\OrderStatus;
use Auth;
use App\Models\Wishlist;

class CheckoutController extends Controller
{
    public function checkout() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $shipping_fee = 20000;
        $contents = Cart::content();
        $payment_methods = PaymentMethod::where('status', '1')->get();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        if(Cart::count() > 0) {
            return view('pages.checkout', compact('categories', 'brands', 'subcategories', 'contents', 'shipping_fee', 'payment_methods', 'wishlist_count', 'currentURL'));
        } else {
            return Redirect()->back()->with('toast_error', 'Buy at least one item!');
        }
        
    }

    public function checkoutPayment(Request $request) {
        if(Cart::count() > 0) {
            $this->validate($request, [
                'shipping_name' => 'required|string|max:255',
                'shipping_address' => 'required|string|max:255',
                'shipping_phone' => 'required|string|max:255',
                'shipping_email' => 'required|email|max:255',
                'shipping_note' => 'nullable|string',
                'payment_method_id' => 'required'
            ]);
    
            $categories = Category::all();
            $brands = Brand::all();
            $subcategories = Subcategory::all();
    
            $shipping = new Shipping;
            $shipping->shipping_name = $request->shipping_name;
            $shipping->shipping_address = $request->shipping_address;
            $shipping->shipping_phone = $request->shipping_phone;
            $shipping->shipping_email = $request->shipping_email;
            $shipping->shipping_note = $request->shipping_note;
            $shipping->save();
    
            $shipping_fee = 20000;
            $order_status_id = OrderStatus::where('name', 'Processing')->first()->id;
    
            $order = new Order;
            if(Auth::check()) {
                $order->user_id = Auth::user()->id;
            }
            $order->shipping_id = $shipping->id;
            $order->payment_method_id = $request->payment_method_id;
            $order->order_total = Cart::total() + $shipping_fee;
            $order->order_status_id = $order_status_id;
            $order->save();
    
            $contents = Cart::content();
            foreach ($contents as $content) {
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $content->id;
                $order_detail->product_name = $content->name;
                $order_detail->product_price = $content->price;
                $order_detail->product_color = $content->options->color;
                $order_detail->product_size = $content->options->size;
                $order_detail->product_code = $content->options->code;
                $order_detail->product_image = $content->options->image;
                $order_detail->product_quantity = $content->qty;
                $order_detail->save();
            }
            Cart::destroy();
            $wishlist_count = 0;
            if(Auth::check()) {
                $user_id = Auth::user()->id;
                $wishlist_count = Wishlist::where('user_id', $user_id)->count();
            }
            $currentURL = url()->current();
            return view('pages.succeedOrder', compact('categories', 'brands', 'subcategories', 'wishlist_count', 'currentURL'));
        } else {
            return redirect()->back()->with('error', 'Buy at least 1 product');
        }
    }
}
