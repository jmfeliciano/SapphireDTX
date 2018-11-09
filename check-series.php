<?php
session_start();
include('includes/db.php');
include('includes/config.php'); 
$episodeid=$_POST['episodeid'];
$userID=$_SESSION['id'];
 
$stmt = $DBcon->prepare("SELECT * FROM epiownership WHERE user_id = :userID AND episode_id = :episodeid");
 
$stmt->bindparam(':episodeid', $episodeid);
$stmt->bindparam(':userID', $userID);
if($stmt->execute())
{
  $results = mysqli_query($con,"SELECT * FROM epiownership WHERE user_id = $userID AND episode_id = $episodeid");
  $numResults = mysqli_num_rows($results);
  if($numResults == 1) {
  $res=1;
  echo json_encode($res);

  } else {
    $res=0;
    echo json_encode($res);
  }

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}

 
?>