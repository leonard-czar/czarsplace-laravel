@extends('layouts.admin')

@section('title', 'Add product |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Add a product</h1>
            <p class="czp-admin-hero__lead">Complete specifications below — they drive the public product detail page and search.</p>
        </header>

        <div class="czp-admin-form-card">
            <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2 class="czp-admin-form-section">Basics</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="watch_name">Watch name</label>
                        <input type="text" name="watch_name" id="watch_name" class="form-control" value="{{ old('watch_name') }}" required placeholder="Model name">
                        @error('watch_name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="watch_price">Price (₦)</label>
                        <input type="number" step="0.01" name="watch_price" id="watch_price" class="form-control" value="{{ old('watch_price') }}" required>
                        @error('watch_price')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="watch_description">Description</label>
                        <textarea name="watch_description" id="watch_description" class="form-control" rows="3" placeholder="Short customer-facing description" required>{{ old('watch_description') }}</textarea>
                        @error('watch_description')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="brandid">Brand</label>
                        <select name="brandid" id="brandid" class="form-select" required>
                            <option value="">Choose brand</option>
                            @foreach ($brands as $value)
                                <option value="{{ $value->id }}" @selected(old('brandid') == $value->id)>{{ $value->brandname }}</option>
                            @endforeach
                        </select>
                        @error('brandid')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="watch_image">Product image</label>
                        <input type="file" name="watch_image" id="watch_image" class="form-control" required accept="image/*">
                        <div id="watch-image-preview-wrap" class="mt-2 d-none">
                            <p class="small text-muted mb-1">Preview</p>
                            <img src="" alt="Selected watch image preview" id="watch-image-preview" class="img-fluid rounded border czp-admin-img-preview" width="200" height="200">
                        </div>
                        @error('watch_image')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="czp-admin-form-section">Case &amp; dial</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="collection">Collection</label>
                        <input type="text" name="collection" id="collection" class="form-control" value="{{ old('collection') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ref_no">Reference number</label>
                        <input type="text" name="ref_no" id="ref_no" class="form-control" value="{{ old('ref_no') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="Case_desc">Case description</label>
                        <textarea name="Case_desc" id="Case_desc" class="form-control" rows="2">{{ old('Case_desc') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="">—</option>
                            <option value="male" @selected(old('gender') === 'male')>Men</option>
                            <option value="female" @selected(old('gender') === 'female')>Ladies</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="dial">Dial</label>
                        <textarea name="dial" id="dial" class="form-control" rows="2">{{ old('dial') }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="bezel">Bezel</label>
                        <input type="text" name="bezel" id="bezel" class="form-control" value="{{ old('bezel') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="crystal">Crystal</label>
                        <textarea name="crystal" id="crystal" class="form-control" rows="2">{{ old('crystal') }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="water_resistance">Water resistance</label>
                        <input type="text" name="water_resistance" id="water_resistance" class="form-control" value="{{ old('water_resistance') }}">
                    </div>
                </div>

                <h2 class="czp-admin-form-section">Movement</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="movement">Movement</label>
                        <input type="text" name="movement" id="movement" class="form-control" value="{{ old('movement') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="caliber">Caliber</label>
                        <input type="text" name="caliber" id="caliber" class="form-control" value="{{ old('caliber') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="watch_function">Watch function</label>
                        <input type="text" name="watch_function" id="watch_function" class="form-control" value="{{ old('watch_function') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="mechanism">Mechanism</label>
                        <input type="text" name="mechanism" id="mechanism" class="form-control" value="{{ old('mechanism') }}">
                    </div>
                </div>

                <h2 class="czp-admin-form-section">Technical</h2>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="number_of_jewels">Number of jewels</label>
                        <input type="text" name="number_of_jewels" id="number_of_jewels" class="form-control" value="{{ old('number_of_jewels') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="total_diameter">Total diameter</label>
                        <input type="text" name="total_diameter" id="total_diameter" class="form-control" value="{{ old('total_diameter') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="power_reserve">Power reserve</label>
                        <input type="text" name="power_reserve" id="power_reserve" class="form-control" value="{{ old('power_reserve') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="number_of_parts">Number of parts</label>
                        <input type="text" name="number_of_parts" id="number_of_parts" class="form-control" value="{{ old('number_of_parts') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="frequency">Frequency</label>
                        <input type="text" name="frequency" id="frequency" class="form-control" value="{{ old('frequency') }}">
                    </div>
                </div>

                <h2 class="czp-admin-form-section">Bracelet</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="bracelet">Bracelet</label>
                        <input type="text" name="bracelet" id="bracelet" class="form-control" value="{{ old('bracelet') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="clasp">Clasp</label>
                        <input type="text" name="clasp" id="clasp" class="form-control" value="{{ old('clasp') }}">
                    </div>
                </div>

                <button type="submit" class="btn czp-admin-btn-primary w-100 py-2 mt-3">
                    <i class="fa-solid fa-circle-plus me-2"></i>Add product
                </button>
            </form>
        </div>

        <p class="text-center mb-5">
            <a href="{{ route('allproduct') }}" class="text-decoration-none czp-admin-back-link">← Back to products</a>
        </p>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin-watch-image-preview.js') }}" defer></script>
@endpush
