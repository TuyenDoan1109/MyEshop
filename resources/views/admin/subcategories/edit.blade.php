@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Edit Subcategory</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('subcategories.update', $subcategory->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="subcategory_name">Subcategory Name</label>
                    <input value="{{$subcategory->subcategory_name}}" name="subcategory_name" type="text" class="form-control" id="subcategory_name">
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option 
                                @if($category->id == $subcategory->category_id)
                                selected
                                @endif
                                value="{{$category->id}}">
                                {{$category->category_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Update Subcategory</button>
            </form>
        </div>
    </div>
</div>
@endsection