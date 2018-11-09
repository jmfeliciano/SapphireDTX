<?php
    session_start();
    include('shop/includes/db.php');
    include('includes/config.php'); 

    $code=$_POST['code'];
    $pin=$_POST['pin']; 

    $id = $_SESSION['id'];
    $userquery = "SELECT * FROM shopusers WHERE id=$id";
    $userresults = mysqli_query($con, $userquery);
    $user=mysqli_fetch_assoc($userresults);

    $stmt = $DBcon->prepare("SELECT * FROM scratch_cards WHERE code = :code and pin = :pin");
    $stmt->bindparam(':code', $code);
    $stmt->bindparam(':pin', $pin);

    if($stmt->execute()) {

        $results = mysqli_query($con, "SELECT * FROM scratch_cards WHERE code = '$code' and pin = $pin");
        $numResults = mysqli_num_rows($results);
        $rowcard = mysqli_fetch_assoc($results);
        //variables
        $time = time();
        $current_date = date("Y-m-d",$time);
        $expiration = $rowcard['card_expiration'];
        $status = $rowcard['status'];

        
        $current_ewallet = $user['ewallet'];
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        $fullname = $firstname.' '.$lastname;
        $trantype = "Scratch Card Top-up"; 
        $trancode = "TOPUP";
        $t_in = $rowcard['amount'];
        $t_out = 0;

    if ($numResults == 1) {
        if ($status != 'A') { 
            $response = 1;
            echo json_encode($response);
        } else if ($current_date >  $expiration) { 
            $response = 2;
            echo json_encode($response);
        } else {
            $response = 3; 

            $amount = $rowcard['amount'];
            $updated_ewallet = $current_ewallet + $amount;

            $sql = "UPDATE shopusers SET ewallet=$updated_ewallet WHERE id=$id";
            if(mysqli_query($con, $sql)){
                echo json_encode($response);
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
//UPDATE SCRATCH CARD AVAILABILITY
            $stmt1 = $DBcon->prepare("UPDATE scratch_cards SET status = 'U' WHERE code = :code and pin = :pin");
            $stmt1->bindparam(':code', $code);
            $stmt1->bindparam(':pin', $pin);
            if($stmt1->execute()){
            // $res="Data Inserted Successfully:";
            // echo json_encode($res);
            }
            else {
            $error="Not Inserted,Some Probelm occur.";
            echo json_encode($error);
            }
//INSERT TRANSACTION TO LEDGER
            $stmt2 = $DBcon->prepare("insert into ledger(idno, name, trantype, trancode, t_in, t_out, balance) values(:idno, :fullname, :trantype, :trancode, :t_in, :t_out, :balance)");

            $stmt2->bindparam(':idno', $id);
            $stmt2->bindparam(':fullname', $fullname);
            $stmt2->bindparam(':trantype', $trantype);
            $stmt2->bindparam(':trancode', $trancode);
            $stmt2->bindparam(':t_in', $t_in);
            $stmt2->bindparam(':t_out', $t_out);
            $stmt2->bindparam(':balance', $updated_ewallet);

            if($stmt2->execute()){
            // $res="Data Inserted Successfully:";
            // echo json_encode($res);
            }
            else {
            $error="Not Inserted,Some Probelm occur.";
            echo json_encode($error);
            }
        }
    } else {
        $response = 4;
        echo json_encode($response);
    }
    }
    else {
        $error="Not Inserted,Some Probelm occur.";
        echo json_encode($error);
    }



?>