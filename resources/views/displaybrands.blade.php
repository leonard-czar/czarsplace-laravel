@extends('layouts.portal')

@section('title', 'Brands |')

@section('content')
    @include('partials.portal-shop-ui')

    <div class="container-fluid czp-page px-3 px-md-4 py-3">
        <header class="czp-hero">
            <h1 class="czp-hero__title">Brands</h1>
            <p class="czp-hero__lead">Explore curated collections from the houses we carry. Choose a brand to see dedicated models.</p>
        </header>

        @if ($brands->count() > 0)
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
                @foreach ($brands as $val)
                    @php
                        $routeName = $val->catalogRouteName();
                        $brandUrl = $routeName ? route($routeName) : route('home');
                    @endphp
                    <div class="col">
                        <div class="czp-brand-card">
                            <div class="czp-brand-card__logo">
                                <img src="{{ $val->image_url }}" alt="{{ $val->brandname }}">
                            </div>
                            <a href="{{ $brandUrl }}" class="czp-btn-pill">View {{ $val->brandname }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted czp-muted-sans">No brands available yet.</p>
        @endif

        <p class="czp-back-link">
            <a href="{{ route('home') }}">← Back to home</a>
        </p>
    </div>
@endsection
