<?php
include_once "functions/admin.php";


if (isset($_REQUEST['btndelete'])) {
   $delobj=new Admin();
$delobj->Deleteproduct($_REQUEST['watchid']);
$msg="Product Deleted Successfully!";
 header("Location: allproducts.php?delete=$msg");
exit;
}

?>