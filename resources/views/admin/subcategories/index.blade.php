@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Subcategory Table</h5>
    </div><!-- sl-page-title -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Subcategory List <a href="#" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#addSubcategoryModal">Add Subcategory</a></h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p"></th>
                        <th class="wd-15p">Subcategory Name</th>
                        <th class="wd-15p">Category Name</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>                
                    @if(count($subcategories) > 0)
                        @foreach($subcategories as $key=>$subcategory)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>{{$subcategory->Category->category_name}}</td>
                            <td>
                                <a href="{{route('subcategory.edit', $subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-subcategory-form-{{$subcategory->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-subcategory-form-{{$subcategory->id}}" action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST"   style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3">There are no Subcategories</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->

    <div class="modal" id="addSubcategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Add Subcategory</h5>
                <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('subcategory.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="subcategory_name">Subcategory Name</label>
                            <input placeholder="Subcategory name..." name="subcategory_name" type="text" class="form-control" id="subcategory_name">
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
                        <button type="submit" class="btn btn-sm btn-primary">Add Subcategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- sl-pagebody -->
@endsection