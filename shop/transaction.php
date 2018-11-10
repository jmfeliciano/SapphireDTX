<?php
session_start();
include('includes/db.php');


$firstname = $_SESSION['name'];
$lastname = $_SESSION['lname'];

$fullname = $firstname + ' ' + $lastname;
$trantype = "Bought sapphire premium";
$t_in = 1.50;
$balance=$_POST['balance'];
 
$stmt = $DBcon->prepare("insert into ledger(name, trantype, t_in, t_out, balance) values(:fullname,:trantype, :t_in, :t_out, :balance)");
 
$stmt->bindparam(':fullname', $fullname);
$stmt->bindparam(':trantype', $trantype);
$stmt->bindparam(':t_in', $t_in);
$stmt->bindparam(':t_out', $t_out);
$stmt->bindparam(':balance', $balance);
 
 ?>