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
<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Movies</title>
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
    <link rel="stylesheet" href="css/myfont.css">
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
      <?php include 'includes/sidebar.php'; ?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
              <div class="container-fluid">
        <div class="row">
          <ul class="col-6 col-sm-4 col-md-9 breadcrumb">
            <li class="breadcrumb-item"><a href="home.php"><?php echo $sidenav['home']?></a></li>
            <li class="breadcrumb-item active"><?php echo $sidenav['movies']?></li>
          </ul>
          <div class="col-6 col-sm-4 col-md-3 pull-right">
            <br>
            <div class="form-group">
              <select id="moviesgenre" class="selectpicker form-control" style="border-color:black; color:black">
              <?php 
              echo '
                <option value="" disabled selected>'.$series['select_category'].'</option>
                <option value="3">New Releases</option>
                <option value="2">Top Movies</option>
                <option value="1">Featured Movies</option>
                <option value="5">International Movies</option>'
              ?>
              </select>
            </div>
          </div>
        </div>
        </div>
<div class="container-fluid">
         <?php
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '3'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['new_releases'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>

                                </div>';
                                $dataid = $row['id'];
                        }
                    }
            ?>
      </div><br>
      <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '2'");
                    $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['top_movies'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                </div>';
                                $dataid = $row['id'];
                
                }
            }
            ?>
      </div><br>
      <?php
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '1'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['featured_movies'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>

                                </div>';
                                $dataid = $row['id'];
                        }
                    }
            ?>
      </div><br>
         <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '5'");
                    $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['international_movies'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                </div>';
                                $dataid = $row['id'];
                }
            } }
            ?>
      </div>
      </div>
    </div>  
        <footer class="footer text-center">
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>