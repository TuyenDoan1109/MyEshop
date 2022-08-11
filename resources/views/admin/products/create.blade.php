@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Add New Product Form</h5>
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
        <div class="form-layout">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_name" placeholder="Enter product name...">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code" placeholder="Enter product code...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Selling Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="selling_price" placeholder="Enter selling price...">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Discount Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="discount_price" placeholder="Enter discount price...">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Product Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_quantity" placeholder="Enter product quantity...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label>Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="category_id" id="category">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label>Subcategory: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="subcategory_id" id="subcategory">
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label>Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="brand_id">
                                <option value="">Choose Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Product Size: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_size" id="product_size" data-role="tagsinput" placeholder="Enter product size...">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Product Color: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_color" id="product_color" data-role="tagsinput" placeholder="Enter product color...">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Video Link: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="video_link" placeholder="Enter video link...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Image 1(Main Thumbnail): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image_1" onchange="readURL1(this);">
                        </div>
                        <img src="#" alt="" id="image_1">
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Image 2: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image_2" onchange="readURL2(this);">
                        </div>
                        <img src="#" alt="" id="image_2">
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Image 3: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image_3" onchange="readURL3(this);">
                        </div>
                        <img src="#" alt="" id="image_3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Product Detail: <span class="tx-danger">*</span></label>
                            <textarea id="article-ckeditor" class="form-control" name="product_detail"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="ckbox">
                          <input type="checkbox" name="main_slider" value="1">
                          <span>Main Slider</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deal" value="1">
                            <span>Hot Deal</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="best_rated" value="1">
                            <span>Best Rated</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="trend" value="1">
                            <span>Trend</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="mid_slider" value="1">
                            <span>Mid Slider</span>
                        </label>
                    </div> 
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_new" value="1">
                            <span>Hot New </span>
                        </label>
                    </div> 
                </div>
                <button class="btn btn-info mg-r-5 float-right px-5">Submit</button>
            </form>
        </div>
    </div><!-- card -->
</div><!-- sl-pagebody -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>

    $(document).ready(function() {
        $('#category').change(function() {
            let category_id = $(this).val();
            $.ajax({
                url:'/admin/product/getSubcategory',
                type:'post',
                data:'category_id=' + category_id + '&_token={{csrf_token()}}',
                success:function(result) {
                    $('#subcategory').html(result);
                } 
            });
        });
    });

    function readURL1(input){
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_1')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input){
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_2')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL3(input){
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_3')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection