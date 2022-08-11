@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category List <a href="#" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#addCategoryModal">Add Category</a></h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p"></th>
                        <th class="wd-15p">Category Name</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>                
                    @if(count($categories) > 0)
                        @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-category-form-{{$category->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-category-form-{{$category->id}}" action="{{ route('category.destroy', $category->id) }}" method="POST"   style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3">There are no Categories</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->

    <div class="modal" id="addCategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input placeholder="Category name..." name="category_name" type="text" class="form-control" id="category_name">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- sl-pagebody -->
@endsection