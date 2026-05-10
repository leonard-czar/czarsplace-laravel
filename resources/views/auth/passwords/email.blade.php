@extends('layouts.portal')

@section('title', 'Forgot password |')

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
                        <h2 class="czp-auth-aside__title">Reset access in a few steps.</h2>
                        <p class="czp-auth-aside__text">We’ll email you a secure link to choose a new password. The link expires for your protection — request a new one anytime.</p>
                        <div class="czp-auth-aside__icons" aria-hidden="true">
                            <i class="fa-solid fa-envelope-open"></i>
                            <i class="fa-solid fa-key"></i>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="czp-auth-card">
                        <div class="czp-auth-card__head">
                            <div class="czp-auth-card__icon" aria-hidden="true">
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                            <h1>Forgot your password?</h1>
                            <p class="czp-auth-card__sub">Enter the email you use for your account and we’ll send reset instructions.</p>
                        </div>

                        @if (session('status'))
                            <div class="czp-auth-notice czp-auth-notice--success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" novalidate>
                            @csrf

                            <label class="czp-auth-label" for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control mb-3 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="you@example.com">
                            @error('email')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="czp-auth-submit">{{ __('Send reset link') }}</button>

                            <div class="czp-auth-links">
                                <a href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
                                <span class="text-muted d-none d-sm-inline">·</span>
                                <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
