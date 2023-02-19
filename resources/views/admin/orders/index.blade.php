@extends('admin.layouts.app')

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Order List</h5>
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
                        <th class="wd-15p">Order Status</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>

                <tbody>  
                    @if(count($orders) > 0)
                        @foreach($orders as $key => $order)
                            <tr data-id={{$order->id}}>
                                <td>{{++$key}}</td>
                                <td>{{$order->shipping->shipping_name}}</td>
                                <td>{{$order->shipping->shipping_email}}</td>
                                <td>{{$order->shipping->shipping_phone}}</td>
                                <td>{{count($order->order_details)}} products</td>
                                <td>{{number_format($order->order_total)}} VNĐ</td>
                                <td>{{$order->payment_method->name}}</td>
                                <td>{{$order->shipping->shipping_address}}</td>
                                <td>{{$order->shipping->shipping_note}}</td>
                                <td>{{date_format($order->created_at, "d/m/y H:i:s")}}</td>
                                <td>
                                    <select class="order-status-backend text-light p-2
                                        @switch($order->order_status->name)
                                            @case('Processing')
                                                bg-warning
                                            @break

                                            @case('Accepted')
                                                bg-primary
                                            @break

                                            @case('On Delivery')
                                                bg-info
                                            @break

                                            @case('Delivered')
                                                bg-success
                                            @break

                                            @case('Cancelled')
                                                bg-danger
                                            @break
                                        @endswitch

                                        " name="order_status_id">
                                        @foreach($order_statuses as $order_status)
                                            <option class="bg-dark" @if($order_status->id == $order->order_status_id) selected  @endif value="{{$order_status->id}}">{{$order_status->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="d-flex align-items-center row-hl">
                                    <a href="{{route('orders.show', $order->id)}}" class="btn btn-sm btn-warning item-hl mr-1"><i class="fa fa-eye"></i></a>    
                                    <a href="#" class="btn btn-sm btn-info item-hl mr-1"><i class="fa fa-edit"></i></a>    
                                    <a class="btn btn-sm btn-danger item-hl text-light"
                                        onclick = "event.preventDefault();
                                        document.getElementById('delete-order-form-{{$order->id}}').submit();"
                                        >
                                        <i class="fa fa-trash"></i>
                                    </a>    
                                    <form id="delete-order-form-{{$order->id}}" action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td> 
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12" class="text-center">There are no Orders</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->

</div><!-- sl-pagebody -->
@endsection