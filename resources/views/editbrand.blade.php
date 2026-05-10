@extends('layouts.admin')

@section('title', 'Edit brand |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Update brand</h1>
            <p class="czp-admin-hero__lead">Rename or replace the logo — changes apply everywhere this brand appears.</p>
        </header>

        <div class="czp-admin-form-card">
            <form action="{{ route('updatebrand', $brand->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="brandname">Brand name</label>
                    <input type="text" name="brandname" id="brandname" class="form-control" value="{{ old('brandname', $brand->brandname) }}" required>
                </div>

                @if ($brand->image_url)
                    <div class="mb-3 p-3 rounded border bg-light">
                        <p class="small text-muted mb-2 mb-md-2">Current image</p>
                        <img src="{{ $brand->image_url }}" alt="{{ $brand->brandname }}" class="img-fluid rounded border czp-admin-brand-preview">
                    </div>
                @endif

                <div class="mb-4">
                    <label class="form-label" for="image">Replace image (optional)</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                <button type="submit" name="updateimg" class="btn czp-admin-btn-primary w-100 py-2">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Save changes
                </button>
            </form>
        </div>

        <p class="text-center">
            <a href="{{ route('allbrands') }}" class="text-decoration-none czp-admin-back-link">← Back to brands</a>
        </p>
    </div>
@endsection
