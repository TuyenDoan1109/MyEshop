@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Coupon Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Coupons List</h6>
        <p>Coupons index</p>
    </div><!-- card -->

</div><!-- sl-pagebody -->
@endsection