<?php
session_start();
include('include/db.php');
$productId=$_POST['productId'];
$inStock=$_POST['inStock'];
 
$stmt = $DBcon->prepare("update products set product_in_stock=:inStock where id=:productId");
 
$stmt->bindparam(':productId', $productId);
$stmt->bindparam(':inStock', $inStock);
if($stmt->execute())
{
  $res="Data Inserted Successfully";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}
 
?>