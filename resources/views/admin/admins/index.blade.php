@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Admin Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Admin List <a href="{{route('admins.create')}}" class="btn btn-sm btn-warning float-right">Add Admin</a></h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">S/N</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Avatar</th>
                        <th class="wd-15p">Email</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Address</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($admins) > 0)
                        @foreach($admins as $key=>$admin)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$admin->name}}</td>
                            <td>
                                @if($admin->avatar)
                                    <img width="100px" height="100px" src="{{asset("storage/backend/img/$admin->avatar")}}" alt="">
                                @else
                                    <img width="100px" height="100px" src="{{asset("storage/backend/img/noimage.jpg")}}" alt="">
                                @endif
                            </td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->phone}}</td>
                            <td>{{$admin->address}}</td>
                            <td class="form-inline">
                                <a href="{{route('admins.edit', $admin->id)}}" class="btn btn-sm btn-info form-control mr-1">Edit</a>
                                <form action="{{ route('admins.destroy', $admin->id)}}" method="POST"
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
                            <td colspan="6" class="text-center">There are no Admins</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->

</div><!-- sl-pagebody -->
@endsection
