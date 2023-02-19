@extends('admin.layouts.app')

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Edit User</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}">
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone" value="{{$user->phone}}">
                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" value="{{$user->email}}">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" id="address" value="{{$user->address}}">
                    <span class="text-danger">@error('address') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input name="password" type="password" class="form-control" id="password" value="{{old('password')}}">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm New Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirm" value="{{old('password_confirm')}}">
                    <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Old Avatar</label><br>
                    <img width="200px" src="{{asset("storage/backend/img/$user->avatar")}}" alt="">
                </div>
                <div class="form-group">
                    <label for="avatar">Choose New Avatar</label>
                    <input name="avatar" type="file" class="form-control" id="avatar" value="{{old('avatar')}}">
                    <span class="text-danger">@error('avatar') {{$message}} @enderror</span>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection
