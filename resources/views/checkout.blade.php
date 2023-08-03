@extends('layouts.portal')

@section('content')
<div class="container-fluid">
    <div class="row text-center justify-content-center mt-5">
        <h2>DELIVERY DETAILS </h2>
    </div>

    <div class="row text-center justify-content-center mb-5 mt-3">
        <div class="col-sm-5">
            <form action="{{route('pay')}}" method="POST">
                @csrf
                <input type="text" name="address" placeholder="Enter Shipping Address" class="form-control text-center"
                    required>
                @error('address')
                <div class="text-danger">
                    <p>{{$message}}</p>
                </div>
                @enderror
                <input type="number" name="altphone" value="" placeholder="Alternative Phonenumber (optional) "
                    class="form-control text-center mt-2 col-6">
                <input type="submit" name="continue" value="Continue to Payment" class="btn btn-outline-primary mt-3">

            </form>
        </div>
    </div>
</div>
@endsection