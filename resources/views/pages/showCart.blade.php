@extends('layouts.app')

@section('content')

@include('layouts.breadcrumb')

<!-- Cart Start -->
<div id="table" class="container-fluid">
    @if(count($contents) > 0)
        <div class="row px-xl-5">
            <div class="col table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th style="width:9rem">Price</th>
                            <th style="width:9rem">Color</th>
                            <th style="width:9rem">Size</th>
                            <th style="width:9rem">Quantity</th>
                            <th style="width:10rem">Total</th>
                            <th style="width:9rem">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($contents as $content)
                            <tr data-id="{{ $content->rowId }}">
                                <td class="align-middle">
                                    <img class="mr-2" src="{{asset('storage/backend/img/' . $content->options->image)}}" alt="" style="width: 50px;">{{$content->name}}
                                </td>
                                <td class="align-middle price">{{number_format($content->price)}} VNĐ</td>
                                <td class="align-middle">{{$content->options->color}}</td>
                                <td class="align-middle">{{$content->options->size}}</td>
                                <td class="align-middle"> 
                                    <input type="number" min="1" value="{{$content->qty}}" class="form-control qty" />
                                </td>
                                <td class="align-middle total">{{number_format($content->price * $content->qty)}} VNĐ</td>
                                <td class="align-middle"><a class="btn btn-sm btn-danger removeCartItem"><i class="fa fa-times"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row px-xl-5 d-flex justify-content-end">
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="initial">{{number_format(Cart::initial())}} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Shipping Fee</h6>
                            <h6 id="shipping-fee" class="font-weight-medium" value="{{$shipping_fee}}">{{number_format($shipping_fee)}} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            
                            <h6 class="font-weight-medium">VAT<small>({{(Cart::tax() / Cart::initial()) * 100}} %)</small></h6>
                            
                            <h6 id="tax" class="font-weight-medium">{{number_format(Cart::tax())}} VNĐ</h6>
                        </div> 
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="total">{{number_format(Cart::total() + $shipping_fee)}} VNĐ</h5>     
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">Your cart is empty!</p >    
    @endif
</div>
<!-- Cart End -->

<script>
    // Update Cart Quantity Ajax
    $(".qty").change(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                rowId: ele.parents("tr").attr("data-id"), 
                qty: ele.parents("tr").find(".qty").val()
            },
            success: function(response) {
                var subtotalElement = ele.parents("tr").find(".total");
                var subtotal = response['result']['price'] * response['result']['qty'];
                var initialElement = $("#initial");
                var initial = Number(response['initial']);
                var taxElement = $("#tax");
                var tax = Number(response['tax']);
                var totalElement = $("#total");
                var total = Number(response['total']) + Number(response['shipping_fee']);
                var cartCountElement = $("#cart-count");
                var cartCount = Number(response['cartCount']);
                subtotalElement.html(subtotal.toLocaleString('en-US') + ' VNĐ');
                initialElement.html(initial.toLocaleString('en-US') + ' VNĐ');
                taxElement.html(tax.toLocaleString('en-US') + ' VNĐ');
                totalElement.html(total.toLocaleString('en-US') + ' VNĐ');
                cartCountElement.html(cartCount);
            } 
        });
    });

    // Delete Cart Item Ajax
    $(".removeCartItem").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var rowId = ele.parents("tr").attr("data-id");
        $.ajax({
            url: '/cart/remove/' + rowId,
            method: "delete",
            data: {
                _token: '{{ csrf_token() }}'
                // rowId: ele.parents("tr").attr("data-id"), 
            },
            success: function(result) {
                var cartCount = Number(result['cartCount']);
                var cartCountElement = $("#cart-count");
                cartCountElement.html(cartCount);
                var itemToRemove = ele.parents("tr");
                itemToRemove.remove();
                var initialElement = $("#initial");
                var initial = Number(result['initial']);
                var taxElement = $("#tax");
                var tax = Number(result['tax']);
                var totalElement = $("#total");
                var total = Number(result['total']) + Number(result['shipping_fee']);
                initialElement.html(initial.toLocaleString('en-US') + ' VNĐ');
                taxElement.html(tax.toLocaleString('en-US') + ' VNĐ');
                totalElement.html(total.toLocaleString('en-US') + ' VNĐ');
                if(cartCount == 0) {
                    var tableElement = $("#table");
                    tableElement.html('<p class="text-center">Your cart is empty!</p >');
                }   
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                if($.isEmptyObject(result.error)) {   
                    Toast.fire({
                    icon: 'success',
                    title: result.success
                    })
                } else {
                    Toast.fire({
                    icon: 'error',
                    title: result.error
                    })
                }
            }
        });
    });
</script>
@endsection