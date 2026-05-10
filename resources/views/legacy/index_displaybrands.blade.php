@extends('layouts.portal')

@section('content')

<div class="row justify-content-center">

  @if ($brands->count() > 0)

  @foreach ($brands as $val)

  <div class="col-sm mb-sm-5 mt-sm-1 text-center justify-content-center">
    <div>
      <img src="{{ $val->image_url }}" alt="{{ $val->brandname }}" width="110" class="img-fluid">
    </div>

    @php
        $routeName = $val->catalogRouteName();
        $href = $routeName ? route($routeName) : route('home');
    @endphp
    <a href="{{ $href }}" class="btn btn-outline-primary btn-sm col-7">View
      {{ $val->brandname }}
    </a>
    <hr>
  </div>

  @endforeach
  @endif

</div>

@endsection
