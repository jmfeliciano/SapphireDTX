<?php
session_start();
include('includes/db.php');
$orderId=$_POST['orderId'];
$addInfo=$_POST['addInfo'];
$reason=$_POST['reason'];
 
$stmt = $DBcon->prepare("update orders set orderStatus='Item Return' where id=:orderId");
 
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


$stmt1 = $DBcon->prepare("insert orderreturns set order_id=:orderId, reason=:reason, additional_info=:addInfo");
 
$stmt1->bindparam(':orderId', $orderId);
$stmt1->bindparam(':reason', $reason);
$stmt1->bindparam(':addInfo', $addInfo);
if($stmt1->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}

 
?>