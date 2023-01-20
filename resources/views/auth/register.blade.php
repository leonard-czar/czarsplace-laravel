@extends('layouts.mylayout')

@section('content')
<div class="container-fluid-sm">
    <div class="row " style="justify-content: center;">
        <div class="col-sm-5 m-sm-5 shadow p-5 bg-body rounded ">


            <h3 class="m-3" style="font-family: czars; text-align:center">Create Account</h3>
            <form method="POST" action="{{ route('register') }}" >
                @csrf


                <input type="text" name="name" class="form-control mt-3 @error('name') is-invalid @enderror " id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Usernmae">
                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                <input type="email" name="email" id="Email" class="form-control mt-3" placeholder="Email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                <input type="text" name="address" id="address" class="form-control mt-3 @error('address') is-invalid @enderror"  placeholder="Address">{{ old('address') }}</textarea>
                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                <input type="tel" name="telephone" value="{{ old('telephone') }}" id="telephone" class="form-control mt-3 @error('telephone') is-invalid @enderror" placeholder="Phone Number">
                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                <input type="password" name="password" id="Password" class="form-control mt-3  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                <input type="password" name="password_confirmation" id="password-confirm" class="form-control mt-3" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">                

                <p>
                    <input type="submit" value="Register" name="btncreate" class="btn form-control mt-4" style="background-color: #fbd079;">
                </p>

            </form>
        </div>
    </div>
</div>
@endsection