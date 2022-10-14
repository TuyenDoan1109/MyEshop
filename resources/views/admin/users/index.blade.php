@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>User Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">User List <a href="{{route('users.create')}}" class="btn btn-sm btn-warning float-right">Add User</a></h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">S/N</th>
                        <th class="wd-15p">User Name</th>
                        <th class="wd-15p">User Avatar</th>
                        <th class="wd-15p">User Email</th>
                        <th class="wd-15p">User Phone</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>                
                    @if(count($users) > 0)
                        @foreach($users as $key=>$user)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->avatar)
                                    <img width="100px" height="100px" src="{{asset("storage/backend/img/$user->avatar")}}" alt="">
                                @else
                                    <img width="100px" height="100px" src="{{asset("storage/backend/img/noimage.jpg")}}" alt="">
                                @endif
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a class="btn btn-sm btn-danger text-light" onclick="event.preventDefault();
                                    document.getElementById('delete-user-form-{{$user->id}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-user-form-{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST"   style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">There are no Users</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->

</div><!-- sl-pagebody -->
@endsection