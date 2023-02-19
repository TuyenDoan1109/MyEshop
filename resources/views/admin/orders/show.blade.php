@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h4>Order Detail</h4>
    </div><!-- sl-page-title -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Shipping Detail</h5>
                    <table class="table">
                        <tr>
                            <th>Name: </th>
                            <th class="text-muted">{{$order->shipping->shipping_name}}</th>		
                        </tr>
                        <tr>
                            <th>Phone: </th>
                            <th class="text-muted">{{$order->shipping->shipping_phone}}</th>		
                        </tr>
                        <tr>
                            <th>Payment Method: </th>
                            <th class="text-muted">{{$order->payment_method->name}}</th>		
                        </tr>
                        <tr>
                            <th>Address: </th>
                            <th class="text-muted">{{$order->shipping->shipping_address}}</th>		
                        </tr>
                        <tr>
                            <th>Total :</th>
                            <th class="text-muted">{{number_format($order->order_total)}} VNĐ</th>		
                        </tr>
                        <tr>
                            <th>Date: </th>
                            <th class="text-muted">{{date_format($order->created_at, "d/m/y H:i:s")}}</th>		
                        </tr>
                        <tr>
                            <th>Note: </th>
                            <th class="text-muted">{{$order->shipping->shipping_note}}</th>		
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product Detail</h5>
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">STT</th>
                                <th class="wd-15p">Product Code</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Size</th>
                                <th class="wd-15p">Color</th>
                                <th class="wd-15p">Quantity</th>
                                <th class="wd-15p">Price</th>
                                <th class="wd-15p">Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($order->order_details as $key => $product)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$product->product_code}}</td>
                                    <td>
                                        <a href="{{route('products.show', $product->product_id)}}">
                                            <img width="100px" height="100px" src="{{asset("storage/backend/img/$product->product_image")}}" alt="">
                                        </a>
                                        <br>
                                        {{$product->product_name}}
                                    </td>
                                    <td>{{$product->product_size}}</td>
                                    <td>{{$product->product_color}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{number_format($product->product_price * $product->product_quantity)}} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection