@extends('layouts.portal')

@section('title', 'Checkout |')

@section('content')
    @include('partials.portal-shop-ui')

    <div class="container-fluid czp-page px-3 px-md-4 py-3">
        <header class="czp-hero">
            <h1 class="czp-hero__title">Delivery details</h1>
            <p class="czp-hero__lead">Enter where we should ship your order. You’ll continue to secure payment on the next step.</p>
        </header>

        <div class="czp-checkout-card">
            <form action="{{ route('pay') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address">Shipping address</label>
                    <input type="text"
                        name="address"
                        id="address"
                        placeholder="Street, city, state"
                        class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}"
                        required
                        autocomplete="street-address">
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="altphone">Alternative phone <span class="text-muted fw-normal">(optional)</span></label>
                    <input type="tel"
                        name="altphone"
                        id="altphone"
                        placeholder="Alternate contact number"
                        class="form-control"
                        value="{{ old('altphone') }}"
                        autocomplete="tel">
                </div>
                <button type="submit" name="continue" value="1" class="czp-btn-checkout">Continue to payment</button>
            </form>
        </div>

        <p class="czp-back-link mb-0">
            <a href="{{ route('showcart') }}">← Back to cart</a>
        </p>
    </div>
@endsection
