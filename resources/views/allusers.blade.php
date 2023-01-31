@extends('layouts.admin')

@section('title','all users |')
@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>Customers Information</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-10 mb-sm-2 mt-sm-3 table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th>Customer ID</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Phonumber</th>
                    <th>Registration date</th>
                </tr>
            </thead>
            <tbody>
                @php
                $kanta = 1;
                @endphp
                @foreach($users as $user)

                <tr>
                    <td> {{$kanta++}} </td>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->telephone}} </td>
                    <td> {{$user->created_at}}</td>
                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection