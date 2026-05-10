@extends('layouts.portal')

@section('title', 'Edit quantity |')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/editcart.css') }}">
@endpush

@section('content')

@php
    $product = $items->product;
    $unitPrice = $product ? (float) $product->watch_price : (float) $items->price;
@endphp


<div class="container-fluid px-3 px-md-4 py-3">
    <div class="edit-cart-page">
        <header class="edit-cart-hero">
            <h1>Update quantity</h1>
            <p>Change how many of this item you want. Line total updates from quantity × unit price.</p>
        </header>

        <div class="edit-cart-card">
            @if ($product)
                <div class="edit-cart-product">
                    <img src="{{ $product->image_url }}" alt="{{ $product->watch_name }}" class="edit-cart-thumb" width="88" height="88">
                    <div>
                        <p class="edit-cart-product-name">
                            <a href="{{ route('watchspec', $product->id) }}">{{ $product->watch_name }}</a>
                        </p>
                        <p class="edit-cart-meta">Unit price: ₦{{ number_format((float) $items->price, 2) }}</p>
                    </div>
                </div>
            @else
                <div class="edit-cart-product">
                    <div class="edit-cart-thumb d-flex align-items-center justify-content-center text-muted small">—</div>
                    <div>
                        <p class="edit-cart-product-name mb-0">Item unavailable</p>
                        <p class="edit-cart-meta mb-0">Product may have been removed. You can still adjust quantity or remove the line from your cart.</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('editqty', $items->id) }}" method="POST" class="edit-cart-form" id="edit-cart-form"
                data-unit-price="{{ $unitPrice }}">
                @csrf
                @method('PUT')

                <label for="quantity">Quantity</label>
                <input type="number"
                    class="form-control @error('quantity') is-invalid @enderror"
                    id="quantity"
                    name="quantity"
                    value="{{ old('quantity', $items->qty) }}"
                    min="1"
                    step="1"
                    required
                    inputmode="numeric">
                @error('quantity')
                    <div class="invalid-feedback d-block edit-cart-invalid">{{ $message }}</div>
                @enderror

                <div class="edit-cart-preview" id="line-total-preview" aria-live="polite">
                    Line total: <strong id="line-total-value">₦{{ number_format($unitPrice * (int) $items->qty, 2) }}</strong>
                </div>

                <div class="edit-cart-actions">
                    <button type="submit" class="edit-cart-btn-save" name="savechange" value="1">Save changes</button>
                    <a href="{{ route('showcart') }}" class="edit-cart-btn-back">Back to cart</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="{{ asset('js/pages/editcart-line-total.js') }}" defer></script>

@endsection
