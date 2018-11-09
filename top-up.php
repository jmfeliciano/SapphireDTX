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
  <title>Sapphire | E-Load</title>
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
  <link rel="stylesheet" type="text/css" href="css/spinners.css" />
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- MY INCLUDES-->
  <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css" />
  <link rel="stylesheet" type="text/css" href="css/spinners.css" />
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
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
              <h1 class="h5">
                <?php echo htmlentities($_SESSION['name']);}?>
              </h1>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
        <li><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
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
        <li class="active"> <a href="myfinance.php"> <i class="fa fa-credit-card"></i>My Finance</a></li>
        <li> <a href="shop/my-account.php"> <i class="fa fa-user"></i>My Account</a></li>
      </ul>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="container col-centeredh-100 justify-content-center align-items-center text-center">
        <br><br>
        <h4>Not enough balance? Load now!</h4><br><br>
        <div class="row">
          <div class=" col-12 col-md-6">
            <button class="btn btn-outline-info btn-hover--transform-shadow btn--transition btn-lg mybutton float-lg-right btn-top-up"
              id="scratchcard">
              <img src="images/wallet.png" width="50px"> &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Top up my E-Wallet
            </button>
          </div>
          <div class="col-12 col-md-6">
            <button class="btn btn-outline-info btn-hover--transform-shadow btn--transition btn-lg float-lg-left mybutton btn-top-up"
              id="purchase">
              <img src="images/topup.png" width="50px"> &nbsp;&nbsp;
              Purchase Top-up Card</button>
          </div>
        </div>
        <hr width="90%" color="white">
        <div class="block-transparent scratchcard">
          <div class="col-12">
          </div>
          <div class="title"><strong class="d-block">Enter scratch card details:</strong><span class="d-block"></span></div>
          <br>
          <div class="block-body">

            <form>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="form-control-label">code</label>
                    <input type="text" id="card-code" placeholder="EFFHY 1234" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">pin</label>
                    <input type="text" id="card-pin" placeholder="705" class="form-control" maxlength="3">
                  </div>
                  <div class="form-group float-right">
                    <input value="Topup" class="btn btn-primary topup-button">
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
        <div class="block-transparent purchase">
          <div class="title"><strong class="d-block">Please select a card and a cabin crew will assist you </strong><span
              class="d-block"></span></div><br>
          <div class="row topupcard">
            <div class="col-6 col-md-6">
              <label>
                <input type="radio" name="topupcard" value="100" />
                <img src="images/topupcard.jpg" id="topupcard1">
              </label>
            </div>
            <div class="col-6 col-md-6">
              <label>
                <input type="radio" name="topupcard" value="300" />
                <img src="images/topupcard1.jpg" id="topupcard2">
              </label>
            </div>
            <div class="col-6 col-md-6">
              <label>
                <input type="radio" name="topupcard" value="500" />
                <img src="images/topupcard2.jpg" id="topupcard3">
              </label>
            </div>
            <div class="col-6 col-md-6">
              <label>
                <input type="radio" name="topupcard" value="1000" />
                <img src="images/topupcard3.jpg" id="topupcard4">
              </label>
            </div>
          </div><br>
          <div class="form-group">
            <button type="button" id="topuppurchase" class="btn btn-primary puchase-button">Purchase</button>
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
      //ON TOPUP BUTTON
      $("#topuppurchase").click(function () {
        let value = $("input[name='topupcard']:checked").val();
        if (value) {
          console.log(value)
          $.confirm({
            title: 'Top Up ' + value,
            content: 'A ' + value + ' worth of Top-up Card will be purchased',
            theme: 'supervan',
            buttons: {
                confirm: function () {
                  $.ajax({
                    type: "POST",
                    url: "transaction-topup.php",
                    data: {value:value},
                    dataType: "text",
                    success: function(data) {
                    $.alert('You successfully bought a ' + value + ' worth of top-up card. Please wait while your card is processing');
                    },
                    
                    error: function(err) {
                      $.alert('error'+err);
                    
                    }
                    
                  });
                },
                cancel: function () {
                    $.alert('You have cancelled your purchase!');
                }
            }
          });
        } else {
          $.alert('You haven\'t selected  Top-up Card');
        }
        
      });

      $('.topup-button').click(function () {
        var code = $('#card-code').val();
        var pin = $('#card-pin').val();

        $.ajax({
          type: "POST",
          url: "transaction-card.php",
          data: {
            code: code,
            pin: pin
          },
          dataType: "text",
          success: function (data) {
            console.log(data);
            if (data == '1') {
              $.alert({
                title: 'Invalid transaction!',
                content: 'Card has already been used.',
              });
            } else if (data == '2') {
              $.alert({
                title: 'Invalid transaction!',
                content: 'Card has been expired.',
              });
            } else if (data == '3') {
              $.confirm({
                title: 'Card Accepted!',
                content: 'Procceed with transaction?',
                theme: 'supervan',
                buttons: {
                  confirm: function () {
                    $.alert('You have successfully topped up!');
                    location.reload(true);
                  },
                  cancel: function () {
                    $.alert('Okay. Good things take time!');
                  }
                }
              });
            } else {
              $.alert({
                title: 'Invalid transaction!',
                content: 'There are no card exisiting with those details. Please try again.',
              });
            }
          },
          error: function (err) {
            console.log('error' + err);
          }
        });



      });
    </script>
</body>

</html>