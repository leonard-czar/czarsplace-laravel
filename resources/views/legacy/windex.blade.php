@extends('layouts.portal')


@section('content')
<div class="row legacy-hero-row">
  <div class="col-sm-12">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="img-fluid ">
            <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100 opacity-50" alt="Banner: luxury wristwatches">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle mb-5 legacy-carousel-cap--dark">
            <span class="bannertxt">Your Haven For Luxury Wristwatches.</span>
            <br>
          </div>
        </div>
        <div class="carousel-item">
          <div class="img-fluid "><img src="{{ asset('images/ban.jpg') }}" class="d-block w-100 opacity-50" alt="Banner: quality timepieces">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle mb-5 legacy-carousel-cap--gold">
            <span class="bannertxt">Quality with class crafted just for you.</span>
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

  @isset($brands)
  <div class="row justify-content-center g-3">
    @foreach ($brands as $val)
    <div class="col-6 col-md-4 col-lg-2 text-center mb-sm-4">
      <a href="{{ route('displaybrands') }}" class="text-decoration-none">
        <div class="legacy-brand-offset">
          <img src="{{ $val->image_url }}" alt="{{ $val->brandname }}" width="110" class="img-fluid">
        </div>
        <span class="small text-muted d-block mt-1">{{ $val->brandname }}</span>
      </a>
    </div>
    @endforeach
  </div>
  <hr class="my-4">
  @endisset

  <div class="row">
    @foreach($products as $value)

    <div class="col-sm-3 mb-sm-5 ">
      <form action="{{ route('watchspec', $value->id) }}" method="GET" class="legacy-form-center">
        <img src="{{ $value->image_url }}" alt="{{ $value->watch_name }}" class="img-fluid">

        <div class="legacy-product-desc mb-sm-2">
          <b>{{$value->watch_description}}</b>
        </div>
        <input type="submit" value="{{$value->watch_name}}" class="btn btn-sm col-sm-10 legacy-btn-dark-gold" name="btnsubmit">
        <br>
      </form>
    </div>
    @endforeach



  </div>



</div>
@endsection
