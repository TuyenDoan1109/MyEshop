@extends('admin.layouts.app')

@section('content')
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Create Subcategory</h5>
        </div><!-- sl-page-title -->

        @include('admin.layouts.response_message')

        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('subcategories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name</label>
                        <input name="subcategory_name" type="text" class="form-control" id="subcategory_name" value="{{old('subcategory_name')}}">
                        <span class="text-danger">@error('subcategory_name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Create Subcategory</button>
                </form>
            </div>
        </div>
    </div><!-- sl-pagebody -->
@endsection