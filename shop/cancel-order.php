<?php
session_start();
include('includes/db.php');
$orderId=$_POST['orderId'];
 
$stmt = $DBcon->prepare("update orders set orderStatus='Cancelled' where id=:orderId");
 
$stmt->bindparam(':orderId', $orderId);
if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}

 
?>