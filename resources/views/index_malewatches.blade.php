@extends('layouts.mylayout')

@section('content')
<div class="mt-sm-5 mb-sm-5 text-center">
  <h3>MALE COLLECTIONS</h3>
</div>

<div class="container-fluid-sm">
  <div class='row '>

    @if ($male->count() > 0)
    @foreach ($male as $product)

    <div class="col-sm-3 p-sm-3">
      <img src="{{$product->watch_image}}" alt="" class="img-fluid">
      <div style="text-align: center;font-size: 1vw;color:rgba(0, 0, 0,0.6);"><b>{{$product->watch_description}}</b>
      </div>
      <p class="price">
      <form action="/index_watchspec/{{$product->id}}" method="GET" style="text-align: center;">
        @csrf
        <input type="submit" value="{{$product->watch_name}}" class="btn btn-sm col-sm-10 "
          style="background-color: #050C24;color:burlywood;font-size: 1.2vw;" name="btnsubmit">
      </form>
      </p>
    </div>

    @endforeach
    @endif

  </div>
</div>

<div class="row">
  <div class="col-sm text-center mb-sm-3 mt-sm-3">
    <div style="text-decoration:underline ;"><a href="index.php" class="text-primary">
        << Back</a>
    </div>
  </div>
</div>
@endsection