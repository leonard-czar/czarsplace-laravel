@extends('layouts.auth-minimal')

@section('title', 'Administrator sign in')

@push('styles')
    @include('partials.admin-auth-card-styles')
@endpush

@section('content')
    <div class="czp-admin-auth-shell">
        <div class="czp-admin-auth-card">
            <div class="czp-admin-auth-card__icon" aria-hidden="true">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h1>Administrator</h1>
            {{-- <p class="czp-admin-auth-card__sub">Restricted access — sign in with your admin credentials to manage the store.</p> --}}

            <form method="POST" action="{{ route('admin.login.post') }}" novalidate>
                @csrf

                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control mb-3 @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@example.com">
                @error('email')
                    <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                @enderror

                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control mb-3 @error('password') is-invalid @enderror"
                    required autocomplete="current-password" placeholder="••••••••">
                @error('password')
                    <span class="invalid-feedback d-block mb-2" role="alert">{{ $message }}</span>
                @enderror

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="adminRemember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label czp-admin-form-check-label" for="adminRemember">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <button type="submit" class="czp-admin-auth-submit">Sign in as admin</button>

                <div class="czp-admin-auth-links">
                    <a href="{{ route('login') }}">Customer sign in</a>
                    @if (Route::has('password.request'))
                        <span class="text-muted d-none d-sm-inline">·</span>
                        <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <p class="czp-admin-auth-banner">{{ config('app.name', "Czar's Place") }} · admin portal</p>
@endsection
