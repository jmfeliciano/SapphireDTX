<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
$hi = $_GET['id'];
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
    <title>Sapphire | Games</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <!-- MY INCLUDES-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/spinners.css"/>

    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/music-css/style.default.css">
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
      <?php include 'includes/sidebar.php'; ?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php"><?php echo $sidenav['home']?></a></li>
            <li class="breadcrumb-item active"><?php echo $sidenav['games']?></li>
          </ul>
        </div>
<div class="container-fluid"> 
        <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM games");
                        $count = mysqli_num_rows($data);
                        if ($count != 0) {
                            echo '
                            <div class="row text-center text-lg-left">';
                        while($row = mysqli_fetch_array($data)) { 
                        echo '
                            <div class="col-4 col-md-3" style="padding: 0;">
                            <figure class="snip1205 black">
                            <img src="../inflightapp/storage/app/public/games_cover_images/'. $row['cover_image'] .'" alt="">
                            <i class="fa fa-gamepad"></i>
                            <a href="../inflightapp/storage/app/public/games_apks/'. $row['game_apk'] .'" download class="d-block mb-4 h-100">
                            </a>
                          </figure>
        </div>'; 
                                $dataid = $row['id'];
                }
              }
            ?>
                           </div>

              <h6 class="my-content"><?php echo $games['embedded_games']?></h6>
        <br>
                <div class="row text-center text-lg-left">
                 <div class="col-4 col-md-3" style="padding: 0;">
                 <figure class="snip1205 black">
                 <img src="images/resources/tictactoe.jpg">
                 <i class="fa fa-gamepad"></i>
                 <a href="tictactoe.php" class="d-block mb-4 h-100">
                 </a>
                </figure>
                </div>
                <div class="col-4 col-md-3" style="padding: 0;">
                 <figure class="snip1205 black">
                 <img src="images/resources/Mgame.jpg">
                 <i class="fa fa-gamepad"></i>
                 <a href="puzzle.php" class="d-block mb-4 h-100">
                 </a>
                </figure>
                </div>
                <div class="col-4 col-md-3" style="padding: 0;">
                 <figure class="snip1205 black">
                 <img src="images/resources/visual.jpg">
                 <i class="fa fa-gamepad"></i>
                 <a href="jello.php" class="d-block mb-4 h-100">
                 </a>
                </figure>
                </div>
                <div class="col-4 col-md-3" style="padding: 0;">
                 <figure class="snip1205 black">
                 <img src="images/resources/connect.jpg">
                 <i class="fa fa-gamepad"></i>
                 <a href="connect.php" class="d-block mb-4 h-100">
                 </a>
                </figure>
                </div>
      </div>

    </div>
  
      <!-- /.row -->

  </div>
<br>
     
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
      $(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );
  </script>
  </body>
</html>

<?php } ?>