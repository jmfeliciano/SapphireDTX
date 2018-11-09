<?php
session_start();
error_reporting(0);
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
    <title>Sapphire | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta http-equiv="refresh" content="600;url=logout.php" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
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
      <!-- Sidebar Navigation-->
      <!-- Sidebar Navigation end-->
      <div class="page-content-home container-fluid">

        <div class="row text-center">
                  <!--<div class="padding-0 col-12 col-md-12" id="box1">
            <img src="images/footer.jpg" width="200px" alt="">

          </div> -->
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1" >
            <img src="images/music.jpg" width="200px" alt="">
            <div id="box2"><a class="clean-link" href="music.php"><i class="fa fa-5x fa-music box-icon"></i><p class="box-label"><?php echo $sidenav['music1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/movies.jpg"  width="200px" alt="">
            <div id="box2"><a class="clean-link" href="movies.php"><i class="fa fa-5x fa-play box-icon"></i><p class="box-label"><?php echo $sidenav['movies1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/series.jpg"  width="200px" alt="">
            <div id="box2"><a class="clean-link" href="series.php"><i class="fa fa-5x fa-play-circle box-icon"></i><p class="box-label"><?php echo $sidenav['series1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/news.jpg" width="200px" alt="">
            <div id="box2"><a class="clean-link" href="news.php"><i class="fa fa-5x fa-file box-icon"></i><p class="box-label"><?php echo $sidenav['news1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/games.jpg" width="200px" alt="">
            <div id="box2"><a class="clean-link" href="games.php"><i class="fa fa-5x fa-gamepad box-icon"></i><p class="box-label"><?php echo $sidenav['games1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/shop.jpg" width="200px" alt="">
            <div id="box2"><a class="clean-link" href="shop/index.php"><i class="fa fa-5x fa-shopping-bag box-icon"></i><p class="box-label"><?php echo $sidenav['shop1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/finances.jpg" width="200px" alt="">
            <div id="box2"><a class="clean-link" href="myfinance.php"><i class="fa fa-5x fa-credit-card box-icon"></i><p class="box-label"><?php echo $sidenav['my_finance1']?></p></a></div>
          </div>
          <div class="padding-0 col-6 col-md-4 col-lg-3" id="box1">
            <img src="images/travell.jpg" width="200px" alt="">
            <div id="box2"><a class="clean-link" href="philippineairlinesplus.php"><i class="fa fa-5x fa-plane"></i><p class="box-label"><?php echo $sidenav['airline_plus1']?></p></a></div>
          </div>
      </div>
      <br>
      <br>
      <br>
      <?php include 'includes/footer.php'; ?>
      </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
<?php } ?>