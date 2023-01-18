@extends('layouts.admin')

@section('content')
<div class="container-fluid-sm">
    <div style="font-family: czars2;">
        
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-sm-10 text-center">

            <h3>All Products</h3>
        </div>
    </div>
    <div class="row m-sm-3">
        <div class="col-sm mb-sm-2 mt-sm-2 table-responsive">
            <table class="table table-hover table-striped col-sm table-responsive" style="font-size:1.2vw ;">
                <thead class="table-dark col-sm">
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Brand ID</th>
                        <th>Price</th>
                        <th>Product Desc</th>
                        <th>Collection</th>
                        <th>Reference Number</th>
                        <th>Case Desc</th>
                        <th>Gender</th>
                        <th>Movement</th>
                        <th>Dial</th>
                        <th>Bezel</th>
                        <th>Crystal </th>
                        <th>Caliber</th>
                        <th>Watch Function</th>
                        <th>Mechanism</th>
                        <th>Number Of Jewels</th>
                        <th>Total Diameter</th>
                        <th>Power Reserve</th>
                        <th>Number Of Parts</th>
                        <th>Frequency</th>
                        <th>Bracelet</th>
                        <th>Clasp</th>
                        <th>Water Resistance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="col-lg">
                    @php
                    $kanta = 1;
                    @endphp
                    @foreach ($products as $value)

                    <tr class="col-lg">
                        <td><?php echo  $kanta++ ?></td>
                        <td><img src="{{$value->watch_image}}" alt="" width="45" class="img-fluid"></td>
                        <td> {{$value->id}} </td>
                        <td> {{$value->watch_name}}</td>
                        <td>{{$value->brand_id}}</td>
                        <td>&#8358; {{$value->watch_price}}</td>
                        <td> {{$value->watch_description}}</td>
                        <td> {{$value->collection}}</td>
                        <td>{{$value->reference_number}}</td>
                        <td>{{$value->case_description}}</td>
                        <td>{{$value->gender}}</td>
                        <td>{{$value->movement}}</td>
                        <td>{{$value->dial}}</td>
                        <td>{{$value->Bezel}}</td>
                        <td>{{$value->crystal}}</td>
                        <td>{{$value->caliber}}</td>
                        <td>{{$value->watch_function}}</td>
                        <td>{{$value->mechanism}} </td>
                        <td>{{$value->number_of_jewels}}</td>
                        <td>{{$value->total_diameter}}</td>
                        <td>{{$value->power_reserve}}</td>
                        <td>{{$value->number_of_parts}}</td>
                        <td>{{$value->frequency}} </td>
                        <td> {{$value->bracelet}} </td>
                        <td> {{$value->clasp}} </td>
                        <td>{{$value->water_resistance}}</td>
                        <td>
                            <form action="/deleteproduct/{{$value->id}}" method="POST" onsubmit="Deleteproduct(event)"> 
                                @csrf                               
                                <input type="submit" class='btn btn-outline-danger btn-sm  col-12' name="btndelete" value="Delete">
                            </form>
                            <form action="/editproduct/{{$value->id}}" method="GET">
                                @csrf                              
                                <input type="submit" class='btn btn-outline-primary btn-sm mt-sm-2 mb-sm-2 col-12 ' name="btnedit" value="Edit">
                            </form>
                            
                        </td>


                    </tr>


                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <div class="row m-sm-5 justify-content-center">
        <div class="col-sm-6 ">
            <a href="/addproduct" class="btn btn-primary form-control">Add Product</a>
        </div>
    </div>
</div>

@endsection