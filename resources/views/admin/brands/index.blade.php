@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Brand Table</h5>
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
        <h6 class="card-body-title">Brand List <a href="#" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#addBrandModal">Add Brand</a></h6>
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
                                <img width="100px" src="{{asset("storage/backend/img/$brand->brand_logo")}}" alt="">
                            </td>
                            <td>
                                <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-brand-form-{{$brand->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-brand-form-{{$brand->id}}" action="{{ route('brand.destroy', $brand->id) }}" method="POST"   style="display: none;">
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

    <div class="modal" id="addBrandModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Add Brand</h5>
                <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input placeholder="Brand name..." name="brand_name" type="text" class="form-control" id="brand_name">
                        </div>
                        <div class="form-group">
                            <label for="brand_logo">Brand Logo</label>
                            <input name="brand_logo" type="file" class="form-control" id="brand_logo">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">Add Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- sl-pagebody -->
@endsection