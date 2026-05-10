@extends('layouts.admin')

@section('title', 'Customers |')

@section('content')
    <div class="container-fluid czp-admin-page px-3 px-md-4 py-4">
        <header class="czp-admin-hero">
            <h1 class="czp-admin-hero__title">Customer accounts</h1>
            <p class="czp-admin-hero__lead">Registered shoppers (customer role). Use this list for support and account checks.</p>
        </header>

        <div class="czp-admin-card">
            <div class="czp-admin-card__body czp-admin-card__body--flush">
                <div class="czp-admin-table-wrap">
                    <table class="table table-bordered czp-admin-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Registered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->created_at->format('j M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
