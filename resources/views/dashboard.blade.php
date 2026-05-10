@extends('layouts.portal')

@section('title', 'Home |')

@section('content')
    @include('partials.portal-shop-ui')

    <div class="czp-page">
        <div class="czp-dash-carousel">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100 opacity-75" alt="Banner: luxury wristwatches collection">
                        <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-100 px-2">
                            <div class="czp-dash-banner-cap czp-dash-banner-cap--dark mx-auto">
                                <span class="bannertxt d-block text-white">Your haven for luxury wristwatches.</span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ban.jpg') }}" class="d-block w-100 opacity-75" alt="Banner: quality timepieces">
                        <div class="carousel-caption position-absolute top-50 start-50 translate-middle w-100 px-2">
                            <div class="czp-dash-banner-cap czp-dash-banner-cap--gold mx-auto">
                                <span class="bannertxt d-block">Quality with class, crafted for you.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-3 px-md-4">
            <div class="czp-section-head">
                <h2>Our collections</h2>
                <div class="czp-section-head__rule"></div>
                <p class="text-muted small mt-2 mb-0 czp-section-head__sub">Browse by brand — tap a watch to see full details.</p>
            </div>

            @if ($brands->count() > 0)
                @foreach ($brands as $brand)
                    <div class="mb-2 mt-4 d-flex align-items-center gap-2 flex-wrap">
                        <div class="rounded p-2 bg-white border shadow-sm czp-dash-brand-logo-box">
                            <img src="{{ $brand->image_url }}" alt="{{ $brand->brandname }}" class="img-fluid">
                        </div>
                        <h3 class="mb-0 czp-dash-brand-title">{{ $brand->brandname }}</h3>
                    </div>
                    <hr class="my-3 opacity-25">

                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 g-md-4 mb-5">
                        @foreach ($brand->products as $product)
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
                @endforeach
            @endif
        </div>
    </div>
@endsection
