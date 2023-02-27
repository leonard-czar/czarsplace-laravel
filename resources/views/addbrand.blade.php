@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row text-center justify-content-center m-2 mb-5">
        <h3>Add a Brand</h3>
        <div class="col-sm-6">
            <form action="{{route('brand')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="m-sm-3"><input type="text" name="brand_name" placeholder="Brand Name" class="form-control">
                @error('brand_name')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror</div>
                <div class="m-sm-3"><input type="file" name="brand_image" placeholder="Brand Image" class="form-control">
                @error('brand_image')
                    <div class="text-danger">
                        <p>{{$message}}</p>
                    </div>
                    @enderror</div>

                <div class="m-sm-3"><input type="submit" name="btnaddbrand" id="" class="btn btn-primary form-control" value="Add Brand"></div>
            </form>
        </div>
    </div>
</div>

@endsection