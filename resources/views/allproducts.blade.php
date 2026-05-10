@extends('layouts.admin')

@section('title', 'All products |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Product catalog</h1>
            <p class="czp-admin-hero__lead">Desktop: full table. On phones and tablets: compact cards with the essentials.</p>
        </header>

        <div class="czp-admin-toolbar">
            <span class="text-muted small czp-admin-toolbar-count"><i class="fa-solid fa-table-list me-1 text-warning"></i> {{ $products->total() }} product{{ $products->total() === 1 ? '' : 's' }}</span>
            <a href="{{ route('showbrand') }}" class="btn btn-sm czp-admin-btn-primary"><i class="fa-solid fa-plus me-1"></i> Add product</a>
        </div>

        <div class="czp-admin-card">
            <div class="czp-admin-card__body czp-admin-card__body--flush">
                <div class="czp-admin-table-wrap czp-admin-product-table-wrap">
                    <table class="table table-bordered czp-admin-table czp-admin-table--compact mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Collection</th>
                                <th>Ref</th>
                                <th>Case</th>
                                <th>Gender</th>
                                <th>Movement</th>
                                <th>Dial</th>
                                <th>Bezel</th>
                                <th>Crystal</th>
                                <th>Caliber</th>
                                <th>Functions</th>
                                <th>Mechanism</th>
                                <th>Jewels</th>
                                <th>Diameter</th>
                                <th>Reserve</th>
                                <th>Parts</th>
                                <th>Freq</th>
                                <th>Bracelet</th>
                                <th>Clasp</th>
                                <th>Water</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $value)
                                <tr>
                                    <td>{{ $products->firstItem() + $index }}</td>
                                    <td><img src="{{ $value->image_url }}" alt="{{ $value->watch_name }}" class="czp-admin-thumb" width="44" height="44"></td>
                                    <td>{{ $value->id }}</td>
                                    <td><strong>{{ $value->watch_name }}</strong></td>
                                    <td>{{ $value->brand?->brandname ?? '—' }}</td>
                                    <td>₦{{ number_format((float) $value->watch_price, 2) }}</td>
                                    <td title="{{ $value->watch_description }}">{{ Str::limit($value->watch_description, 40) }}</td>
                                    <td>{{ $value->collection }}</td>
                                    <td>{{ $value->reference_number }}</td>
                                    <td title="{{ $value->case_description }}">{{ Str::limit($value->case_description, 24) }}</td>
                                    <td>{{ $value->gender }}</td>
                                    <td>{{ $value->movement }}</td>
                                    <td>{{ Str::limit($value->dial, 20) }}</td>
                                    <td>{{ $value->Bezel }}</td>
                                    <td>{{ Str::limit($value->crystal, 16) }}</td>
                                    <td>{{ $value->caliber }}</td>
                                    <td>{{ Str::limit($value->watch_function, 16) }}</td>
                                    <td>{{ $value->mechanism }}</td>
                                    <td>{{ $value->number_of_jewels }}</td>
                                    <td>{{ $value->total_diameter }}</td>
                                    <td>{{ $value->power_reserve }}</td>
                                    <td>{{ $value->number_of_parts }}</td>
                                    <td>{{ $value->frequency }}</td>
                                    <td>{{ Str::limit($value->bracelet, 16) }}</td>
                                    <td>{{ $value->clasp }}</td>
                                    <td>{{ $value->water_resistance }}</td>
                                    <td class="text-end text-nowrap">
                                        <div class="d-flex flex-column gap-1 align-items-end">
                                            <form action="{{ route('productdelete', $value->id) }}" method="POST" class="d-inline" data-czp-confirm
                                                data-czp-confirm-title="Delete this product?"
                                                data-czp-confirm-body="This permanently removes the product from your catalog. You cannot undo this action."
                                                data-czp-confirm-ok="Yes, delete">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                            <form action="{{ route('productedit', $value->id) }}" method="GET" class="d-inline">
                                                <button type="submit" class="btn btn-outline-primary btn-sm">Edit</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="czp-admin-product-mobile p-3">
                    @foreach ($products as $index => $value)
                        <article class="czp-admin-product-card">
                            <div class="czp-admin-product-card__top">
                                <img src="{{ $value->image_url }}" alt="{{ $value->watch_name }}" class="czp-admin-thumb" width="56" height="56">
                                <div class="flex-grow-1 min-w-0">
                                    <div class="czp-admin-product-card__meta">#{{ $products->firstItem() + $index }} · ID {{ $value->id }}</div>
                                    <h2 class="czp-admin-product-card__title">{{ $value->watch_name }}</h2>
                                    <div class="czp-admin-product-card__meta">{{ $value->brand?->brandname ?? '—' }}</div>
                                </div>
                            </div>
                            <div class="czp-admin-product-card__price">₦{{ number_format((float) $value->watch_price, 2) }}</div>
                            <p class="small text-muted mb-2">{{ Str::limit($value->watch_description, 120) }}</p>
                            <div class="czp-admin-product-card__actions">
                                <form action="{{ route('productedit', $value->id) }}" method="GET" class="d-inline flex-grow-1">
                                    <button type="submit" class="btn btn-outline-primary btn-sm w-100">Edit</button>
                                </form>
                                <form action="{{ route('productdelete', $value->id) }}" method="POST" class="d-inline flex-grow-1" data-czp-confirm
                                    data-czp-confirm-title="Delete this product?"
                                    data-czp-confirm-body="This permanently removes the product from your catalog."
                                    data-czp-confirm-ok="Yes, delete">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">Delete</button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            @if ($products->hasPages())
                <div class="czp-admin-pagination">
                    {{ $products->links('vendor.pagination.centered-bootstrap-5') }}
                </div>
            @endif
        </div>

        <div class="text-center pb-4">
            <a href="{{ route('showbrand') }}" class="btn czp-admin-btn-primary px-4">Add new product</a>
        </div>
    </div>
@endsection
