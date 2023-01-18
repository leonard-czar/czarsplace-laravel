<?php include_once "indexheader.php" ;

$brandobj = new Customer();
$brands = $brandobj->getallbrands();
?>

<div class="row justify-content-center">
<?php
  if (count($brands) > 0) {

    foreach ($brands as $key => $val) {
  ?>
        <div class="col-sm mb-sm-5 mt-sm-1 text-center justify-content-center">
          <div >
            <img src="images/<?php echo $val['brand_image'] ?>" alt="" width="110" class="img-fluid">
          </div>
          
          <a href="<?php if ($val['brand_id']==1) {
           echo "index_audemars.php";
          }if ($val['brand_id']==2) {
            echo "index_rolex.php";
           }if ($val['brand_id']==3) {
            echo "index_hublot.php";
           } ?>" class="btn btn-outline-primary btn-sm col-7" >View <?php 
            echo $val['brand_name'];
            ?></a>
          <hr>
        </div>
<?php } }?>
      </div>

<?php

include_once "indexfooter.php"; ?>