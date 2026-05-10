@extends('layouts.portal')

@section('title', ($brand->brandname ?? 'Brand') . ' |')

@section('content')
    @include('partials.brand-catalog-grid')
@endsection
