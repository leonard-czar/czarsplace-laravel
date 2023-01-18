@extends('layouts.mylayout')

@section('content')
<div class='row'>
  <div class="col-sm " style="text-align:center">
    <?php
    ?>
    <img src="images/<?php 
    // echo $brandap['brand_image']; ?>" width="100" alt="" class="img-fluid" id="Audemars">
    <?php
    ?>
  </div>
</div>
<hr>
<div class='row'>
  <?php
  // if (count($audemars) > 0) {
  //   foreach ($audemars as $key => $value) {
  ?>
      <div class="col-sm-3 p-sm-3">
        <img src="images/<?php 
        // echo $value['watch_image'] ?>" alt="" class="img-fluid">
        <div style="text-align: center;font-size: 1vw;color:rgba(0, 0, 0,0.6);"><b><?php
        //  echo $value['watch_description'] ?></b></div>
        <form action="index_watchspec.php" method="post" style="text-align: center;">
          <input type="hidden" value="<?php
          //  echo $value['watch_id']; ?>" name="productid">
          <input type="submit" value="<?php 
          // echo $value['watch_Name']; ?>" class="btn btn-sm col-sm-10 mt-sm-2" style="background-color: #050C24;color:burlywood;font-size: 1.2vw;" name="btnsubmit">

          <input type="hidden" value="<?php 
          //  $brandap['brand_name']; ?>" name="brandname">
          <input type="hidden" value="<?php 
          //  $value['watch_price']; ?>" name="productprice">
          <input type="hidden" value="<?php 
          //  $value['watch_image']; ?>" name="productimg">
          <input type="hidden" value="<?php 
          //  $value['watch_description']; ?>" name="productdesc">
          <input type="hidden" value="<?php 
          //  $value['collection']; ?>" name="Collection">
          <input type="hidden" value="<?php 
          //  $value['reference_number']; ?>" name="Reference Number">
          <input type="hidden" value="<?php 
          //  $value['gender']; ?>" name="Gender">
          <input type="hidden" value="<?php 
          //  $value['movement']; ?>" name="Movement">
          <input type="hidden" value="<?php 
          //  $value['dial']; ?>" name="Dial">
          <input type="hidden" value="<?php 
          //  $value['Bezel']; ?>" name="Bezel">
          <input type="hidden" value="<?php 
          //  $value['crystal']; ?>" name="Crystal">
          <input type="hidden" value="<?php 
          //  $value['caliber']; ?>" name="Caliber">
          <input type="hidden" value="<?php 
          //  $value['watch_function']; ?>" name="Watch function">
          <input type="hidden" value="<?php 
          //  $value['mechanism']; ?>" name="Mechanism">
          <input type="hidden" value="<?php 
          //  $value['number_of_jewels']; ?>" name="Number of Jewels">
          <input type="hidden" value="<?php 
          //  $value['total_diameter']; ?>" name="Total Diameter">
          <input type="hidden" value="<?php 
          //  $value['power_reserve']; ?>" name="Power Reserve">
          <input type="hidden" value="<?php 
          //  $value['number_of_parts']; ?>" name="Number Of Parts">
          <input type="hidden" value="<?php 
          //  $value['frequency']; ?>" name="Frequency">
          <input type="hidden" value="<?php 
          //  $value['bracelet']; ?>" name="bracelet">
          <input type="hidden" value="<?php 
          //  $value['clasp']; ?>" name="Clasp">
          <input type="hidden" value="<?php 
          //  $value['water_resistance']; ?>" name="Water Resistance">

        </form>
      </div>
  <?php
  //  }
  // }  ?>

</div>

<div class="row">
  <div class="col-sm text-center mb-sm-3 mt-sm-3">
    <div style="text-decoration:underline ;"><a href="index.php" class="text-primary">
        << Back</a>
    </div>
  </div>
</div>
@endsection