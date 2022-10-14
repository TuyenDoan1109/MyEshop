@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Add Category</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input placeholder="Category name..." name="category_name" type="text" class="form-control" id="category_name" value="{{old('category_name')}}">
                    <span class="text-danger">@error('category_name') {{$message}} @enderror</span>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>
@endsection