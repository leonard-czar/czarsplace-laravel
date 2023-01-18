@extends('layouts.admin')

@section('content')
<?php
// if (isset($_REQUEST['btnaddbrand'])) {

//     if (!empty($_REQUEST['brand_name'])) {

//         $obj = new Admin;
//         $brand = $obj->Insertbrand($_REQUEST['brand_name'], $_FILES['brand_image']['name']);
//         $addbrand = "Brand added Successfully!";
//         header("Location: allbrands.php?addbrand=$addbrand");
//         exit;
//     } else {
//         echo "<div class='text-danger text-center m-1'>Please enter a valid brandname!</div>";
//     }
// }

?>
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