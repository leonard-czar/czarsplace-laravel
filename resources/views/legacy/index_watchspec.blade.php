@extends('layouts.portal')

@section('content')
<div class="container-fluid-sm">
    <div class="row  text-center">
        <div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div>

                <img src="{{$product->image_url}}" alt="{{ $product->watch_name }}" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-4 col-lg mt-3 p-4 ">
            <h4 class="legacy-watch-title">{{$product->watch_description}}</h4>
            <div class="legacy-watchspec-desc mb-4">&#8358;{{$product->watch_price}}</div>

            <div class="">
                <button type="button" onclick="location.href = '{{ route('login') }}';" name="buynow" id="addcart"
                    class="btn form-control mb-5 mt-1 legacy-watchspec-btn-cart">BUY NOW</button>
            </div>

            <h5 class="legacy-watchspec-spec-title">WATCH SPECIFICATIONS</h5>
            <ul class="legacy-watchspec-spec-list mb-5">
                <li>Brand: {{$product->brand['brandname']}} </li>
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
    <div class="col-sm text-center mb-3 mt-sm-3">
        <div class="legacy-link-underline"><a href="{{ url('/') }}" class="text-primary">
                << Back</a>
        </div>
    </div>
</div>
@endsection
