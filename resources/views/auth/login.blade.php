@extends('layouts.portal')

@section('title', 'Sign in |')

@push('styles')
    @include('partials.auth-page-styles')
@endpush

@section('content')
    <div class="czp-auth-wrap">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center align-items-center g-4 g-lg-5">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="czp-auth-aside">
                        <p class="czp-auth-aside__eyebrow">{{ config('app.name', "Czar's Place") }}</p>
                        <h2 class="czp-auth-aside__title">Your haven for luxury wristwatches.</h2>
                        <p class="czp-auth-aside__text">Sign in to move pieces to your cart, complete checkout securely, and track every order in one place.</p>
                        <div class="czp-auth-aside__icons" aria-hidden="true">
                            <i class="fa-solid fa-gem"></i>
                            <i class="fa-solid fa-clock"></i>
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="czp-auth-card">
                        <div class="czp-auth-card__head">
                            <div class="czp-auth-card__icon" aria-hidden="true">
                                <i class="fa-solid fa-right-to-bracket"></i>
                            </div>
                            <h1>Welcome back</h1>
                            <p class="czp-auth-card__sub">Enter your email and password to continue.</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" novalidate>
                            @csrf

                            <label class="czp-auth-label" for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control mb-3 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="you@example.com">
                            @error('email')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control mb-3 @error('password') is-invalid @enderror" required
                                autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <div class="form-check czp-auth-remember mb-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                                </div>
                            </div>

                            <button type="submit" class="czp-auth-submit">{{ __('Sign in') }}</button>

                            <div class="czp-auth-links">
                                <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
                                @if (Route::has('password.request'))
                                    <span class="text-muted d-none d-sm-inline">·</span>
                                    <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                                @endif
                                <span class="text-muted d-none d-sm-inline">·</span>
                                <a href="{{ route('admin.login') }}">Administrator login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
