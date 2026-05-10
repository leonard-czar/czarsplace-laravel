@extends('layouts.admin')

@section('title', 'Orders |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">All orders</h1>
            <p class="czp-admin-hero__lead">Review customer orders, totals, and open line-item detail for each checkout.</p>
        </header>

        @if ($orders->total() > 0)
            <div class="czp-admin-card">
                <div class="czp-admin-card__body czp-admin-card__body--flush">
                    <div class="czp-admin-table-wrap">
                        <table class="table table-bordered czp-admin-table mb-0" id="my_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Shipping</th>
                                    <th>Alt phone</th>
                                    <th>Date</th>
                                    <th class="text-end">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $orders->firstItem() + $index }}</td>
                                        <td><strong>CZP-{{ $order->id }}</strong></td>
                                        <td>{{ $order->user_id }}</td>
                                        <td>
                                            @if ($order->payment?->payment_status)
                                                <span class="badge rounded-pill bg-success">{{ ucfirst($order->payment->payment_status) }}</span>
                                            @else
                                                <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                            @endif
                                        </td>
                                        <td>₦{{ number_format((float) $order->total_amount, 2) }}</td>
                                        <td>{{ Str::limit($order->shipping_address, 36) }}</td>
                                        <td>{{ $order->alt_telephone }}</td>
                                        <td>{{ $order->created_at->format('j M Y, g:i a') }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('orderdetails', $order->id) }}" method="get" class="d-inline">
                                                <button type="submit" class="btn btn-sm czp-admin-btn-primary">Details</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($orders->hasPages())
                    <div class="czp-admin-pagination">
                        {{ $orders->links('vendor.pagination.centered-bootstrap-5') }}
                    </div>
                @endif
            </div>
        @else
            <div class="czp-admin-card">
                <div class="czp-admin-empty py-5">
                    <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                    <p class="mb-0 fs-5 czp-admin-orders-empty-title">No orders yet</p>
                    <p class="small mt-2 mb-0">Customer checkouts will appear here.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
