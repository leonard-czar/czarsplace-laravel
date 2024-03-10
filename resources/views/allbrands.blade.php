@extends('layouts.admin')

@section('content')
<div style="font-family: czars2;">

</div>
<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>Featured Brands</h3>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-sm-10 m-3 table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $kanta = 1;
                @endphp
                @foreach ($brands as $value)

                <tr>
                    <td> {{$kanta++}}</td>
                    <td><img src="{{$value->brandimg}}" alt="" width="75" class="img-fluid"></td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->brandname}}</td>
                    <td>
                        <form action="/deletebrand/{{$value->id}}" method="post" onsubmit="validateDelete(event)">
                            @csrf
                            <input type="submit" class='btn btn-outline-danger btn-sm col-sm-6 mt-2 mb-2  text-center'
                                name="btndelete" value="Delete Brand">
                        </form>
                        <form action="/editbrand/{{$value->id}}" method="GET">
                            @csrf
                            <input type="submit" class='btn btn-outline-warning btn-sm  text-dark col-sm-6'
                                name="btnedit" value="Update Brand">
                        </form>
                    </td>


                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
<div class="row m-5 justify-content-center">
    <div class="col-sm-6 ">
        <a href="/addbrand" class="btn form-control" style="background-color:#2274A5;color:white">Add Brand</a>
    </div>
</div>

@endsection