@extends('layouts.admin')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>Order Details</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-10 mb-sm-2 mt-sm-2 table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th>Detail ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $kanta = 1;
                @endphp
                @foreach($orders as $detail)            
                    <tr>
                        <td>{{$kanta++ }} </td>
                        <td>{{$detail->id}}  </td>
                        <td>{{$detail->product_id}}  </td>
                        <td>{{$detail->qty}} </td>
                        <td>{{$detail->unit_price}} </td>
                        <td>{{$detail->total}} </td>
                    </tr>
                    @endforeach


            </tbody>
        </table>
    </div>
    <div class="text-center mb-3" style="text-decoration:underline"><a href="/allorders" class="text-primary">Back</a></div>
</div>
@endsection