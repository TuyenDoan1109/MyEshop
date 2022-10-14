@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Edit Category</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('categories.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input value="{{$category->category_name}}" name="category_name" type="text" class="form-control" id="category_name" value="{{old('category_name')}}">
                    <span class="text-danger">@error('category_name') {{$message}} @enderror</span>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Update Category</button>
            </form>
        </div>
    </div>
</div>
@endsection