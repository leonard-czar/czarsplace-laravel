@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Add a Product</h3>
        <div class="col-sm-6">
            <form action="{{route('addproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="m-sm-3"><textarea name="watch_name" id="" placeholder="Watch Name" class="form-control" require>{{old('watch_name')}}</textarea>
                    @error('watch_name')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="m-sm-3"><textarea name="watch_desc" id="" placeholder="Watch Description" class="form-control">{{old('watch_desc')}}</textarea>
                    @error('watch_desc')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="m-sm-3"><input type="number" name="watch_price" value="{{old('watch_price')}}" placeholder="Watch price" class="form-control">
                    @error('watch_price')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="m-sm-3"><input type="text" name="collection" value="{{old('collection')}}" placeholder="Collection" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="ref_no" value="{{old('ref_no')}}" placeholder="Reference Number" class="form-control"></div>
                <div class="m-sm-3"><textarea name="Case_desc" id="" placeholder="Case Description" class="form-control">{{old('Case_desc')}}</textarea></div>
                <div class="m-sm-3">
                    <select name="gender" id="" class="form-control">
                        <option value="">Gender</option>
                        <option value="male">Men</option>
                        <option value="female">Ladies</option>
                    </select>
                </div>
                <div class="m-sm-3"><input type="text" name="movement" value="{{old('movement')}}" placeholder="Movement" class="form-control"></div>
                <div class="m-sm-3"><textarea name="dial" id="" placeholder="Dial" class="form-control">{{old('dial')}}</textarea></div>
                <div class="m-sm-3"><input type="text" name="bezel" value="{{old('bezel')}}" placeholder="Bezel" class="form-control"></div>
                <div class="m-sm-3"><textarea name="crystal" id="" placeholder="Crystal" class="form-control">{{old('crystal')}}</textarea></div>
                <div class="m-sm-3"><input type="text" name="caliber" value="{{old('caliber')}}" placeholder="Caliber" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="watch_function" value="{{old('watch_function')}}" placeholder="Watch Function" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="mechanism" value="{{old('mechanism')}}" placeholder="Mechanism" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="number_of_jewels" value="{{old('number_of_jewels')}}" placeholder="Number Of Jewels" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="total_diameter" value="{{old('total_diameter')}}" placeholder="Total Diameter" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="power_reserve" value="{{old('power_reserve')}}" placeholder="Power Reserve" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="number_of_parts" value="{{old('number_of_parts')}}" placeholder="Number Of Parts" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="frequency" value="{{old('frequency')}}" placeholder="Frequency" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="bracelet" value="{{old('bracelet')}}" placeholder="Bracelet" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="clasp" value="{{old('clasp')}}" placeholder="Clasp" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="water_resistance" value="{{old('water_resistance')}}" placeholder="Water Resistance" class="form-control"></div>
                <div class="m-sm-3"><input type="file" name="watch_image" value="{{old('watch_image')}}" placeholder="Watch Image" class="form-control">
                    @error('watch_image')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="m-sm-3"><select name="brandid" id="" class="form-control" required>
                        <option value="">Choose Brand</option>

                        @foreach ($brands as $value)
                        <option value='{{$value->id}}'>{{$value->brandname}}</option>";
                        @endforeach

                    </select>
                    @error('brandid')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="m-sm-3"><input type="submit" name="" id="" class="btn btn-primary form-control" value="Add Product"></div>
            </form>
        </div>
    </div>
</div>

@endsection