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

<div class="mt-5 mb-5 text-center">
  <h3>OUR COLLECTIONS</h3>
  <hr>
</div>
<div class="container-fluid-sm m-3">

  @if ($brands->count() > 0)
  @foreach ($brands as $brand)
  <div class="row">
    <div class="col-sm mb-5 mt-1 text-center">
      <div class="legacy-brand-offset">
        <img src="{{ $brand->image_url }}" alt="{{ $brand->brandname }}" width="110" class="img-fluid">

      </div>
      <hr>
    </div>

  </div>


  <div class="row">
    @foreach ($brand->products as $product)

    <div class="col-sm col-lg mb-5 ">
      <form action="{{ route('watchspec', $product->id) }}" method='GET' class="legacy-form-center">
        <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}" class="img-fluid">

        <div class="legacy-product-desc mb-2">
          <b>{{$product->watch_description}}</b>
        </div>
        <input type="submit" value="{{$product->watch_name}}" class="btn btn-sm col-10 legacy-btn-dark-gold-sm"
          name="btnsubmit">
        <br>

      </form>
    </div>

    @endforeach

  </div>

  @endforeach
  @endif
</div>
@endsection
