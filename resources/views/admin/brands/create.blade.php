@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Create Brand</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input name="brand_name" type="text" class="form-control" id="brand_name" value="{{old('brand_name')}}">
                    <span class="text-danger">@error('brand_name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="brand_logo">Choose Brand Logo</label>
                    <input name="brand_logo" type="file" class="form-control" id="brand_logo" value="{{old('brand_logo')}}">
                    <span class="text-danger">@error('brand_logo') {{$message}} @enderror</span>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Create Brand</button>
            </form>
        </div>
    </div>

</div><!-- sl-pagebody -->
@endsection