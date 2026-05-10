@extends('layouts.portal')

@section('title', 'Verify email |')

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
                        <h2 class="czp-auth-aside__title">One last step to your account.</h2>
                        <p class="czp-auth-aside__text">Verifying your email helps us reach you about orders and keeps your profile secure. Check spam if you don’t see the message.</p>
                        <div class="czp-auth-aside__icons" aria-hidden="true">
                            <i class="fa-solid fa-at"></i>
                            <i class="fa-solid fa-inbox"></i>
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="czp-auth-card">
                        <div class="czp-auth-card__head">
                            <div class="czp-auth-card__icon" aria-hidden="true">
                                <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <h1>Verify your email</h1>
                            <p class="czp-auth-card__sub">We sent a link to the address you used when you registered.</p>
                        </div>

                        @if (session('resent'))
                            <div class="czp-auth-notice czp-auth-notice--success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <p class="czp-auth-verify-copy">
                            {{ __('Before continuing, open the email and tap the verification link.') }}
                        </p>

                        <div class="czp-auth-notice czp-auth-notice--muted">
                            {{ __('Didn’t receive it? Check spam or request a new email below.') }}
                        </div>

                        <form class="text-center mb-3" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="czp-auth-submit">{{ __('Send verification email again') }}</button>
                        </form>

                        <div class="czp-auth-links">
                            <a href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
                            <span class="text-muted d-none d-sm-inline">·</span>
                            <a href="{{ route('home') }}">{{ __('Continue browsing') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
