@extends('layouts.portal')

@section('content')
<div class='row'>
  <div class="col-sm " style="text-align:center">
    <img src=" 
     {{$brand->brandimg}}
     " width="100" alt="" class="img-fluid" id="Audemars">
  </div>
</div>
<hr>
<div class='row'>

  @if($products->count() > 0)
  @foreach($products as $product)

  <div class="col-sm col-lg-3 col-md-3 col-xxl-3 p-3">
    <img src="{{$product->watch_image}}" alt="" class="img-fluid">
    <div style="text-align: center;color:rgba(0, 0, 0,0.6);"><b>
        {{$product->watch_description}}</b></div>
    <form action="/watchspec/{{$product->id}}" method="GET" style="text-align: center;">
      @csrf
      <input type="submit" value="{{$product->watch_name}}" class="btn btn-sm col-10 mt-sm-2"
        style="background-color: #050C24;color:burlywood;" name="btnsubmit">
    </form>
  </div>

  @endforeach
  @endif

</div>

<div class="row">
  <div class="col-sm text-center mb-sm-3 mt-sm-3">
    <div style="text-decoration:underline ;"><a href="/dashboard" class="text-primary">
        << Back</a>
    </div>
  </div>
</div>
@endsection