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
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Sapphire | Credit Card</title>
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
               <div class="avatar"><img src="img/avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
               <div class="title">
                  <h6>Welcome Aboard,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']); ?></h1>
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
            <!-- Page Header-->
          <div class="container  h-100 justify-content-center">
             <br><br>
            <h4>Credit Card Payment</h4> <br><br>
            <div class='card-wrapper'></div><br>
<!-- CSS is included via this JavaScript file -->
<script src="js/card.js"></script>
<form>
    <div class="col-md-6 mx-auto">
        <small class="help-block-none">Card Number</small>
        <input type="text" class="form-control" name="number">
    </div>
    <div class="col-md-6 mx-auto">
        <small class="help-block-none">Card Holder</small>
        <input type="text" class="form-control" name="name"/>
    </div>
    <div class="col-md-6 mx-auto">
        <small class="help-block-none">Expiry</small>
        <input type="text" class="form-control" name="expiry"/>
    </div>
    <div class="col-md-6 mx-auto">
        <small class="help-block-none">CVC</small>
        <input type="text" class="form-control" name="cvc"/>
    </div>
    
</form>
<div class="col-md-6 mx-auto"><br>
        <button class="btn btn-success pull-right" id="credits-submit"><i class="fa fa-check"></i> Pay Now</button>
    </div>
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
      
      <script src="vendor/slick/slick.min.js"></script>
      <script src="js/custom.js"></script>
      <script>

var card = new Card({
    form: 'form',
    container: '.card-wrapper',

    placeholders: {
        number: '**** **** **** ****',
        name: 'Jon Snow',
        expiry: '**/****',
        cvc: '***'
    }
});

$("#credits-submit").click(function() {
    $.confirm({
          title: 'Confirmation',
          content: 'Proceed with payment?',
          theme: 'supervan',
          buttons: {
              confirm: function () {
                $.alert('Payment success!');
                window.location.replace("shop/order-history.php");
              },
              cancel: function () {
                  $.alert('You have cancelled your purchase!');
              }
          }
      });
});
</script>
   </body>
</html>
<?php } ?>