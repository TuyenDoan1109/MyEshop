@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Brand Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand List <a href="{{route('brands.create')}}" class="btn btn-sm btn-warning float-right">Add Brand</a></h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p"></th>
                        <th class="wd-15p">Brand Name</th>
                        <th class="wd-15p">Brand Logo</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>                
                    @if(count($brands) > 0)
                        @foreach($brands as $key=>$brand)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td>
                                @if($brand->brand_logo)
                                    <img width="100px" height="100px" src="{{asset("storage/backend/img/$band->brand_logo")}}" alt="">
                                @else
                                    <img width="100px" height="100px" src="{{asset("storage/backend/img/noimage.jpg")}}" alt="">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('brands.edit', $brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-brand-form-{{$brand->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-brand-form-{{$brand->id}}" action="{{ route('brands.destroy', $brand->id) }}" method="POST"   style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3">There are no Brands</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->

</div><!-- sl-pagebody -->
@endsection