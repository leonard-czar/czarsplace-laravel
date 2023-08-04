@extends('layouts.portal')

@section('content')

@if ($orders->count()>0)

@foreach ($orders as $order)
@php
$kanta = 1;
@endphp
<div class="row justify-content-center text-center alert alert-primary">
    <div class="col-sm-10 text-dark ">
        <b>ORDER ID </b>: CZP {{$order->id}} |
        <b>ORDER STATUS </b>: @if ($order->payment && $order->payment->payment_status == "complete")
        <span class='text-success'><b> {{$order->payment->payment_status}} </b> </span> |
        @else
        <span class='text-danger'> {{$order->payment?->payment_status}} </span> |
        @endif
        <b>ORDER DATE </b>: {{date('jS M Y', strtotime($order->created_at))}} |
        <b>ORDER TOTAL </b>: {{$order->total_amount}}
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-10 mb-5 mt-2 table-responsive">

        <table class="table table-hover table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th></th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                $kanta = 1;
                @endphp
                @foreach ($order->orderdetails as $detail)
                <tr>
                    <td>{{$kanta++ }}</td>
                    <td><img src="{{$detail->products->watch_image }}" alt="" width="45" class="img-fluid"> </td>
                    <td> {{$detail->qty}} </td>
                    <td>{{$detail->unit_price}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endforeach
@endif
@if ($orders->count()<1) <div class="row justify-content-center text-center ">
    <div class="col-sm alert alert-secondary ">
        <h2 style="font-family: czars2;">You Haven't placed any order yet</h2>
    </div>
    </div>

    @endif

    @endsection