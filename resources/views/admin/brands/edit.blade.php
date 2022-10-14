@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Edit Brand</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input value="{{$brand->brand_name}}" name="brand_name" type="text" class="form-control" id="brand_name">
                    <span class="text-danger">@error('brand_name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Brand Logo</label><br>
                    @if($brand->brand_logo)
                        <img width="200px" src="{{asset("storage/backend/img/$brand->brand_logo")}}" alt="">
                    @else
                        <img width="200px" src="{{asset("storage/backend/img/noimage.jpg")}}" alt="">
                    @endif
                </div>
                <div class="form-group">
                    <label for="brand_name">Choose Brand Logo</label>
                    <input name="brand_logo" type="file" class="form-control" id="brand_logo">
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Update Brand</button>
            </form>
        </div>
    </div>
</div>
@endsection