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
                        <th class="wd-15p">S/n:</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Category</th>
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
                            <td class="form-inline">
                                <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-info form-control mr-1">Edit</a>
                                <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger text-light">Delete</button>
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
