@extends('layouts.admin')

@section('title', 'Brands |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Featured brands</h1>
            <p class="czp-admin-hero__lead">Manage brand logos and names. Deleting a brand may affect linked products — confirm before removing.</p>
        </header>

        <div class="czp-admin-card">
            <div class="czp-admin-card__body czp-admin-card__body--flush">
                <div class="czp-admin-table-wrap">
                    <table class="table table-bordered czp-admin-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>ID</th>
                                <th>Brand name</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $index => $value)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ $value->image_url }}" alt="{{ $value->brandname }}" class="czp-admin-thumb czp-admin-thumb-lg">
                                    </td>
                                    <td>{{ $value->id }}</td>
                                    <td><strong>{{ $value->brandname }}</strong></td>
                                    <td class="text-end">
                                        <div class="d-flex flex-wrap gap-1 justify-content-end">
                                            <form action="{{ route('branddelete', $value->id) }}" method="POST" class="d-inline" data-czp-confirm
                                                data-czp-confirm-title="Delete this brand?"
                                                data-czp-confirm-body="Products linked to this brand may be affected. This action cannot be undone."
                                                data-czp-confirm-ok="Yes, delete">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                            <form action="{{ route('brandedit', $value->id) }}" method="GET" class="d-inline">
                                                <button type="submit" class="btn btn-outline-warning btn-sm text-dark">Edit</button>
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

        <div class="text-center pb-4">
            <a href="{{ url('/addbrand') }}" class="btn czp-admin-btn-primary px-4"><i class="fa-solid fa-plus me-2"></i>Add brand</a>
        </div>
    </div>
@endsection
