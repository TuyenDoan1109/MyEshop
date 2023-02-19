@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Create Admin</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone" value="{{old('phone')}}">
                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" value="{{old('email')}}">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" id="address" value="{{old('address')}}">
                    <span class="text-danger">@error('address') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" value="{{old('password')}}">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirm" value="{{old('password_confirm')}}">
                    <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="avatar">Choose Avatar</label>
                    <input name="avatar" type="file" class="form-control" id="avatar" value="{{old('avatar')}}">
                    <span class="text-danger">@error('avatar') {{$message}} @enderror</span>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary float-right">Create Admin</button>
            </form>
        </div>
    </div>

</div><!-- sl-pagebody -->
@endsection
