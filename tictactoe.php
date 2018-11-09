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
    <title>Sapphire | TicTacToe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>

    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/music-css/snip.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/tictac.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!--sapphireDTXcss-->
    <link rel="stylesheet" href="css/music-css/snip.css">
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
            <li class="breadcrumb-item"><a href="games.php"><?php echo $sidenav['games']?></a></li>
            <li class="breadcrumb-item active"><?php echo $games['tic_tac_toe']?></li>
          </ul>
        </div>

                <table id="scoreboard" align="center">
                <tr>
                    <td> Player 1 </td>
                    <td width="50"> &nbsp; </td>
                    <td> Player 2 </td>
                </tr>
                <tr>
                    <td class="score" id="player1">
                    0 
                    </td>
                    <td> &nbsp; </td>
                    <td class="score" id="player2">
                    0 
                    </td>
                </tr>
                </table>


                <div id="placeholder"></div>

<center>
                <button onclick="restart()">
                Reset
                </button>
                <select onchange="restart(this.value)">
                <option value="2">
                    2 X 2
                </option>
                <option value="3" selected="">
                    3 X 3
                </option>
                <option value="4">
                    4 X 4
                </option>
                <option value="5">
                    5 X 5
                </option>
                <option value="6">
                    6 X 6
                </option>
                </select>
</center>
    <!-- /.container-fluid -->
    <!-- JQuery scripts -->
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
    <script src="js/front.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- Bootstrap Core scripts -->
    <script src="js/music-js/bootstrap.min.js"></script>
    <script src="js/music-js/mine.js"></script>
    <script src="js/tictac.js"></script>
  </body>
</html>
<?php } ?>