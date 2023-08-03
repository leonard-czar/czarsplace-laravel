@extends('layouts.portal')

@section('content')

@if ($carts->count()>0)

<div class="text-center mt-4 mb-4">
    <h5 class="text-dark ">Your cart Items <i class="fa-solid fa-cart-shopping" style="color:darkgray "></i></h5>
</div>
<main>
    <div class="row justify-content-center">
        <div class="col-sm-9 mb-2  table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark ">
                    <tr>
                        <th>S/N</th>
                        <th></th>
                        <th>Qty</th>
                        <th>Unit Price &#8358;</th>
                        <th>Total &#8358;</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $kanta = 1;
                    @endphp
                    @foreach ($carts as $cart)

                    <tr>
                        <td>
                            <?php echo  $kanta++ ?>
                        </td>
                        <td><img src="{{$cart->product['watch_image'] }}" alt="" width="100" class="img-fluid"></td>
                        <td> {{$cart->qty }} </td>
                        <td>{{$cart->price}}</td>
                        <td>{{$cart->total}}</td>
                        <td>
                            <form method="POST" action="{{ route('cartdeleteitem', ['id' => $cart->id]) }}">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class='btn btn-outline-danger btn-sm' name="btndelete"
                                    value="Remove">
                            </form>

                            <form action="/editcart/{{$cart->id}}" method="GET" class="">
                                @csrf
                                <input type="submit" class='btn btn-outline-warning btn-sm mt-1 text-dark'
                                    name="btnedit" value="Edit Qty">
                            </form>
                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</main>
<div class="row mb-5 justify-content-center">
    <div class="col-2 col-lg-3 offset-1 text-center">
        <div style=" color:rgba(0, 0, 0,0.5)"><i> total</i> &#8358;</div>
    </div>
    <div class="col-6 text-center" style="margin-right: 40px;">
        <b>

            <div>
                <input type="text" value="{{$total}}" name="total" class="text-center" disabled>
            </div>
        </b>
    </div>
</div>



<div class="row justify-content-center">
    <div class="col-sm-4 col-lg-4 mb-4 mt-1 text-center justify-content-center">
        <form action="/checkout" method="GET">
            @csrf
            <input type="submit" name="checkout" value="Check Out" class="btn btn-sm text-light  col-6 bg-warning">
        </form>
    </div>
    <div class="col-sm-4 col-lg-4 mb-4 mt-1 text-center justify-content-center">
        <form action="/clearcart" method="POST" onsubmit="validateDelete(event)">
            @csrf
            @method('DELETE')
            <input type="submit" name="deleteall" value="Clear cart" class="btn btn-sm text-light col-6  "
                style="background-color:red ;">
        </form>
    </div>
</div>



@endif
@if($carts->count()<1) <div class="row justify-content-center text-center ">
    <div class="col-sm alert alert-secondary ">
        <h2 style="font-family: czars2;">Your cart is currently empty</h2>
    </div>
    </div>
    <div class="text-center mb-sm-5" style="font-family: czars2;"><a href="{{ route('dashboard')}}"
            style="text-decoration:underline ;color:blue;">start shopping</a></div>


    @endif
    @endsection