@extends('layouts.portal')

@section('title', 'Create account |')

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
                        <h2 class="czp-auth-aside__title">Join collectors who shop with confidence.</h2>
                        <p class="czp-auth-aside__text">Create an account to save your delivery details, view order history, and checkout faster next time.</p>
                        <div class="czp-auth-aside__icons" aria-hidden="true">
                            <i class="fa-solid fa-user-plus"></i>
                            <i class="fa-solid fa-truck-fast"></i>
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 col-xl-6">
                    <div class="czp-auth-card czp-auth-card--wide">
                        <div class="czp-auth-card__head">
                            <div class="czp-auth-card__icon" aria-hidden="true">
                                <i class="fa-solid fa-user-pen"></i>
                            </div>
                            <h1>Create your account</h1>
                            <p class="czp-auth-card__sub">We’ll use these details for shipping and order updates.</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" novalidate>
                            @csrf

                            <label class="czp-auth-label" for="name">Full name</label>
                            <input type="text" name="name" id="name"
                                class="form-control mb-3 @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your name">
                            @error('name')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control mb-3 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
                            @error('email')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="address">Delivery address</label>
                            <input type="text" name="address" id="address"
                                class="form-control mb-3 @error('address') is-invalid @enderror"
                                value="{{ old('address') }}" autocomplete="street-address"
                                placeholder="Street, city, state">
                            @error('address')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="telephone">Phone</label>
                            <input type="tel" name="telephone" id="telephone"
                                class="form-control mb-3 @error('telephone') is-invalid @enderror"
                                value="{{ old('telephone') }}" autocomplete="tel" placeholder="+234 …">
                            @error('telephone')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control mb-3 @error('password') is-invalid @enderror" required
                                autocomplete="new-password" placeholder="At least 8 characters">
                            @error('password')
                                <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                            @enderror

                            <label class="czp-auth-label" for="password-confirm">Confirm password</label>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                class="form-control mb-4" required autocomplete="new-password" placeholder="Repeat password">

                            <button type="submit" class="czp-auth-submit">{{ __('Create account') }}</button>

                            <div class="czp-auth-links">
                                <a href="{{ route('login') }}">{{ __('Already registered? Sign in') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
