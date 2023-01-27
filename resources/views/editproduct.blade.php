@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Edit Product</h3>
        <div class="col-sm-6">
            <form action="/updateproduct/{{$product->id}}" method="POST" enctype="multipart/form-data">               
            @csrf
            
            
                <div class="m-sm-3">watch name<textarea name="watch_name" id="" placeholder="Watch Name" class="form-control" require>{{old('watch_name',$product->watch_name)}}</textarea> 
                @error('watch_name')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror</div>
                <div class="m-sm-3">watch description<textarea name="watch_desc" id="" placeholder="Watch Description" class="form-control">{{old('watch_desc',$product->watch_description)}}</textarea>
                @error('watch_desc')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror</div>
                <div class="m-sm-3">watch price<input type="number" name="watch_price" value="{{old('watch_price',$product->watch_price)}}" placeholder="Watch price" class="form-control" >
                @error('$product->watch_price')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror</div>
                <div class="m-sm-3">collection<input type="text" name="collection" value="{{old('collection',$product->collection)}}" placeholder="Collection" class="form-control" ></div>
                <div class="m-sm-3">reference number<input type="text" name="ref_no" value="{{old('ref_no',$product->reference_number)}}" placeholder="Reference Number" class="form-control"></div>
                <div class="m-sm-3">case Description<textarea name="Case_desc" id="" placeholder="Case Description" class="form-control">{{old('Case_desc',$product->case_description)}}</textarea></div>
                <div class="m-sm-3">gender
                    <select name="gender" id="" class="form-control">
                        @if  ($product->gender=='male')
                        <option value="{{$product->gender ? $product->gender: "checked"  }}">{{$product->gender}}</option>
                        <option value="female">female</option>                            
                        @else
                        <option value="{{$product->gender ? "checked" : $product->gender}}">{{$product->gender}}</option>
                        <option value="male">Men</option>
                            
                        @endif
                        
                            
                            
                    </select>
                </div>
                <div class="m-sm-3">movement<input type="text" name="movement" value="{{old('movement',$product->movement)}}" placeholder="Movement" class="form-control"></div>
                <div class="m-sm-3">dial<textarea name="dial" id="" placeholder="Dial" class="form-control">{{old('dial',$product->dial)}}</textarea></div>
                <div class="m-sm-3">bezel<input type="text" name="bezel" value="{{old('bezel',$product->Bezel)}}" placeholder="Bezel" class="form-control"></div>
                <div class="m-sm-3">crystal<textarea name="crystal" id="" placeholder="Crystal" class="form-control">{{old('crystal',$product->crystal)}}</textarea></div>
                <div class="m-sm-3">caliber<input type="text" name="caliber" value="{{old('caliber',$product->caliber)}}" placeholder="Caliber" class="form-control"></div>
                <div class="m-sm-3">watch function<input type="text" name="watch_function" value="{{old('watch_function',$product->watch_function)}}" placeholder="Watch Function" class="form-control"></div>
                <div class="m-sm-3">mechanism<input type="text" name="mechanism" value="{{old('mechanism',$product->mechanism)}}" placeholder="Mechanism" class="form-control"></div>
                <div class="m-sm-3">number of jewels<input type="text" name="number_of_jewels" value="{{old('number_of_jewels',$product->number_of_jewels)}}" placeholder="Number Of Jewels" class="form-control"></div>
                <div class="m-sm-3">total diameter<input type="text" name="total_diameter" value="{{old('total_diameter',$product->total_diameter)}}" placeholder="Total Diameter" class="form-control"></div>
                <div class="m-sm-3">power reserve<input type="text" name="power_reserve" value="{{old('power_reserve',$product->power_reserve)}}" placeholder="Power Reserve" class="form-control"></div>
                <div class="m-sm-3">number of parts<input type="text" name="number_of_parts" value="{{old('number_of_parts',$product->number_of_parts)}}" placeholder="Number Of Parts" class="form-control"></div>
                <div class="m-sm-3">frequency<input type="text" name="frequency" value="{{old('frequency',$product->frequency)}}" placeholder="Frequency" class="form-control"></div>
                <div class="m-sm-3">bracelet<input type="text" name="bracelet" value="{{old('bracelet',$product->bracelet)}}" placeholder="Bracelet" class="form-control"></div>
                <div class="m-sm-3">clasp<input type="text" name="clasp" value="{{old('clasp',$product->clasp)}}" placeholder="Clasp" class="form-control"></div>
                <div class="m-sm-3">water resistance<input type="text" name="water_resistance" value="{{old('water_resistance',$product->water_resistance)}}" placeholder="Water Resistance" class="form-control"></div>
                <div class="m-sm-3"><input type="file" name="watch_image" value="{{old('watch_image',$product->watch_image)}}" placeholder="Watch Image" class="form-control" > </div>

                
                <div class="m-sm-3"><input type="submit" name="" id="" class="btn btn-primary form-control" value="Edit Product"></div>
            </form>
        </div>
    </div>
</div>
@endsection