@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category List <a href="{{route('categories.create')}}" class="btn btn-sm btn-warning float-right">Add Category</a></h6>
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
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-category-form-{{$category->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-category-form-{{$category->id}}" action="{{ route('categories.destroy', $category->id) }}" method="POST"   style="display: none;">
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

</div><!-- sl-pagebody -->
@endsection