@extends('layouts.admin')

@section('title', 'Add brand |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Add a brand</h1>
            <p class="czp-admin-hero__lead">Upload a logo and name — new brands appear in the storefront brand grid.</p>
        </header>

        <div class="czp-admin-form-card">
            <form action="{{ route('brand') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="brand_name">Brand name</label>
                    <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="e.g. Rolex" value="{{ old('brand_name') }}" required>
                    @error('brand_name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="brand_image">Brand logo</label>
                    <input type="file" name="brand_image" id="brand_image" class="form-control" accept="image/*" required>
                    @error('brand_image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                    <p class="small text-muted mt-2 mb-0">PNG or JPG, reasonably square logos look best in the catalog.</p>
                </div>

                <button type="submit" name="btnaddbrand" class="btn czp-admin-btn-primary w-100 py-2">
                    <i class="fa-solid fa-circle-plus me-2"></i>Add brand
                </button>
            </form>
        </div>

        <p class="text-center">
            <a href="{{ route('allbrands') }}" class="text-decoration-none czp-admin-back-link">← Back to brands</a>
        </p>
    </div>
@endsection
