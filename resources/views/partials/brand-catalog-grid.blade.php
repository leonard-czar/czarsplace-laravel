@include('partials.portal-shop-ui')

<div class="container-fluid czp-page px-3 px-md-4 py-3">
    <header class="czp-hero mb-4">
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <div class="rounded p-2 bg-white border shadow-sm d-flex align-items-center justify-content-center czp-catalog-hero-logo">
                <img src="{{ $brand->image_url }}" alt="{{ $brand->brandname }}" class="img-fluid">
            </div>
            <div class="flex-grow-1 min-w-0">
                <h1 class="czp-hero__title mb-1">{{ $brand->brandname }}</h1>
                <p class="czp-hero__lead mb-0">Discover pieces from this house — tap a watch for full specifications and to add to your cart.</p>
            </div>
        </div>
    </header>

    @if ($products->count() > 0)
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 g-md-4">
            @foreach ($products as $product)
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
        <div class="czp-pagination-wrap">
            {{ $products->links('vendor.pagination.centered-bootstrap-5') }}
        </div>
    @else
        <p class="text-center text-muted czp-muted-sans">No watches in this collection yet.</p>
    @endif

    <p class="czp-back-link mt-4">
        <a href="{{ route('displaybrands') }}">← Back to brands</a>
    </p>
</div>
