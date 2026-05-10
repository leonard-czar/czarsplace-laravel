@extends('layouts.admin')

@section('title', 'Order line items |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Order line items</h1>
            <p class="czp-admin-hero__lead">Quantities and pricing captured at checkout for this order.</p>
        </header>

        <div class="czp-admin-card">
            <div class="czp-admin-card__body czp-admin-card__body--flush">
                <div class="czp-admin-table-wrap">
                    <table class="table table-bordered czp-admin-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Detail ID</th>
                                <th>Product ID</th>
                                <th>Qty</th>
                                <th>Unit price</th>
                                <th>Line total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $detail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->product_id }}</td>
                                    <td>{{ $detail->qty }}</td>
                                    <td>₦{{ number_format((float) $detail->unit_price, 2) }}</td>
                                    <td><strong>₦{{ number_format((float) ($detail->total ?? ($detail->qty * $detail->unit_price)), 2) }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <p class="text-center mt-4 mb-5">
            <a href="{{ route('allorders') }}" class="btn czp-admin-btn-primary"><i class="fa-solid fa-arrow-left me-2"></i>Back to orders</a>
        </p>
    </div>
@endsection
