<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="leonard lebechi">
    <meta name="description" content="Czar's Place — luxury wristwatches in Lagos. Shop curated brands, explore men's and women's collections, and checkout securely.">
    <meta name="keywords" content="Czar's Place, wristwatch, luxury watch, mechanical watch, men's watches, women's watches, timepiece, online watch store, Lagos, Rolex, Hublot, Audemars Piguet, Patek Philippe">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon_io/site.webmanifest')}}">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    @include('partials.app-main-layout')
    <title> @yield('title') {{config('app.name',"Czar's Place")}} Haven for luxury wristwatches</title>

    <link rel="stylesheet" href="{{ asset('css/portal-layout.css') }}">

    @include('partials.site-layout-styles')
    <link rel="stylesheet" href="{{ asset('css/app-ui-polish.css') }}">
    <link rel="stylesheet" href="{{ asset('css/legacy-views.css') }}">
    @stack('styles')

</head>

<body class="czp-site d-flex flex-column min-vh-100">

    @php
    $portalCartActive = request()->routeIs('showcart', 'cartedit', 'checkout');

    $czpHomeUrl = route('home');
    $czpHomeActive = request()->routeIs('home', 'dashboard');
    $czpBrandsUrl = route('displaybrands');
    $czpBrandsActive = request()->routeIs('displaybrands');
    $czpMaleUrl = route('malewatch');
    $czpMaleActive = request()->routeIs('malewatch');
    $czpFemaleUrl = route('femalewatch');
    $czpFemaleActive = request()->routeIs('femalewatch');
    $czpSearchAction = route('redirect');
    @endphp

    <header class="czp-header-wrap">
        <div class="czp-header-top">
            <div class="container-fluid px-3 px-lg-4">
                <a class="czp-header-brand" href="{{ $czpHomeUrl }}" id="brandname">{{ config('app.name', "Czar's
                    Place") }}</a>
                <form class="czp-header-search d-flex" method="post" action="{{ $czpSearchAction }}">
                    @csrf
                    <input class="form-control" type="search" name="searchbox" placeholder="Search watches…"
                        aria-label="Search" required minlength="1" autocomplete="off">
                    <button class="btn" type="submit" name="btnsearch">Search</button>
                </form>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark czp-nav-main">
            <div class="container-fluid px-3 px-lg-4">
                <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 flex-wrap navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $czpHomeActive ? 'active' : '' }}" @if($czpHomeActive)
                                aria-current="page" @endif href="{{ $czpHomeUrl }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $czpBrandsActive ? 'active' : '' }}"
                                href="{{ $czpBrandsUrl }}">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $czpMaleActive ? 'active' : '' }}"
                                href="{{ $czpMaleUrl }}">Men’s collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname {{ $czpFemaleActive ? 'active' : '' }}"
                                href="{{ $czpFemaleUrl }}">Ladies’ collection</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link brandname {{ request()->routeIs('userorder') ? 'active' : '' }}"
                                href="{{ url('/userorder') }}">My orders</a>
                        </li>
                        @endauth
                    </ul>
                    <div class="czp-nav-actions ms-lg-3 mt-2 mt-lg-0">
                        @auth
                        <a class="czp-nav-cart {{ $portalCartActive ? 'cart-nav-active' : '' }}"
                            href="{{ route('showcart') }}" aria-label="Shopping cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            @if ($carts->count() > 0)
                            <span class="badge rounded-pill bg-success">{{ $carts->count() }}</span>
                            @endif
                        </a>
                        <a href="{{ route('logout') }}" id="logout"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="btn btn-outline-danger btn-sm czp-btn-signout">Sign out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <a class="nav-link brandname czp-nav-account {{ request()->routeIs('login', 'register') || request()->is('password*') ? 'active' : '' }} d-inline-flex align-items-center"
                            href="{{ route('login') }}">Account</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        @include('flash-message')
        @yield('content')
    </main>

    @include('partials.site-footer')

    @include('partials.czp-confirm-modal')

    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/czp-confirm-modal.js') }}"></script>

</body>

</html>