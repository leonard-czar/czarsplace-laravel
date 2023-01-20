@extends('layouts.mylayout')

@section('content')
<?php
$homepage = "Home";


?>
<div class="row " style="justify-content:center;background-color: rgba(5, 12, 36, 0.7);z-index:-1">
  <div class="col-sm-12">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="img-fluid ">
            <img src="images/banner1.jpg" class="d-block w-100 opacity-50" alt="...">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle mb-5 " style="background-color:rgb(47,49,59,1);text-align:inherit;width:max-content;box-shadow:7px 5px 17px 10px black;">
            <span class="bannertxt">Your Haven For Luxury Wristwatches.</span>
            <br>
          </div>
        </div>
        <div class="carousel-item">
          <div class="img-fluid "><img src="images/ban.jpg" class="d-block w-100 opacity-50" alt="...">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle mb-5" style="background-color:rgb(251,208,121,1);width:max-content;border-radius:2%;box-shadow:7px 5px 17px 1px rgb(251,208,121,1);">
            <span class="bannertxt" style="color:rgb(0,0,0,0.9) ;">Quality with class crafted just for you.</span>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-sm-5 mb-sm-5 text-center">
  <h3>OUR COLLECTIONS</h3>
  <hr>


</div>
<div class="container-fluid-sm m-sm-3">


  <div class="row">
    <div class="col-sm mb-sm-5 mt-sm-1 text-center">
      <div style="margin-left:50px;position:relative; ">
        <img src="<?php
                  // {{$val->brandimg}} 
                  ?>" alt="" width="110" class="img-fluid">

      </div>
      <hr>
    </div>

  </div>



  <div class="row">
    @foreach($products as $value)

    <div class="col-sm-3 mb-sm-5 ">
      <form action="/index_watchspec/{{$value->id}}" method='GET' style="text-align: center;">
        @csrf
        <img src="{{$value->watch_image}}" alt="" class="img-fluid">

        <div style="text-align: center;font-size: 1vw;color:rgba(0, 5, 0,0.6);" class="mb-sm-2">
          <b>{{$value->watch_description}}</b>
        </div>
        <input type="submit" value="{{$value->watch_name}}" class="btn btn-sm col-sm-10" style="background-color: #050C24;color:burlywood;font-size: 1.2vw;" name="btnsubmit">
        <br>
      </form>
    </div>
    @endforeach



  </div>



</div>
@endsection