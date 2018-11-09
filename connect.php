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
    <title>Sapphire | Connect Four</title>
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
    <link rel="stylesheet" href="css/conn.css">
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
            <li class="breadcrumb-item"><a href="games.php"><?php echo $sidenav['games']?></a></li>
            <li class="breadcrumb-item active"><?php echo $games['connect_four']?></li>
          </ul>
        </div>

<div class="two-row">
  <h1 class="title-main"><?php echo $games['connect_four']?></h1>
  <div>
    <div id="grid"></div>
  </div>
  <div>
    <center>
    <p class="controls">
      <i onclick="control.left(0)" class="fa fa-angle-left"></i>
      <i onclick="control.down(0)" class="fa fa-angle-down"></i>
      <i onclick="control.right(0)" class="fa fa-angle-right"></i>
    </p>
  </div>
</div>

<div class="alert-box">
  <h1 class="title-box">Connect Four</h1>
  <h2>(Discontinued)</h2>
  <h2>Options</h2>
  <h3>Play against</h3>
  <input type="radio" name="mode" id="2p" checked/>
  <label for="2p">A friend (2 players)</label>
  <br />
  <input type="radio" name="mode" id="ai" />
  <label for="ai">The computer (1 player) [nope]</label>
  <h3>First move</h3>
  <input type="radio" name="first_move" id="red" onclick="default_color = 1; last_loser = 1;" checked/>
  <label for="red">Red</label>
  <br />
  <input type="radio" name="first_move" id="blue" onclick="default_color = 2; last_loser = 2;"/>
  <label for="blue">Blue</label>
  <br />
  <input type="checkbox" id="loser" onclick="loser_privilege = !loser_privilege;" checked/>
  <label for="loser">Loser of the previous game</label>
  <h3>Keyboard type</h3>
  <input type="radio" name="keyboard" id="querty" onclick="key_code.red.left = 65" checked/>
  <label for="querty">QUERTY</label>
  <br />
  <input type="radio" name="keyboard" id="azerty" onclick="key_code.red.left = 81"/>
  <label for="azerty">AZERTY</label>
  <h3>Sound</h3>
  <input type="checkbox" checked id="sound" />
  <label for="sound">Enable sound? [nope]</label>
  <h2>Controls</h2>
  <h3>Red player</h3>
  <ul>
    <li>A or Q: Move left</li>
    <li>D: Move right</li>
    <li>S: Place a red piece</li>
  </ul>
  <h3>Blue player (2 players only)</h3>
  <ul>
    <li><i class="material-icons" style="font-size: 16px;">chevron_left</i>: Move left</li>
    <li><i class="material-icons" style="font-size: 16px;">chevron_right</i>: Move right</li>
    <li><i class="material-icons" style="font-size: 16px;">expand_more</i>: Place a blue piece</li>
  </ul>
  <p>Touch interactions are available for mobile players</p>
  <h2>How to play</h2>
  <p>The goal of this game is to align four of your pieces horizontally, vertically, or diagonally on a 7 wide and 6 high board.</p>
  <p>You can only place a piece on a certain column. When you place a piece, it will go down as far as possible without being stopped by another piece. You can't place a piece in a full column. Have fun!</p>


  <button onclick="document.getElementsByClassName('alert-box')[0].classList.toggle('alert-active');
                   document.getElementsByClassName('alert-cover')[0].classList.toggle('cover-active');
                   initialize();" class="play-btn">PLAY</button>
</div>

<div class="alert-box end-alert-box">
  <h1 class="title-box">Connect Four</h1>
  <h2 id="win_text">-</h2>
  <h2>Congratulations!</h2>
  <span onmouseover="this.parentNode.style.opacity = '0.1'" onmouseout="this.parentNode.style.opacity = '1'">Hover me to see the field again</span>
  <button onclick="document.getElementsByClassName('alert-box')[1].classList.toggle('alert-active');
                   document.getElementsByClassName('alert-cover')[0].classList.toggle('cover-active');
                   initialize();" class="play-btn">PLAY AGAIN</button>
</div>
</center>
<div class="alert-cover"></div>
    <!-- /.container-fluid -->
    <!-- JQuery scripts -->
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
     <script src="js/conn.js"></script>
  </body>
</html>

<?php } ?>