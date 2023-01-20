@extends('layouts.portal')

@section('title','Watch Info |')
@section('content')
<div class="container-fluid-sm">
    <div class="row text-center">
        <div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div>

                <img src="{{asset($product->watch_image)}}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-4 mt-sm-3">
            <h4 style="font-family: czars2;">{{$product->watch_description}}</h4>
            <div style="color:rgba(0, 0, 0,0.8);" class="mb-sm-4">&#8358;{{$product->watch_price}}</div>
            <label for="" class="mb-sm-1 ">Quantity</label>
            <form action="{{route('cart')}}" method="POST">
                @csrf
                <input type="number" name="qty" id="qty" value="1" class="form-control @error('qty') is-invalid @enderror mb-sm-2">
                 @error('qty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="hidden" value="{{$product->watch_price}}" name="price">
                <input type="hidden" value="{{$product->id}}" name="watchid">
                <input type="submit" name="buynow" id="addcart" style="border: 1px solid #fbd079; color:black;
 background-color:#fbd079;font-weight:500px" value="BUY NOW" class="btn form-control mb-sm-5 mt-sm-1">

            </form>
            <h5 style="font-family: czars2;  ">WATCH SPECIFICATIONS</h5>


            <ul style="list-style-type:square ;font-family: czars2;" class="mb-sm-5">
                <li>Brand: </li>
                <li>Collection: {{$product->collection}}</li>
                <li>Reference Number: {{$product->reference_number}}</li>
                <li>Gender: {{$product->gender}}</li>
                <li>Movement: {{$product->movement}}</li>
                <li>Dial: {{$product->dial}}</li>
                <li>Bezel: {{$product->Bezel}}</li>
                <li>Crystal: {{$product->crystal}}</li>
                <li>Caliber: {{$product->caliber}}</li>
                <li>Watch Function: {{$product->watch_function}}</li>
                <li>Mechanism: {{$product->mechanism}}</li>
                <li>Number of Jewels: {{$product->number_of_jewels}}</li>
                <li>Total Diameter: {{$product->total_diameter}}</li>
                <li>Power Reserve: {{$product->power_reserve}}</li>
                <li>Number of Parts:{{$product->number_of_parts}}</li>
                <li>Frequency:{{$product->frequency}}</li>
                <li>Bracelet: {{$product->bracelet}}</li>
                <li>Clasp: {{$product->clasp}}</li>
                <li>Water Resistance: {{$product->water_resistance}}</li>

            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm text-center mb-sm-3 mt-sm-3">
        <div style="text-decoration:underline ;"><a href="{{ route('dashboard')}}" class="text-primary">
                << Back</a>
        </div>
    </div>
</div>
@endsection