<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  @include('partials.app-main-layout')
  <title>@yield('title', 'Sign in') — {{ config('app.name', "Czar's Place") }}</title>
  <link rel="stylesheet" href="{{ asset('css/shell-layouts.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app-ui-polish.css') }}">
  @stack('styles')
</head>

<body class="czp-admin-auth-body">
  <div class="container-fluid-sm py-4 px-3">
    @include('flash-message')
    @yield('content')
  </div>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>