@extends('layouts.portal')

@section('title', "Men's collection |")

@section('content')
    @include('partials.portal-shop-ui')

    <div class="container-fluid czp-page px-3 px-md-4 py-3">
        <header class="czp-hero">
            <h1 class="czp-hero__title">Men’s collection</h1>
            <p class="czp-hero__lead">Timepieces selected for bold, refined style — open any piece for specs and to add to cart.</p>
        </header>

        @if ($male->count() > 0)
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 g-md-4">
                @foreach ($male as $product)
                    <div class="col">
                        <a href="{{ route('watchspec', $product->id) }}" class="czp-product-card text-decoration-none">
                            <div class="czp-product-card__img-wrap">
                                <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}" class="czp-product-card__img">
                            </div>
                            <div class="czp-product-card__body">
                                <h3 class="czp-product-card__name">{{ $product->watch_name }}</h3>
                                <p class="czp-product-card__desc">{{ Str::limit($product->watch_description, 90) }}</p>
                                <p class="czp-product-card__price mb-0">₦{{ number_format((float) $product->watch_price, 2) }}</p>
                                <span class="czp-product-card__cta">View details</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="czp-pagination-wrap">{{ $male->links('vendor.pagination.centered-bootstrap-5') }}</div>
        @else
            <p class="text-center text-muted czp-muted-sans">No men’s watches in this view yet.</p>
        @endif

        <p class="czp-back-link">
            <a href="{{ route('home') }}">← Back to home</a>
        </p>
    </div>
@endsection
