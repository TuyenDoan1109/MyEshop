@extends('layouts.app')

@section('content')

@include('layouts.breadcrumb')

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Add to Cart</th>
                        <th>Remove from Wishlist</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($wishlists as $wishlist)
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">{{$wishlist->product_id}}</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-success"><i class="fa fa-check"></i></i></button></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection