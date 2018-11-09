<?php
session_start();
include('shop/includes/db.php');

$id = $_SESSION['id'];
$firstname = $_SESSION['name'];
$lastname = $_SESSION['lname'];

$fullname = $firstname.' '.$lastname;
$trantype = "Bought premium with EWALLET "; 
$trancode = "EWALLET";
$t_in = 2.00;
$t_out = 0;
$balance=$_POST['balance'];
$episodeid=$_POST['episodeid'];
 
$stmt = $DBcon->prepare("insert into ledger(idno, name, trantype, trancode, t_in, t_out, balance) values(:idno, :fullname, :trantype, :trancode, :t_in, :t_out, :balance)");

$stmt->bindparam(':idno', $id);
$stmt->bindparam(':fullname', $fullname);
$stmt->bindparam(':trantype', $trantype);
$stmt->bindparam(':trancode', $trancode);
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


$stmt1 = $DBcon->prepare("update shopusers SET ewallet=:balance WHERE id=:id");


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

$stmt2 = $DBcon->prepare("insert into epiownership(user_id, user, episode_id) values(:idno, :fullname, :episodeid)");

$stmt2->bindparam(':idno', $id);
$stmt2->bindparam(':fullname', $fullname);
$stmt2->bindparam(':episodeid', $episodeid);
 


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