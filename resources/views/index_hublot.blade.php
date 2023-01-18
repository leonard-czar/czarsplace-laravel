<?php
include_once "indexheader.php";

$hublotobj = new Customer();
$hublot = $hublotobj->getallhublot();
$brandobj = new Customer();
$brandhublot = $brandobj->getbrandhublot();

?>
<div class='row'>
  <div class="col-sm mb-sm-2 mt-sm-3 " style="text-align:center">
    <img src="images/<?php echo $brandhublot['brand_image']; ?>" width="100" alt="" class="img-fluid" id="Audemars">
  </div>
  <hr>
</div>
<div class='row'>

  <?php
  if (count($hublot) > 0) {

    foreach ($hublot as $key => $value) {
  ?>
      <div class="col-sm-3 mt-sm-4">
        <img src="images/<?php echo $value['watch_image'] ?>" alt="" class="img-fluid">
        <div style="text-align: center;font-size: 1vw;color:rgba(0, 0, 0,0.6);"><b><?php echo $value['watch_description'] ?></b></div>
        <form action="index_watchspec.php" method="post" style="text-align: center;">
          <input type="hidden" value="<?php echo $value['watch_id']; ?>" name="productid">
          <input type="submit" value="<?php echo $value['watch_Name']; ?>" class="btn btn-sm col-sm-10 mt-sm-2" style="background-color: #050C24;color:burlywood;font-size: 1.2vw;" name="btnsubmit">

          <input type="hidden" value="<?php echo $brandhublot['brand_name']; ?>" name="brandname">
          <input type="hidden" value="<?php echo $value['watch_price']; ?>" name="productprice">
          <input type="hidden" value="<?php echo $value['watch_image']; ?>" name="productimg">
          <input type="hidden" value="<?php echo $value['watch_description']; ?>" name="productdesc">
          <input type="hidden" value="<?php echo $value['collection']; ?>" name="Collection">
          <input type="hidden" value="<?php echo $value['reference_number']; ?>" name="Reference Number">
          <input type="hidden" value="<?php echo $value['gender']; ?>" name="Gender">
          <input type="hidden" value="<?php echo $value['movement']; ?>" name="Movement">
          <input type="hidden" value="<?php echo $value['dial']; ?>" name="Dial">
          <input type="hidden" value="<?php echo $value['Bezel']; ?>" name="Bezel">
          <input type="hidden" value="<?php echo $value['crystal']; ?>" name="Crystal">
          <input type="hidden" value="<?php echo $value['caliber']; ?>" name="Caliber">
          <input type="hidden" value="<?php echo $value['watch_function']; ?>" name="Watch function">
          <input type="hidden" value="<?php echo $value['mechanism']; ?>" name="Mechanism">
          <input type="hidden" value="<?php echo $value['number_of_jewels']; ?>" name="Number of Jewels">
          <input type="hidden" value="<?php echo $value['total_diameter']; ?>" name="Total Diameter">
          <input type="hidden" value="<?php echo $value['power_reserve']; ?>" name="Power Reserve">
          <input type="hidden" value="<?php echo $value['number_of_parts']; ?>" name="Number Of Parts">
          <input type="hidden" value="<?php echo $value['frequency']; ?>" name="Frequency">
          <input type="hidden" value="<?php echo $value['bracelet']; ?>" name="bracelet">
          <input type="hidden" value="<?php echo $value['clasp']; ?>" name="Clasp">
          <input type="hidden" value="<?php echo $value['water_resistance']; ?>" name="Water Resistance">

        </form>
      </div>
  <?php
    }
  }  ?>
</div>

<div class="row">
  <div class="col-sm text-center mb-sm-3 mt-sm-3">
    <div style="text-decoration:underline ;"><a href="index.php" class="text-primary">
        << Back</a>
    </div>
  </div>
</div>

<?php
include_once "indexfooter.php";
?>