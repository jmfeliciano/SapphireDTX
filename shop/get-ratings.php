<?php
//kinuha ko config.php sa sapphire includes hindi sa shop
session_start();
include('../includes/config.php');

$productId=$_POST['productId'];

$query = "SELECT rate FROM productreviews WHERE productId = $productId";
$stmt = $con->stmt_init();

// $stmt->bindparam(':productId', $productId);
 
if(!$stmt->prepare($query))
{
    print "Failed to prepare statement\n";
}
else
{
    $stmt->execute();
    $result = $stmt->get_result();
    $response = array();
        while ($row = mysqli_fetch_array($result))
            {
                
                    $response[] = $row['rate'];
                
            }
    echo json_encode($response);
}
$stmt->close();
$con->close();
 ?>