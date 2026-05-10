@extends('layouts.portal')

@section('content')
<div class="mt-5 mb-5 text-center">
  <h3>FEMALE COLLECTIONS</h3>
</div>

<div class="container-fluid-sm">
  <div class='row '>

    @if ($female->count() > 0)
    @foreach ($female as $product)

    <div class="col-sm-3 p-3">
      <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}" class="img-fluid">
      <div class="legacy-text-center-muted"><b>{{$product->watch_description}}</b>
      </div>
      <p class="price">
      <form action="{{ route('watchspec', $product->id) }}" method="GET" class="legacy-form-center">
        <input type="submit" value="{{$product->watch_name}}" class="btn btn-sm col-sm-10 legacy-btn-dark-gold-sm"
          name="btnsubmit">
      </form>
      </p>
    </div>

    @endforeach
    @endif

  </div>
  <div class="row justify-content-center mt-3">{{ $female->links() }}</div>
</div>

<div class="row">
  <div class="col-sm text-center mb-3 mt-3">
    <div class="legacy-link-underline"><a href="{{ route('home') }}" class="text-primary">
        << Back</a>
    </div>
  </div>
</div>
@endsection
