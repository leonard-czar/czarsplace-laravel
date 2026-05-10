@extends('layouts.portal')

@section('title', 'New password |')

@push('styles')
    @include('partials.auth-page-styles')
@endpush

@section('content')
    <div class="czp-auth-wrap">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center align-items-start g-4 g-lg-5">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="czp-auth-aside">
                        <p class="czp-auth-aside__eyebrow">{{ config('app.name', "Czar's Place") }}</p>
                        <h2 class="czp-auth-aside__title">Choose a strong new password.</h2>
                        <p class="czp-auth-aside__text">Use a unique passphrase you don’t reuse elsewhere. After saving, sign in with your new password on any device.</p>
                        <div class="czp-auth-aside__icons" aria-hidden="true">
                            <i class="fa-solid fa-shield-halved"></i>
                            <i class="fa-solid fa-fingerprint"></i>
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 col-xl-6">
                    <div class="czp-auth-card czp-auth-card--wide">
                        <div class="czp-auth-card__head">
                            <div class="czp-auth-card__icon" aria-hidden="true">
                                <i class="fa-solid fa-arrow-rotate-right"></i>
                            </div>
                            <h1>Set a new password</h1>
                            <p class="czp-auth-card__sub">Your email is confirmed from the link. Enter and confirm your new password below.</p>
                        </div>

                        <form method="POST" action="{{ route('password.update') }}" novalidate>
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <label class="czp-auth-label" for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email"
                                class="form-control mb-3 @error('email') is-invalid @enderror"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                placeholder="you@example.com">
                            @error('email')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password"
                                class="form-control mb-3 @error('password') is-invalid @enderror" required
                                autocomplete="new-password" placeholder="At least 8 characters">
                            @error('password')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="password-confirm">{{ __('Confirm password') }}</label>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                class="form-control mb-4" required autocomplete="new-password"
                                placeholder="Repeat password">

                            <button type="submit" class="czp-auth-submit">{{ __('Save new password') }}</button>

                            <div class="czp-auth-links">
                                <a href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
