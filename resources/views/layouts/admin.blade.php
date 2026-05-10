<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8 ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-to">
    <meta name="author" content="leonard lebechi">
    <meta name="description" content="your one stop shop for wristwatches">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @include('partials.app-main-layout')

    <title>@yield('title', 'Admin') {{ config('app.name', "Czar's Place") }}</title>

    <link rel="stylesheet" href="{{ asset('css/shell-layouts.css') }}">

    @include('partials.site-layout-styles')
    @include('partials.admin-theme')
    <link rel="stylesheet" href="{{ asset('css/app-ui-polish.css') }}">
    @stack('styles')

</head>

<body class="admin-app czp-site d-flex flex-column min-vh-100">

    @php
    $adminNavProducts = request()->routeIs('allproduct', 'showbrand', 'productedit', 'updateproduct', 'productdelete',
    'addproduct');
    $adminNavBrands = request()->routeIs('allbrands', 'brandedit', 'updatebrand', 'branddelete') ||
    request()->is('addbrand');
    $adminNavOrders = request()->routeIs('allorders', 'orderdetails');
    @endphp

    <header class="czp-header-wrap">
        <div class="czp-header-top">
            <div
                class="container-fluid px-3 px-lg-4 d-flex flex-wrap align-items-center justify-content-between gap-2 py-1">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <a class="czp-header-brand mb-0" href="{{ route('admindashboard') }}" id="brandname">{{
                        config('app.name', "Czar's Place") }}</a>
                    <span class="czp-admin-header-note">Admin console</span>
                </div>
                @auth
                <span class="text-white-50 small czp-admin-header-user">{{ Auth::user()->name }}</span>
                @endauth
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark czp-nav-main">
            <div class="container-fluid px-3 px-lg-4">
                <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarAdmin">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 flex-wrap">
                        <li class="nav-item">
                            <a class="nav-link brandname {{ request()->routeIs('admindashboard') ? 'active' : '' }}"
                                @if(request()->routeIs('admindashboard')) aria-current="page" @endif href="{{
                                route('admindashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $adminNavProducts ? 'active' : '' }}"
                                href="{{ route('allproduct') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $adminNavBrands ? 'active' : '' }}"
                                href="{{ route('allbrands') }}">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $adminNavOrders ? 'active' : '' }}"
                                href="{{ route('allorders') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ request()->routeIs('allusers') ? 'active' : '' }}"
                                href="{{ route('allusers') }}">Users</a>
                        </li>
                    </ul>
                    <div class="ms-lg-3 mt-2 mt-lg-0">
                        <a href="{{ route('logout') }}" id="logout"
                            onclick="event.preventDefault();document.getElementById('admin-logout-form').submit();"
                            class="btn btn-outline-danger btn-sm czp-btn-signout">Sign out</a>
                        <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="admin-app-main flex-grow-1 czp-admin-main">
        @include('flash-message')
        @yield('content')
    </main>

    @include('partials.admin-footer')

    @include('partials.czp-confirm-modal')

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('js/czp-confirm-modal.js') }}"></script>

</body>

</html>