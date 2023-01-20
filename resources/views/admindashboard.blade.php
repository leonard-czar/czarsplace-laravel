@extends('layouts.admin')

@section('title','Admin Dashboard |')
@section('content')

$admin = "Admin Dashboard";

$obj = new Admin;
$products = $obj->getallproduct();

$bobj = new Admin;
$brands = $bobj->getallbrands();

$cobj = new Admin;
$cust = $cobj->Getallcustomers();

$coobj = new Admin;
$orders = $coobj->Getallcustomersorder();

$pay = new Admin;
$payment = $pay->Getallpayment();

?>
<div class="row">
    <div class="col-sm text-center alert alert-info">
        <span style="font-size: 1.7vw;">Hi </span> <span><?php echo  $_SESSION['adminname'] ?> </span>
    </div>
</div>
<?php if (isset($_REQUEST['addproduct'])) {

?>
    <div class="row mt-3 mb-3">
        <div class="col-sm text-center alert alert-success">
            <span style="font-size: 1.7vw;">Product Added Successfully</span>
        </div>
    </div>
<?php
} ?>
<div class="container-fluid-sm">
    <div class="row justify-content-center m-sm-5">
        <div class="col-sm-2 m-sm-3 text-center p-2 bg-primary text-light" style="box-shadow:2px 3px 6px #050C24;height:100px ">
            <div> Available Products</div>
            <hr>
            <?php
            echo "<div>" . count($products) . "</div>";
            ?>
        </div>
        <div class="col-sm-2  m-sm-3 text-center p-2 text-light" style="box-shadow:2px 3px 6px #050C24; background-color:#2274A5 ">
            <div>Featured Brands</div>
            <hr>
            <?php
            echo "<div>" . count($brands) . "</div>";
            ?>
        </div>
        <div class="col-sm-2  m-sm-3 text-center p-2 text-light" style="box-shadow:2px 3px 6px #050C24;background-color:#E8AA14 ">
            <div>Total Orders</div>
            <hr>
            <?php
            echo "<div>" . count($orders) . "</div>";
            ?>
        </div>
        <div class="col-sm-2  m-sm-3 text-center p-2 text-light" style="box-shadow:2px 3px 6px #050C24;background-color:#47A025 ">
            <div>Customers</div>
            <hr>
            <?php
            echo "<div>" . count($cust) . "</div>";
            ?>
        </div>
        <div class="col-sm-2 m-sm-3 text-center p-2 bg-success text-light" style="box-shadow:2px 3px 6px #050C24;height:100px ">
            <div>Total Payment</div>
            <hr>
            <?php
            echo "<div>" . count($payment) . "</div>";
            ?>
        </div>
    </div>
</div>

@endsection