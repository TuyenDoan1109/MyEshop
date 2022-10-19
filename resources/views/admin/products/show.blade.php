@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Product Detail Page</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message') 

    <div class="card pd-20 pd-sm-40">
        <div class="form-layout">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Product Name: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->product_name}} - {{$product->product_size}} - {{$product->product_color}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Product Code: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->product_code}}</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Selling Price: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->selling_price}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Discount Price: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->discount_price}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Product Quantity: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->product_quantity}}</strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label>Category: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->Category->category_name}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label>Subcategory: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->Subcategory->subcategory_name}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label>Brand: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->Brand->brand_name}}</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Product Size: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->product_size}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Product Color: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->product_color}}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Video Link: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{$product->video_link}}</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Image 1(Main Thumbnail): <span class="tx-danger">*</span></label>
                        </div>
                        <img height="100" width="100" src="{{asset('storage/backend/img/' . $product->image_1)}}" alt="" id="image_1">
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Image 2: <span class="tx-danger">*</span></label>
                        </div>
                        <img height="100" width="100" src="{{asset('storage/backend/img/' . $product->image_2)}}" alt="" id="image_2">
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Image 3: <span class="tx-danger">*</span></label>
                        </div>
                        <img height="100" width="100" src="{{asset('storage/backend/img/' . $product->image_3)}}" alt="" id="image_3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Product Detail: <span class="tx-danger">*</span></label>
                            <br>
                            <p>{!! $product->product_detail !!}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <label>
                            @if($product->main_slider == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif 
                            <span>Main Slider</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label>
                            @if($product->hot_deal == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif 
                            <span>Hot Deal</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if($product->best_rated == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif 
                            <span>Best Rated</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label>
                            @if($product->trend == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif 
                            <span>Trend</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label>
                            @if($product->mid_slider == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif 
                            <span>Mid Slider</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label>
                            @if($product->hot_new == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif 
                            <span>Hot New </span>
                        </label>
                    </div> 
                </div>
        </div>
    </div><!-- card -->
</div><!-- sl-pagebody -->
@endsection