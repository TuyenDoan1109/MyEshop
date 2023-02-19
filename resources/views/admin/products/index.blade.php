@extends('admin.layouts.app')

@section('content')

{{-- <div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Product Table</h5>
    </div><!-- sl-page-title --> --}}

    @include('admin.layouts.response_message')

    <div class="card p-2">
        <h6 class="card-body-title">
            Product List
            <br><br>
            <a href="{{route('products.create')}}" class="btn btn-sm btn-warning float-left" >Add Product</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">S/n</th>
                        <th class="wd-15p">Code</th>
                        <th class="wd-20p">Name</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-10p">Category</th>
                        <th class="wd-15p">Subcategory</th>
                        <th class="wd-10p">Brand</th>
                        <th class="wd-10p">Quantity</th>
                        <th class="wd-10p">Price</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($products) > 0)
                        @foreach($products as $key=>$product)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_name}} - {{$product->product_size}} - {{$product->product_color}}</td>
                            <td>
                                <img width="100px" height="100px" src="{{asset("storage/backend/img/$product->image_1")}}" alt="">
                            </td>
                            <td>{{ $product->Category->category_name }}</td>
                            <td>{{ $product->Subcategory->subcategory_name }}</td>
                            <td>{{ $product->Brand->brand_name }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ number_format($product->discount_price) }} VNĐ</td>
                            <td class="d-flex align-items-center row-hl">
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-sm btn-warning item-hl mr-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm btn-info item-hl mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger text-light item-hl mr-1" onclick="event.preventDefault();
                                    document.getElementById('delete-product-form-{{$product->id}}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @if($product->status == 1)
                                    <a href="{{route('products.inactive', $product->id)}}" class="btn btn-sm btn-success item-hl">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                @else
                                    <a href="{{route('products.active', $product->id)}}" class="btn btn-sm btn-danger item-hl">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                @endif

                                <form id="delete-product-form-{{$product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST"   style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="9" class="text-center">There are no Products</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
            <div class="flex">
            {{ $products->links() }}
        </div>
    </div><!-- card -->

{{-- </div><!-- sl-pagebody --> --}}
@endsection
