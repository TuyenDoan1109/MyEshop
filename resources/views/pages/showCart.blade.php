@extends('layouts.app')

@section('content')

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col table-responsive mb-5">
            @if(count($contents) > 0)
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($contents as $content)
                        <tr>
                            <td class="align-middle"><img src="{{asset('storage/backend/img/' . $content->options->image)}}" alt="" style="width: 50px;">{{$content->name}}</td>
                            <td class="align-middle">{{number_format($content->price)}} VNĐ</td>
                            <td class="align-middle">Red</td>
                            <td class="align-middle">64G</td>
                            <td class="align-middle">
                                <form action="{{route('cart.update', $content->rowId)}}" method="post">
                                    @csrf
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button name="submit" class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="number" name="qty" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$content->qty}}">
                                        <div class="input-group-btn">
                                            <button name="submit" class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </td>
                            <td class="align-middle">{{number_format($content->price * $content->qty)}} VNĐ</td>
                            <td class="align-middle"><a href="{{route('cart.remove', $content->rowId)}}" class="btn btn-sm btn-danger removeCartItem"><i class="fa fa-times"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-center">Your cart is empty!</p >    
            @endif
        </div>
    </div>
    
    @if(count($contents) > 0)
        <div class="row px-xl-5 d-flex justify-content-end">
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>{{number_format(Cart::initial())}} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Shipping Fee</h6>
                            <h6 class="font-weight-medium">{{number_format($shipping_fee)}} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            
                            <h6 class="font-weight-medium">VAT<small>({{(Cart::tax() / Cart::initial()) * 100}} %)</small></h6>
                            
                            <h6 class="font-weight-medium">{{number_format(Cart::tax())}} VNĐ</h6>
                        </div> 
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{number_format(Cart::total() - $shipping_fee)}} VNĐ</h5>     
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- Cart End -->

@endsection