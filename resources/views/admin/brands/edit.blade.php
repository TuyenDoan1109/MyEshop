@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="card">
        <div class="card-header">
            Edit Brand
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input value="{{$brand->brand_name}}" name="brand_name" type="text" class="form-control" id="brand_name">
                </div>
                <div class="form-group">
                    <label>Brand Logo</label>
                    <img width="200px" src="{{asset("storage/backend/img/$brand->brand_logo")}}" alt="">
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