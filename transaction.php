<?php
session_start();
include('shop/includes/db.php');

$id = $_SESSION['id'];
$firstname = $_SESSION['name'];
$lastname = $_SESSION['lname'];

$fullname = $firstname.' '.$lastname;
$trantype = "Bought premium with TOKENS";
$trancode = "TOKEN";
$t_in = 1.00;
$t_out = 0;
$balance=$_POST['balance'];
$movieid=$_POST['movieid'];
$movietitle=$_POST['movietitle'];
 
$stmt = $DBcon->prepare("insert into ledger(idno, name, trantype, t_in, t_out, balance) values(:idno, :fullname, :trantype, :t_in, :t_out, :balance)");

$stmt->bindparam(':idno', $id);
$stmt->bindparam(':fullname', $fullname);
$stmt->bindparam(':trantype', $trantype);
$stmt->bindparam(':t_in', $t_in);
$stmt->bindparam(':t_out', $t_out);
$stmt->bindparam(':balance', $balance);
 


 if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}


$stmt1 = $DBcon->prepare("update shopusers SET tokens=:balance WHERE id=:id");


$stmt1->bindparam(':id', $id);
$stmt1->bindparam(':balance', $balance);

 if($stmt1->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}

$stmt2 = $DBcon->prepare("insert into mvownership(user_id, user, movie_id, movie_title) values(:idno, :fullname, :movieid, :movietitle)");

$stmt2->bindparam(':idno', $id);
$stmt2->bindparam(':fullname', $fullname);
$stmt2->bindparam(':movieid', $movieid);
$stmt2->bindparam(':movietitle', $movietitle);
 


 if($stmt2->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}



 ?>