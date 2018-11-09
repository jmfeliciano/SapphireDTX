<?php
session_start();
include('includes/config.php'); 
if(strlen($_SESSION['login'])==0){   ?>
              <script language="javascript">
                document.location="index.php";
              </script>
<?php } else{ 
     
      $id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);

      $scode=$_POST['scratchcode'];
      $spin=$_POST['scratchpin'];     
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Sapphire | Payment Method</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!-- Bootstrap CSS-->
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome CSS-->
      <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
      <!-- Bootstrap CSS-->
      <link rel="stylesheet" href="vendor/jquery/jquery-confirm.css">
      <!-- Custom Font Icons CSS-->
      <link rel="stylesheet" href="css/font.css">
      <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
      <!-- Google fonts - Muli-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
      <!-- MY INCLUDES-->
      <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
      <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>
      <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="css/custom.css">
      <!-- Favicon-->
      <link rel="shortcut icon" href="img/favicon.ico">
      <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <body>
    <img id="skeri" src="pic.jpg" height="100%" width="100%" class="hide">
      <div class="preloader">
         <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Sapphire</p>
         </div>
      </div>
      <?php include 'includes/header.php'; ?>
      <div class="d-flex align-items-stretch">
         <!-- Sidebar Navigation-->
         <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
               <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
               <div class="title">
                  <h6>Welcome Aboard,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
               </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
               <li class="active"><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
               <li><a href="music.php"> <i class="fa fa-music"></i>Music </a></li>
               <li><a href="movies.php"> <i class="fa fa-play"></i>Movies </a></li>
               <li><a href="series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
               <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
               <li><a href="shop/inflight.php"> <i class="fa fa-cutlery"></i>Inflight Meals</a></li>
               <li><a href="philippineairlinesplus.php"> <i class="fa fa-plane"></i>Philippine Airlines +</a></li>
               <li><a href="games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
               <li><a href="news.php"> <i class="fa fa-file"></i>News</a></li>
            </ul>
            <span class="heading">User</span>
            <ul class="list-unstyled">
               <li> <a href="myfinance.php"> <i class="fa fa-credit-card"></i>My Finance</a></li>
               <li> <a href="shop/my-account.php"> <i class="fa fa-user"></i>My Account</a></li>
            </ul>
         </nav>
         <!-- Sidebar Navigation end-->
  <div class="page-content">
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Scratch Card            </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              
            </div>
            <div class="row">

              <!-- Basic Form-->
              <div class="col-lg-12">
                <div class="block">
                <div class="col-12">
                  </div>
                  <div class="title"><strong class="d-block">Confirm Transaction:</strong><span class="d-block"></span><br>
                    <h4>Code : <?php echo $scode; ?></h4>
                    <h4>Pin : <?php echo $spin; ?></h4>
                    <input value="Topup" class="btn btn-primary topup-button">
                  </div>
                  <br>

                </div>
              </div>
   </div>

      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper.js/umd/popper.min.js"> </script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="vendor/jquery/jquery-confirm.js"></script>
      <script src="js/front.js"></script>
      <script src="js/cleave.min.js"></script>
      <script src="vendor/slick/slick.min.js"></script>
      <script src="js/custom.js"></script>

      <script type="text/javascript">
/*        $(".skeri_button").on("click", function(){
            $("#skeri").removeClass("hide");

            var audio = $("#mysoundclip")[0];
            audio.play();


        }); */
        //ON TOPUP BUTTON
        $('.topup-button').click(function() {

            $.confirm({
                <?php
                $data = mysqli_query($con,"SELECT * FROM scratch_cards WHERE code = '$scode'");
                $numResults = mysqli_num_rows($data);
                $rowcard=mysqli_fetch_assoc($data);
                //variables
                $time = time();
                $current_date = date("Y-m-d",$time);
                $expiration = $rowcard['card_expiration'];
                $status = $rowcard['status'];
            ?>  
                title: 'Use scratch card?',
                    content: 'go gog ogaogas',
                    theme: 'supervan',
                    buttons: {
                    confirm: function () {
                        alert(<?php echo $numResults; ?>);
                        <?php
                        if ($numResults == 1) {
                            if ($status != 'A') { ?>
                              $.alert({
                                title: 'Invalid transaction!',
                                content: 'Card has already been used.',
                              });
                        <?php
                            }
                             if ($current_date >  $expiration) { ?>
                              $.alert({
                                title: 'Invalid transaction!',
                                content: 'Card has expired.',
                              });
                        <?php
                            }  else {
                                $current_ewallet = $num['ewallet'];
                                $amount = $rowcard['amount'];
                                $updated_ewallet = $current_ewallet + $amount;
                                // $delsql = "DELETE * FROM scratch_cards WHERE code = $code and pin = $pin";
                        ?>
                                
                                alert("completo");
                                alert("<?php echo  $expiration; ?>");
                                alert("<?php echo  $current_date; ?>");
                        <?php
                            }
                        } else { ?>
                            $.alert({
                                title: 'Invalid transaction!',
                                content: 'Wrong code',
                            });
                            <?php
                        }
                        ?>



                  },
                  cancel: function () {
                      $.alert('Awwwww. Why :(');
                  }
              }
          });

                });
                <?php } ?>
        </script>

   </body>
</html>