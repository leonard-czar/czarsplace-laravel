@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show text-center col-sm " role="alert" style="font-family: czars2;">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>

</div>

@endif 

    

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-dismissible fade show text-center col-sm" role="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>

</div>

@endif

     

@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show text-center" role="alert" style="font-family: czars2;">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>

</div>

@endif

     

@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show text-center" role="alert" style="font-family: czars2;">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>

</div>

@endif

    

{{-- @if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="font-family: czars2;">

  <strong>Please check the form below for errors</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>

</div>

@endif --}}

