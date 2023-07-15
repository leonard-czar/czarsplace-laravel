@extends('layouts.admin')

@section('content')

@if(count($orders)>0)
<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>All Orders</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-10 mb-sm-4 mt-sm-3 table-responsive">
        <table class="table table-hover table-striped " id="my_table">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Order Status</th>
                    <th>Total Amount</th>
                    <th>Shipping Address</th>
                    <th>Alt Phonumber</th>
                    <th>Order Date</th>
                    <th>Order Details</th>
                </tr>
            </thead>
            <tbody>
                @php
                $kanta = 1;
                @endphp
                @foreach ($orders as $order)

                <tr>
                    <td> {{$kanta++ }}</td>
                    <td> {{"CZP" . $order->id }}</td>
                    <td>{{$order->user_id}} </td>
                    <td>{{$order->payment?->payment_status}} </td>
                    <td> {{$order->total_amount}}</td>
                    <td>{{$order->shipping_address}} </td>
                    <td> {{$order->alt_phonenumber}}</td>
                    <td> {{date('jS M Y h:i:s a', strtotime($order->created_at))}} </td>
                    <td>
                        <form action="/orderdetails/{{$order->id}}" method="get">
                            @csrf
                            <input type="submit" name="" value="Details" class="btn btn-primary btn-sm">
                        </form>
                    </td>


                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@else

<div class="row justify-content-center">
    <div class="col-sm alert alert-warning text-center">
        <h3>No Orders Yet</h3>
    </div>
</div>
@endif

@endsection