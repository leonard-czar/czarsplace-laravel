@extends('layouts.portal')

@section('title', 'Confirm password |')

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
                        <h2 class="czp-auth-aside__title">Quick security check.</h2>
                        <p class="czp-auth-aside__text">We ask for your password again before sensitive actions so your account and orders stay protected.</p>
                        <div class="czp-auth-aside__icons" aria-hidden="true">
                            <i class="fa-solid fa-user-lock"></i>
                            <i class="fa-solid fa-bag-shopping"></i>
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="czp-auth-card">
                        <div class="czp-auth-card__head">
                            <div class="czp-auth-card__icon" aria-hidden="true">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <h1>Confirm your password</h1>
                            <p class="czp-auth-card__sub">{{ __('Please enter your password to continue.') }}</p>
                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}" novalidate>
                            @csrf

                            <label class="czp-auth-label" for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password"
                                class="form-control mb-4 @error('password') is-invalid @enderror" required
                                autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="czp-auth-submit">{{ __('Continue') }}</button>

                            <div class="czp-auth-links">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                                    <span class="text-muted d-none d-sm-inline">·</span>
                                @endif
                                <a href="{{ route('home') }}">{{ __('Back to shop') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
