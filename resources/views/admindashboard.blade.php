@extends('layouts.admin')

@section('title', 'Admin Dashboard |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <div class="admin-dash-welcome">
            <p class="admin-dash-welcome__greeting">Signed in as administrator</p>
            <h1 class="admin-dash-welcome__name">Welcome back, <span class="admin-dash-welcome__accent">{{ $username }}</span></h1>
        </div>

        <div class="row admin-stat-grid row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 g-4 justify-content-center">
            <div class="col">
                <a href="{{ route('allproduct') }}" class="admin-stat-card admin-stat-card--products d-block">
                    <div class="admin-stat-card__icon" aria-hidden="true">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <div class="admin-stat-card__body">
                        <span class="admin-stat-card__label">Available products</span>
                        <span class="admin-stat-card__value">{{ number_format($productCount) }}</span>
                        <span class="admin-stat-card__hint">Manage products →</span>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('allbrands') }}" class="admin-stat-card admin-stat-card--brands d-block">
                    <div class="admin-stat-card__icon" aria-hidden="true">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div class="admin-stat-card__body">
                        <span class="admin-stat-card__label">Featured brands</span>
                        <span class="admin-stat-card__value">{{ number_format($brandCount) }}</span>
                        <span class="admin-stat-card__hint">View brands →</span>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('allorders') }}" class="admin-stat-card admin-stat-card--orders d-block">
                    <div class="admin-stat-card__icon" aria-hidden="true">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                    <div class="admin-stat-card__body">
                        <span class="admin-stat-card__label">Total orders</span>
                        <span class="admin-stat-card__value">{{ number_format($orderCount) }}</span>
                        <span class="admin-stat-card__hint">All orders →</span>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('allusers') }}" class="admin-stat-card admin-stat-card--customers d-block">
                    <div class="admin-stat-card__icon" aria-hidden="true">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="admin-stat-card__body">
                        <span class="admin-stat-card__label">Customers</span>
                        <span class="admin-stat-card__value">{{ number_format($userCount) }}</span>
                        <span class="admin-stat-card__hint">User accounts →</span>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('allorders') }}" class="admin-stat-card admin-stat-card--payments d-block">
                    <div class="admin-stat-card__icon" aria-hidden="true">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    <div class="admin-stat-card__body">
                        <span class="admin-stat-card__label">Payment records</span>
                        <span class="admin-stat-card__value">{{ number_format($paymentCount) }}</span>
                        <span class="admin-stat-card__hint">Linked to orders →</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
