@extends('layouts.portal')

@section('title', 'My orders |')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/user-orders.css') }}">
@endpush

@section('content')
    @include('partials.portal-shop-ui')

    <div class="container-fluid user-orders-page px-3 px-md-4 py-3">
        <header class="user-orders-hero">
            <h1>My orders</h1>
            <p>Track your purchases and payment status in one place.</p>
            @if ($orders->total() > 0)
                <p class="user-orders-meta mb-0 mt-2">
                    Showing {{ $orders->firstItem() }}–{{ $orders->lastItem() }} of {{ $orders->total() }}
                    order{{ $orders->total() === 1 ? '' : 's' }}
                </p>
            @endif
        </header>

        @forelse ($orders as $order)
            @php
                $statusRaw = $order->payment?->payment_status;
                $statusLabel = $statusRaw ? ucfirst($statusRaw) : 'Pending';
                $isComplete = $statusRaw === 'complete';
                $isPending = $statusRaw === null || $statusRaw === '' || strtolower((string) $statusRaw) === 'pending';
                $badgeClass = $isComplete ? 'user-order-badge--complete' : ($isPending ? 'user-order-badge--pending' : 'user-order-badge--other');
            @endphp

            <article class="user-order-card">
                <div class="user-order-card__head">
                    <div>
                        <span class="user-order-card__id">Order CZP-{{ $order->id }}</span>
                        <div class="user-order-card__date">
                            Placed on {{ $order->created_at->format('l, j F Y') }}
                        </div>
                    </div>
                    <span class="user-order-badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                </div>
                <div class="user-order-card__total d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span class="user-order-card__total-label">Order total</span>
                    <strong>₦{{ number_format((float) $order->total_amount, 2) }}</strong>
                </div>

                <div class="table-responsive">
                    <table class="table user-order-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center user-order-table__th-num">#</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center user-order-table__th-qty">Qty</th>
                                <th scope="col" class="text-end user-order-table__th-money">Unit</th>
                                <th scope="col" class="text-end user-order-table__th-money">Line</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderdetails as $index => $detail)
                                @php
                                    $product = $detail->products;
                                    $lineTotal = $detail->total !== null && $detail->total !== ''
                                        ? (float) $detail->total
                                        : (float) $detail->qty * (float) $detail->unit_price;
                                @endphp
                                <tr>
                                    <td class="text-center text-muted">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if ($product)
                                                <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}" class="user-order-thumb" width="52" height="52">
                                                <div>
                                                    <div class="user-order-product-name">
                                                        <a href="{{ route('watchspec', $product->id) }}">{{ $product->watch_name }}</a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="user-order-thumb d-flex align-items-center justify-content-center text-muted small">—</div>
                                                <span class="text-muted small">Unavailable</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $detail->qty }}</td>
                                    <td class="text-end">₦{{ number_format((float) $detail->unit_price, 2) }}</td>
                                    <td class="text-end fw-semibold user-order-table__line-total">₦{{ number_format($lineTotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </article>
        @empty
            <div class="user-orders-empty">
                <h2>No orders yet</h2>
                <p>When you buy something from our collection, your orders and delivery details will show up here.</p>
                <a href="{{ route('home') }}" class="btn-brand">Browse the shop</a>
            </div>
        @endforelse

        @if ($orders->total() > 0 && $orders->hasPages())
            <div class="czp-pagination-wrap">
                {{ $orders->links('vendor.pagination.centered-bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
