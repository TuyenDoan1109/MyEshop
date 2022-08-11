@extends('layouts.app')

@section('content')

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($contents as $content)
                        <tr>
                            <td class="align-middle"><img src="{{asset('storage/backend/img/' . $content->options->image)}}" alt="" style="width: 50px;">{{$content->name}}</td>
                            <td class="align-middle">{{number_format($content->price)}} VNĐ</td>
                            <td class="align-middle">Red</td>
                            <td class="align-middle">64G</td>
                            <td class="align-middle">{{$content->qty}}</td>
                            <td class="align-middle">{{number_format($content->price * $content->qty)}} VNĐ</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="align-middle">Total Payment: {{number_format(Cart::total() - $shipping_fee)}} VNĐ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Your Shipping Information</span></h5>
            <form action="{{route('checkout.payment')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input class="form-control" type="text" id="name" placeholder="Enter your name...">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" type="email" id="email" placeholder="Enter your email...">
                </div>
                <div class="form-group">
                    <label for="phone">Your Phone Number</label>
                    <input class="form-control" type="text" id="phone" placeholder="Enter your phone number...">
                </div>
                <div class="form-group">
                    <label for="address">Your Address</label>
                    <input class="form-control" type="text" id="address" placeholder="Enter Your Address...">
                </div>
                <div class="form-group">
                    <label for="address">Note</label>
                    <textarea class="form-control" type="textarea" id="note" placeholder="Enter Your Note..."></textarea>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection