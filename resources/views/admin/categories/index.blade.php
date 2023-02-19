@extends('admin.layouts.app')

@section('content')

{{-- <div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Category Table</h5>
    </div><!-- sl-page-title --> --}}

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category List <a href="{{route('categories.create')}}" class="btn btn-sm btn-warning float-right">Add Category</a></h6>
        {{-- <div class="table-wrapper"> --}}
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">S/n:</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($categories) > 0)
                        @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$category->category_name}}</td>
                            <td class="form-inline">
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-info form-control mr-1">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
                        <td colspan="3">There are no Categories</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        {{-- </div><!-- table-wrapper --> --}}
    </div><!-- card -->

{{-- </div><!-- sl-pagebody --> --}}




@endsection
