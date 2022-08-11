@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Product Table</h5>
    </div><!-- sl-page-title -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">
            Product List 
            <a href="{{route('product.create')}}" class="btn btn-sm btn-warning float-right" >Add Product</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Product Code</th>
                        <th class="wd-15p">Product Name</th>
                        <th class="wd-15p">Product Image</th>
                        <th class="wd-15p">Category</th>
                        <th class="wd-15p">Subcategory</th>
                        <th class="wd-15p">Brand</th>
                        <th class="wd-15p">Quantity</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>                
                    @if(count($products) > 0)
                        @foreach($products as $key=>$product)
                        <tr>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>
                                <img width="100px" src="{{asset("storage/backend/img/$product->image_1")}}" alt="">
                            </td>
                            <td>{{ $product->Category->category_name }}</td>
                            <td>{{ $product->Subcategory->subcategory_name }}</td>
                            <td>{{ $product->Brand->brand_name }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td class="d-flex align-items-center row-hl">
                                <a href="{{route('product.show', $product->id)}}" class="btn btn-sm btn-warning item-hl mr-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-info item-hl mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger text-light item-hl mr-1" onclick="event.preventDefault();
                                    document.getElementById('delete-product-form-{{$product->id}}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @if($product->status == 1)
                                    <a href="{{route('product.inactive', $product->id)}}" class="btn btn-sm btn-success item-hl">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                @else
                                    <a href="{{route('product.active', $product->id)}}" class="btn btn-sm btn-danger item-hl">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                @endif
                                
                                <form id="delete-product-form-{{$product->id}}" action="{{ route('product.destroy', $product->id) }}" method="POST"   style="display: none;">
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
    </div><!-- card -->

</div><!-- sl-pagebody -->
@endsection