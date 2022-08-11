@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input value="{{$category->category_name}}" name="category_name" type="text" class="form-control" id="category_name">
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Update Category</button>
            </form>
        </div>
    </div>
</div>
@endsection