<?php
session_start();
include('includes/db.php');
$method=$_POST['method'];
 
$stmt = $DBcon->prepare("update orders set paymentMethod=:method where userId='".$_SESSION['id']."' and paymentMethod is null ");
 
$stmt->bindparam(':method', $method);
if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Probelm occur.";
  echo json_encode($error);
}

?>