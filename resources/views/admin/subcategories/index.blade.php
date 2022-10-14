@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Subcategory Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')   

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Subcategory List <a href="{{route('subcategories.create')}}" class="btn btn-sm btn-warning float-right">Add Subcategory</a></h6>
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
                                <a href="{{route('subcategories.edit', $subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-subcategory-form-{{$subcategory->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-subcategory-form-{{$subcategory->id}}" action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST"   style="display: none;">
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

</div><!-- sl-pagebody -->
@endsection