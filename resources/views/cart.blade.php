@extends('layouts.portal')

@section('content')

@isset ($carts) 


    <div class="row justify-content-center text-center">
        <div class="col-sm">
            <?php
            // if (isset($_REQUEST['no'])) {
            //     $no = $_REQUEST['no'];
            //     echo "<div class='alert alert-danger mt-1  mb-1 col-sm' style='text-align:center;font-family: czars2;'>$no</div>";
            // }


            ?>
        </div>
    </div>
    <div class="text-center mt-sm-4 mb-sm-4">
        <p class="text-dark " style="font-size: 1.6vw!important;">Your cart Items <i class="fa-solid fa-cart-shopping" style="font-size: 2.2vw!important;color:darkgray "></i></p>
    </div>
    <main>
        <div class="row justify-content-center">
            <div class="col-sm-9 mb-sm-2  table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark ">
                        <tr>
                            <th>S/N</th>
                            <th></th>
                            <th>Qty</th>
                            <th>Unit Price &#8358;</th>
                            <th>Total &#8358;</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $kanta = 1;
                        @endphp
                        @foreach ($carts as $value) 
                        
                            <tr>
                                <td><?php echo  $kanta++ ?></td>
                                <td><img src="images/<?php echo  $value['cartimg']  ?>" alt="" width="45" class="img-fluid"></td>
                                <td> {{$value->qty }} </td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->total}}</td>
                                <td>
                                    <form action="deletecart.php" method="post">
                                        <input type="hidden" name="cartid" value="<?php
                                        //  echo  $value['cartid']
                                          ?>">
                                        <input type="submit" class='btn btn-outline-danger btn-sm' name="btndelete" value="Remove">
                                    </form>
                                    <form action="editcartitem.php" method="post" class="">
                                        <input type="hidden" name="cartid" value="<?php 
                                        // echo  $value['cartid'] ?>
                                        ">
                                        <input type="hidden" name="cartqty" value="<?php
                                        //  echo  $value['qty'] ?>">
                                        <input type="hidden" name="price" value="<?php 
                                        // echo $value['price']  ?>">
                                        <input type="submit" class='btn btn-outline-warning btn-sm mt-sm-1 text-dark' name="btnedit" value="Edit Qty">
                                    </form>
                                </td>


                            </tr>
                            <h2></h2>
                        
                        @endforeach 


                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <div class="row mb-5 justify-content-center">
        <div class="col-2 offset-1 text-center">
            <div style="font-size: 1.6vw; color:rgba(0, 0, 0,0.5)"><i> total</i> &#8358;</div>
        </div>
        <div class="col-6 text-center" style="margin-right: 40px;">
            <b>

                <div>
                    <input type="text" value="<?php 
                    // echo array_sum($totals); ?>" name="total" class="text-center" disabled style="color:black">
                </div>
            </b>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-sm-4 mb-sm-4 mt-sm-1 text-center justify-content-center">
            <form action="checkout.php" method="post">
                <input type="hidden" value="<?php echo array_sum($totals); ?>" name="alltotal" class="text-center">
                <input type="hidden" name="custid" value="<?php echo  $_SESSION['customer_id'] ?>">
                <input type="submit" name="checkout" value="Check Out" class="btn btn-sm text-light col-sm-5 form-control bg-warning">
            </form>
        </div>
        <div class="col-sm-4 mb-sm-4 mt-sm-1 text-center justify-content-center">
            <form action="deletecart.php" method="post" onsubmit="validateDelete(event)">
                <input type="hidden" name="custid" value="<?php echo  $_SESSION['customer_id'] ?>">
                <input type="submit" name="deleteall" value="Clear cart" class="btn btn-sm text-light col-sm-5 form-control" style="background-color:red ;">
            </form>
        </div>
    </div>



@endisset
  @empty 
    <div class="row justify-content-center text-center ">
        <div class="col-sm alert alert-secondary ">
            <h2 style="font-family: czars2;">Your cart is currently empty</h2>
        </div>
    </div>
    <div class="text-center mb-sm-5" style="font-family: czars2;"><a href="dashboard.php" style="text-decoration:underline ;color:blue;">start shopping</a></div>


@endempty
@endsection
