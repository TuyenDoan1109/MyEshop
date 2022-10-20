@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Order Table</h5>
    </div><!-- sl-page-title -->

    @include('admin.layouts.response_message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Order List</h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">STT</th>
                        <th class="wd-15p">Customer Name</th>
                        <th class="wd-15p">Email</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Quantity</th>
                        <th class="wd-15p">Order Total</th>
                        <th class="wd-15p">Payment Method</th>
                        <th class="wd-15p">Shipping Address</th>
                        <th class="wd-15p">Shipping Note</th>
                        <th class="wd-15p">Order Date</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>  
                    @if(count($orders) > 0)
                        @foreach($orders as $key => $order)
                            <tr>
                                <td>{{++$key}}</td>
                                
                                <td>{{$order->shipping->shipping_name}}</td>
                                
                                <td>tuyen@gmail.com</td>
                                <td>0985436371</td>
                                <td>5</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->payment_method_id}}</td>
                                <td>Cau giay</td>
                                <td>Note</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->order_status_id}}</td>
                                <td>view</td> 
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