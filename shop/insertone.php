<?php
session_start();
include('includes/db.php');
$pdd=$_POST['pdd'];
$quantity=$_POST['quantity'];
$session_id = $_SESSION['id'];

$value=array_combine($pdd,$quantity);
 
foreach($value as $qty=> $val34){
$stmt = $DBcon->prepare("insert into orders(userId,productId,quantity) values(:session_id,:qty,:val34)");
 
$stmt->bindparam(':session_id', $session_id);
$stmt->bindparam(':qty', $qty);
$stmt->bindparam(':val34', $val34);
if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}

}
 
 ?>