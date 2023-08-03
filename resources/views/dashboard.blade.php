@extends('layouts.portal')

@section('title',' Dashboard |')

@section('content')


<div class="row " style="justify-content:center;background-color: rgba(5, 12, 36, 0.7);z-index:-1">
  <div class="col-12">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div>
            <img src="images/banner1.jpg" class="d-block w-100 opacity-50 img-fluid img-responsive" alt="...">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle mb-5 "
            style="background-color:rgb(47,49,59,1);text-align:inherit;width:max-content;box-shadow:7px 5px 17px 10px black;">
            <span class="bannertxt">Your Haven For Luxury Wristwatches.</span>
            <br>
          </div>
        </div>
        <div class="carousel-item">
          <div class=" "><img src="images/ban.jpg" class="d-block w-100 opacity-50 img-fluid img-responsive" alt="...">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle mb-5"
            style="background-color:rgb(251,208,121,1);width:max-content;border-radius:2%;box-shadow:7px 5px 17px 1px rgb(251,208,121,1);">
            <span class="bannertxt" style="color:rgb(0,0,0,0.9) ;">Quality with class crafted just for you.</span>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-5 mb-5 text-center">
  <h3>OUR COLLECTIONS</h3>
  <hr>
</div>
<div class="container-fluid-sm m-3">

  @if ($brands->count() > 0)
  @foreach ($brands as $brand)
  <div class="row">
    <div class="col mb-5 mt-1 text-center">
      <div style="margin-left:50px;position:relative; ">
        <img src="{{$brand->brandimg}}" alt="" width="110" class="img-fluid img-responsive">

      </div>
      <hr>
    </div>

  </div>


  <div class="row">
    @foreach ($brand->products as $product)

    <div class="col-sm col-lg mb-5 ">
      <form action="/watchspec/{{$product->id}}" method='GET' style="text-align: center;">
        <div class=" " style="width: 100%;height:auto"><img src="{{$product->watch_image}}" alt=""
            class="img-responsive-sm img-fluid">
        </div>

        <div style="text-align: center;color:rgba(0, 5, 0,0.6);" class="mb-2">
          <b>{{$product->watch_description}}</b>
        </div>
        <input type="submit" value="{{$product->watch_name}}" class="btn btn col-10"
          style="background-color: #050C24;color:burlywood;" name="btnsubmit">
        <br>

      </form>
    </div>

    @endforeach

  </div>

  @endforeach
  @endif
</div>

@endsection