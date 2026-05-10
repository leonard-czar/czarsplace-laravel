@extends('layouts.portal')

@section('title', 'Watch details |')

@section('content')
    @include('partials.portal-shop-ui')

    @php
        $brandName = $product->brand?->brandname ?? '—';
    @endphp

    <div class="container-fluid czp-page px-3 px-md-4 py-3">
        <div class="row g-0 czp-watch-layout">
            <div class="col-lg-6">
                <div class="czp-watch-gallery">
                    <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="czp-watch-detail">
                    <p class="text-uppercase small mb-1 czp-watch-brand-eyebrow">{{ $brandName }}</p>
                    <h1 class="czp-watch-title">{{ $product->watch_name }}</h1>
                    <p class="czp-watch-tagline">{{ $product->watch_description }}</p>
                    <p class="czp-watch-price">₦{{ number_format((float) $product->watch_price, 2) }}</p>

                    <div class="czp-watch-form">
                        <label for="qty">Quantity</label>
                        <form action="{{ route('cart') }}" method="POST">
                            @csrf
                            <input type="number"
                                name="qty"
                                id="qty"
                                value="{{ old('qty', 1) }}"
                                min="1"
                                step="1"
                                class="form-control @error('qty') is-invalid @enderror mb-2"
                                required>
                            @error('qty')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <input type="hidden" name="watchid" value="{{ $product->id }}">
                            <button type="submit" name="buynow" class="czp-btn-add-cart mt-2">Add to cart</button>
                        </form>
                    </div>

                    <div class="czp-spec-box">
                        <h3>Specifications</h3>
                        <dl class="czp-spec-dl">
                            <div><dt>Brand</dt><dd>{{ $brandName }}</dd></div>
                            <div><dt>Collection</dt><dd>{{ $product->collection ?: '—' }}</dd></div>
                            <div><dt>Reference</dt><dd>{{ $product->reference_number ?: '—' }}</dd></div>
                            <div><dt>Gender</dt><dd>{{ $product->gender ?: '—' }}</dd></div>
                            <div><dt>Movement</dt><dd>{{ $product->movement ?: '—' }}</dd></div>
                            <div><dt>Dial</dt><dd>{{ $product->dial ?: '—' }}</dd></div>
                            <div><dt>Bezel</dt><dd>{{ $product->Bezel ?: '—' }}</dd></div>
                            <div><dt>Crystal</dt><dd>{{ $product->crystal ?: '—' }}</dd></div>
                            <div><dt>Caliber</dt><dd>{{ $product->caliber ?: '—' }}</dd></div>
                            <div><dt>Functions</dt><dd>{{ $product->watch_function ?: '—' }}</dd></div>
                            <div><dt>Mechanism</dt><dd>{{ $product->mechanism ?: '—' }}</dd></div>
                            <div><dt>Jewels</dt><dd>{{ $product->number_of_jewels ?: '—' }}</dd></div>
                            <div><dt>Diameter</dt><dd>{{ $product->total_diameter ?: '—' }}</dd></div>
                            <div><dt>Power reserve</dt><dd>{{ $product->power_reserve ?: '—' }}</dd></div>
                            <div><dt>Parts</dt><dd>{{ $product->number_of_parts ?: '—' }}</dd></div>
                            <div><dt>Frequency</dt><dd>{{ $product->frequency ?: '—' }}</dd></div>
                            <div><dt>Bracelet</dt><dd>{{ $product->bracelet ?: '—' }}</dd></div>
                            <div><dt>Clasp</dt><dd>{{ $product->clasp ?: '—' }}</dd></div>
                            <div><dt>Water resistance</dt><dd>{{ $product->water_resistance ?: '—' }}</dd></div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <p class="czp-back-link">
            <a href="{{ route('home') }}">← Back to home</a>
        </p>
    </div>
@endsection
