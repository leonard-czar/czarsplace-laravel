@extends('layouts.portal')

@section('title', 'Your cart |')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/cart.css') }}">
@endpush

@section('content')


<div class="container-fluid cart-page px-3 px-md-4 py-3">
    @if ($carts->count() > 0)
        <header class="cart-hero">
            <h1><i class="fa-solid fa-bag-shopping me-2" aria-hidden="true"></i>Your cart</h1>
            <p><span class="cart-hero__count">{{ $carts->count() }}</span>
                {{ $carts->count() === 1 ? 'item' : 'items' }} ready for checkout. Review below and proceed when you’re ready.</p>
        </header>

        <div class="row g-4 align-items-start">
            <div class="col-lg-8">
                <div class="cart-items-card">
                    <div class="table-responsive">
                        <table class="table cart-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center cart-table__th-num">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col" class="text-end">Unit (₦)</th>
                                    <th scope="col" class="text-end">Line (₦)</th>
                                    <th scope="col" class="cart-table__th-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $index => $cart)
                                    <tr>
                                        <td class="text-center text-muted">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                @if ($cart->product)
                                                    <img src="{{ $cart->product->image_url }}" alt="{{ $cart->product->watch_name }}" class="cart-thumb" width="72" height="72">
                                                    <div class="cart-product-name">
                                                        <a href="{{ route('watchspec', $cart->product->id) }}">{{ $cart->product->watch_name }}</a>
                                                    </div>
                                                @else
                                                    <div class="cart-thumb d-flex align-items-center justify-content-center text-muted small">—</div>
                                                    <span class="text-muted small">Unavailable</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="cart-qty-badge">{{ $cart->qty }}</span>
                                        </td>
                                        <td class="text-end">₦{{ number_format((float) $cart->price, 2) }}</td>
                                        <td class="text-end fw-semibold cart-table__line-total">₦{{ number_format((float) $cart->total, 2) }}</td>
                                        <td>
                                            <div class="cart-actions">
                                                <a href="{{ route('cartedit', $cart->id) }}" class="cart-btn cart-btn--edit">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit qty
                                                </a>
                                                <form method="POST" action="{{ route('cartdeleteitem', $cart->id) }}" class="d-inline" data-czp-confirm
                                                    data-czp-confirm-title="Remove this item?"
                                                    data-czp-confirm-body="This watch will be taken out of your cart."
                                                    data-czp-confirm-ok="Yes, remove">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="cart-btn cart-btn--remove w-100">
                                                        <i class="fa-solid fa-trash-can"></i> Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="cart-summary">
                    <h2>Order summary</h2>
                    <div class="cart-summary__row">
                        <span>Subtotal</span>
                        <span>₦{{ number_format((float) $total, 2) }}</span>
                    </div>
                    <div class="cart-summary__row cart-summary__row--note">
                        <span>Shipping &amp; taxes</span>
                        <span>At checkout</span>
                    </div>
                    <div class="cart-summary__total d-flex justify-content-between align-items-baseline">
                        <span>Total</span>
                        <span>₦{{ number_format((float) $total, 2) }}</span>
                    </div>

                    <form action="{{ route('checkout') }}" method="GET">
                        <button type="submit" name="checkout" value="1" class="cart-btn-checkout">
                            Proceed to checkout
                        </button>
                    </form>

                    <form action="{{ route('clearcart') }}" method="POST" data-czp-confirm
                        data-czp-confirm-title="Clear entire cart?"
                        data-czp-confirm-body="All items will be removed from your cart."
                        data-czp-confirm-ok="Yes, clear cart">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="deleteall" value="1" class="cart-btn-clear">
                            Clear entire cart
                        </button>
                    </form>
                </aside>
            </div>
        </div>
    @else
        <header class="cart-hero mb-4">
            <h1><i class="fa-solid fa-cart-shopping me-2" aria-hidden="true"></i>Your cart</h1>
            <p>Nothing here yet — explore the shop and add pieces you love.</p>
        </header>

        <div class="cart-empty">
            <h2>Your cart is empty</h2>
            <p>Browse our collections and tap “Add to cart” on any watch to see it listed here.</p>
            <a href="{{ route('home') }}" class="btn-shop">Start shopping</a>
        </div>
    @endif
</div>

@endsection
