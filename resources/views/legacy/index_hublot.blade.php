@extends('layouts.portal')

@section('content')
<div class='row'>
  <div class="col-sm legacy-col-center">
    <img src="{{ $brand->image_url }}" width="100" alt="{{ $brand->brandname }}" class="img-fluid">
  </div>
</div>
<hr>
<div class='row'>

  @if($products->count() > 0)
  @foreach($products as $product)

  <div class="col-sm-3 p-3">
    <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}" class="img-fluid">
    <div class="legacy-text-center-muted"><b>
        {{$product->watch_description}}</b></div>
    <form action="{{ route('watchspec', $product->id) }}" method="GET" class="legacy-form-center">
      <input type="submit" value="{{$product->watch_name}}" class="btn btn-sm col-sm-10 mt-2 legacy-btn-dark-gold-sm"
        name="btnsubmit">
    </form>
  </div>

  @endforeach
  @endif

</div>
<div class="row justify-content-center mt-3">{{ $products->links() }}</div>

<div class="row">
  <div class="col-sm text-center mb-3 mt-3">
    <div class="legacy-link-underline"><a href="/index" class="text-primary">
        << Back</a>
    </div>
  </div>
</div>
@endsection
