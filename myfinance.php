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
      <title>Sapphire | My Finance</title>
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
      <!-- Finance stylesheet - for your changes-->
      <link rel="stylesheet" href="css/finance.css">
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
                  <h6><?php echo $sidenav['welcome']?>,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);}?></h1>
               </div>
            </div>
            <!-- Sidebar Navidation Menus-->
   <span class="heading"><?php echo $sidenav['main']?></span>
        <ul class="list-unstyled">
                <li><a href="home.php"> <i class="fa fa-home"></i><?php echo $sidenav['home']?></a></li>
                <li><a href="music.php"> <i class="fa fa-music"></i><?php echo $sidenav['music']?></a></li>
                <li><a href="movies.php"> <i class="fa fa-play"></i><?php echo $sidenav['movies']?></a></li>
                <li><a href="series.php"> <i class="fa fa-play-circle"></i><?php echo $sidenav['series']?></a></li>
                <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i><?php echo $sidenav['shop']?></a></li>
                <li><a href="shop/inflight.php"> <i class="fa fa-cutlery"></i><?php echo $sidenav['inflight_meals']?></a></li>
                <li><a href="philippineairlinesplus.php"> <i class="fa fa-plane"></i><?php echo $sidenav['airline_plus']?></a></li>
                <li><a href="games.php"> <i class="fa fa-gamepad"></i><?php echo $sidenav['games']?></a></li>
                <li><a href="news.php"> <i class="fa fa-file"></i><?php echo $sidenav['news']?></a></li>

        </ul><span class="heading"><?php echo $sidenav['user']?></span>
        <ul class="list-unstyled">
          <li class="active"> <a href="myfinance.php"> <i class="fa fa-credit-card"></i><?php echo $sidenav['my_finance']?></a></li>
          <li> <a href="shop/my-account.php"> <i class="fa fa-user"></i><?php echo $sidenav['my_account']?></a></li>
        </ul>
      </nav>
         <!-- Sidebar Navigation end-->
        
  <div class="page-content">
    <div class="container col-centeredh-100 justify-content-center align-items-center text-center">
      <br><br>
        <h4><?php echo $sidenav['my_finance1']?></h4>
              <div class="megamenu text-left">
              <div id="clockbox" style="padding-left:25px;"></div>
                <div class="row megamenu-buttons">
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=4");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4" style="margin-bottom:20px">
                    <a href="#" class="d-block megamenu-button-link bg-dark">
                      <img src="images/gems.png" width="20px">&nbsp;&nbsp;&nbsp;<span style="font-size:16px; color:#fff">SPH/USD</span>
                      <strong style="font-size:16px; color:#fff">'.$row['value'] .'</strong>
                    </a>
                  </div>';}?>
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=1");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4" style="margin-bottom:20px"><a href="#" class="d-block megamenu-button-link bg-dark">
                  <img src="images/bitcoin.png" width="20px">&nbsp;&nbsp;&nbsp;<span style="font-size:16px; color:#fff">BTC/USD</span>
                      <strong style="font-size:16px; color:#fff">'.$row['value'] .'</strong></a></div>';}?>
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=2");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4" style="margin-bottom:20px"><a href="#" class="d-block megamenu-button-link bg-dark">
                  <img src="images/bitcoincash.png" width="20px">&nbsp;&nbsp;&nbsp;<span style="font-size:16px; color:#fff">BCH/USD</span>
                      <strong style="font-size:16px; color:#fff">'.$row['value'] .'</strong></a></div>';}?>
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=3");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4" style="margin-bottom:20px"><a href="#" class="d-block megamenu-button-link bg-dark">
                  <img src="images/ethereum.png" width="15px">&nbsp;&nbsp;&nbsp;<span style="font-size:16px; color:#fff">ETH/USD</span>
                      <strong style="font-size:16px; color:#fff">'.$row['value'] .'</strong></a></div>';}?>
                </div>
              </div>
               <div class="row">
       <div class="col-md-4">
    <div class="box first">
        <span class="icon-cont">
            <i class="fa fa-plane"></i>
        </span>

        <h3><?php echo $finance['travel_insurance']?></h3>

        <ul class="hidden">
            <li>Select Policy</li>
            <li>Buy Policy</li>
            <li>Terms and Policy</li>
        </ul>
         <a class="btn btn-sm btn-outline-secondary button" href="travelinsurance.php" role="button">
            View Details
            <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
<div class="col-md-4">
    <div class="box second">
        <span class="icon-cont">
            <i class="fa fa-gg"></i>
        </span>

        <h3><?php echo $finance['sapphire_crystals']?></h3>

        <ul class="hidden">
            <li>Available Balance</li>
            <li>Crypto Trading</li>
            <br>
        </ul>
        <a class="btn btn-sm btn-outline-secondary button" href="trading.php" role="button">
            View Details
            <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
<div class="col-md-4">
    <div class="box third">
        <span class="icon-cont">
            <i class="fa fa-credit-card"></i>
        </span>

        <h3><?php echo $finance['my_eload']?></h3>

        <ul class="hidden">
            <li>Top-Up Load</li>
            <li>Available Balance</li>
            <li>E-Load History</li>
        </ul>
        <a class="btn btn-sm btn-outline-secondary button" href="top-up.php" role="button">
            View Details
            <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
</div><br><br>
<div id="clock" style="text-align:left; padding-left:20px"></div><br>
<div class="row infograph">
<div class="col-12 col-md-3">
<div class="btcinfo text-left">
<img src="images/btc.png" width="170px"><br>
<strong>BTC</strong><hr color="white">
<strong style="color:grey">Introduction</strong><br>
<div class="btcparagraph">Bitcoin is a consensus network that enables a new payment system and a completely digital money. It is the first decentralized peer-to-peer payment network that is powered by its users with no central authority or middlemen. From a user perspective, Bitcoin is pretty much like cash for the Internet. Bitcoin can also be seen as the most prominent triple entry bookkeeping system in existence.</div>
</div>
</div>
<div class="col-12 col-md-9 charts">
<!-- TradingView Widget BEGIN -->
<script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
<script type="text/javascript">
new TradingView.widget({
  "autosize": true,
  "symbol": "COINBASE:BTCUSD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "Dark",
  "style": "1",
  "locale": "en",
  "padding": '1',
  "toolbar_bg": "rgba(0, 0, 0, 1)",
  "hide_top_toolbar": true,
  "save_image": false,
  "hideideas": true
});
</script>
<!-- TradingView Widget END -->
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
      <script type="text/javascript">
        var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

        function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

        if(nhour==0){ap=" AM";nhour=12;}
        else if(nhour<12){ap=" AM";}
        else if(nhour==12){ap=" PM";}
        else if(nhour>12){ap=" PM";nhour-=12;}

        if(nmin<=9) nmin="0"+nmin;
        if(nsec<=9) nsec="0"+nsec;

        var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        document.getElementById('clockbox').innerHTML=clocktext;
        }

        GetClock();
        setInterval(GetClock,1000);
    </script>
     <script type="text/javascript">
        var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

        function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

        if(nhour==0){ap=" AM";nhour=12;}
        else if(nhour<12){ap=" AM";}
        else if(nhour==12){ap=" PM";}
        else if(nhour>12){ap=" PM";nhour-=12;}

        if(nmin<=9) nmin="0"+nmin;
        if(nsec<=9) nsec="0"+nsec;

        var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        document.getElementById('clock').innerHTML=clocktext;
        }

        GetClock();
    </script>
   </body>
</html>