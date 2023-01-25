@extends('layouts.portal')

@section('content')

<div class="row justify-content-center">

  @if ($brands->count() > 0)

  @foreach ($brands as $val)

  <div class="col-sm mb-sm-5 mt-sm-1 text-center justify-content-center">
    <div>
      <img src="{{$val->brandimg}}" alt="" width="110" class="img-fluid">
    </div>

    <a href="@if($val->id==1) 
           {{url('/hublot')}}
           @endif
          @if($val->id==2) 
          {{url('/rolex')}}
            @endif
           @if($val->id==3) 
           {{url('/audemars')}}
             @endif" class="btn btn-outline-primary btn-sm col-7">View
      {{$val->brandname}}
    </a>
    <hr>
  </div>

  @endforeach
  @endif

</div>

@endsection