<?php
session_start();
include('shop/includes/db.php');

$id = $_SESSION['id'];
$firstname = $_SESSION['name'];
$lastname = $_SESSION['lname'];

$fullname = $firstname.' '.$lastname;
$value=$_POST['value'];

$stmt = $DBcon->prepare("insert into topupcard(user_id, user, value) values(:idno, :fullname, :value)");

$stmt->bindparam(':idno', $id);
$stmt->bindparam(':fullname', $fullname);
$stmt->bindparam(':value', $value);

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