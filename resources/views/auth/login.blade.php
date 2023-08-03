@extends('layouts.mylayout')

@section('content')

<div class="container-fluid-sm">
    <div class="row " style="justify-content: center;">
        <div class="col-sm-5 m-5 shadow p-4 bg-body rounded">
            <div>

                <h3 class="m-3" style="font-family: czars; text-align:center">Login
                </h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" name="email" id="email"
                        class="form-control mt-3 mb-3 @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        required autocomplete="email" autofocus placeholder="Email Address">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="password" name="password" id="password"
                        class="form-control mt-sm-3  @error('password') is-invalid @enderror" required
                        autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>
                    <div> <input class="mt-1 form-check-input" type="checkbox" name="remember" id="defaultCheck1" {{
                            old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}</div>

                    </p>
                    <p>
                        <input type="submit" value="Sign In" class="btn form-control mb-3 mt-2" name="btnsignin"
                            style="background-color: #fbd079;color:white">
                    </p>


                    <p style="text-align:center; padding-left:15px; ">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Create account') }}
                        </a>
                    </p>


                </form>
            </div>

        </div>
    </div>
</div>
@endsection