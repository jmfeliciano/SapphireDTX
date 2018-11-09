<script>
alert("LOadwd");
<?php  
session_start();
include('shop/includes/db.php');

            $code=$_POST['code'];
            $pin=$_POST['pin'];

                    $query = mysqli_query($con,"SELECT * FROM scratch_cards WHERE code = $code and pin = $pin");
                    $results = mysqli_query($con, $query);
                    $rowcard=mysqli_fetch_assoc($results);
                    $numResults = mysqli_num_rows($results);

                    //variables
                    $expiration = $rowcard['card_expiration'];
                    $card_expiration = strtotime($expiration);
                    $status = $rowcard['status'];

                    
                      if($numResults == 1) { 
                        if($status != 'A') { ?>

                        alert('WHADSA');
                          $.alert({
                            title: 'Invalid transaction!',
                            content: 'This card has already been used.',
                          });
<?php
                        } else if($card_expiration < time()) { ?>

                          $.alert({
                            title: 'Invalid transaction!',
                            content: 'This card has been expired.',
                          });

                          <?php
                        } else {
                          $query = mysqli_query($con,"SELECT * FROM shopusers WHERE id = $userid");
                          $results = mysqli_query($con, $query);
                          $rowuser=mysqli_fetch_assoc($results);

                          $current_ewallet = $rowuser['ewallet'];
                          $amount = $rowcard['amount'];

                          $updated_ewallet = $current_ewallet + $amount;

                          if ($con->connect_error) {
                            die("Connection failed: " . $con->connect_error);
                            } 
                            
                            $sql = "UPDATE shopusers SET ewallet=$updated_ewallet WHERE id = $userid";
                            
                            if ($con->query($sql) === TRUE) {
                                echo "Record updated successfully";
                            } else {
                                echo "Error updating record: " . $con->error;
                            }
                            
                            $con->close();
                            
                            $delsql = "DELETE * FROM scratch_cards WHERE code = $code and pin = $pin";
?>

                            $.alert({
                              title: 'Transaction Complete!',
                              content: 'Redirecting you boi.',
                            });

                        <?php
                        }
                    } else { ?>

                      alert('ala');
                      $.alert({
                        title: 'Card details incorrect',
                        content: 'Please double check your input.',
                      });

<?php
                    }
                
                      ?>
                      </script>