@extends('layouts.admin')

@section('title','Admin Dashboard |')
@section('content')

<div class="row">
    <div class="col-sm text-center alert alert-info">
        <span style="font-size: 1.7vw;">Hi </span>
        <span>
            {{$username}}
        </span>
    </div>
</div>
{{-- @if(isset($_REQUEST['addproduct'])) 
    <div class="row mt-3 mb-3">
        <div class="col-sm text-center alert alert-success">
            <span style="font-size: 1.7vw;">Product Added Successfully</span>
        </div>
    </div>
    @endif --}}
<div class="container-fluid-sm">
    <div class="row justify-content-center m-sm-5">
        <div class="col-sm-2 m-sm-3 text-center p-2 bg-primary text-light" style="box-shadow:2px 3px 6px #050C24;height:100px ">
            <div> Available Products</div>
            <hr>
            <div> {{$products->count()}}</div>
        </div>
        <div class="col-sm-2  m-sm-3 text-center p-2 text-light" style="box-shadow:2px 3px 6px #050C24; background-color:#2274A5 ">
            <div>Featured Brands</div>
            <hr>
            <div>{{$brands->count()}} </div>

        </div>
        <div class="col-sm-2  m-sm-3 text-center p-2 text-light" style="box-shadow:2px 3px 6px #050C24;background-color:#E8AA14 ">
            <div>Total Orders</div>
            <hr>
            <div>{{$orders->count()}} </div>
        </div>
        <div class="col-sm-2  m-sm-3 text-center p-2 text-light" style="box-shadow:2px 3px 6px #050C24;background-color:#47A025 ">
            <div>Customers</div>
            <hr>
            <div>{{$users->count()}} </div>
        </div>
        <div class="col-sm-2 m-sm-3 text-center p-2 bg-success text-light" style="box-shadow:2px 3px 6px #050C24;height:100px ">
            <div>Total Payment</div>
            <hr>
            <div>{{$payments->count()}} </div>
        </div>
    </div>
</div>

@endsection