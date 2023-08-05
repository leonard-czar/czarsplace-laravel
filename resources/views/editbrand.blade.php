@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Update Brand</h3>
        <div class="col-sm-6 mt-2">
            <form action="/updatebrand/{{$brand->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-3 mb-2"><input type="text" name="brandname"
                        value="{{old('brandname',$brand->brandname)}}" placeholder="Brand name" class="form-control">
                </div>

                <input type="file" name="image" value="Image" class="form-control">
                <div class="mt-3"><input type="submit" name="updateimg" id="" class="btn btn-primary form-control"
                        value="Update"></div>
            </form>
        </div>
    </div>
</div>
@endsection