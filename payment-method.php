<?php
session_start();
include('includes/config.php'); 
$movieid = $_GET['id'];
$movietitle = $_GET['title'];
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
                  <h6><?php echo $sidenav['welcome']?>,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']); ?></h1>
               </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading"><?php echo $sidenav['main']?></span>
            <ul class="list-unstyled">
                    <li><a href="home.php"> <i class="fa fa-home"></i><?php echo $sidenav['home']?></a></li>
                    <li><a href="music.php"> <i class="fa fa-music"></i><?php echo $sidenav['music']?></a></li>
                    <li class="active"><a href="movies.php"> <i class="fa fa-play"></i><?php echo $sidenav['movies']?></a></li>
                    <li><a href="series.php"> <i class="fa fa-play-circle"></i><?php echo $sidenav['series']?></a></li>
                    <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i><?php echo $sidenav['shop']?></a></li>
                    <li><a href="shop/inflight.php"> <i class="fa fa-cutlery"></i><?php echo $sidenav['inflight_meals']?></a></li>
                    <li><a href="philippineairlinesplus.php"> <i class="fa fa-plane"></i><?php echo $sidenav['airline_plus']?></a></li>
                    <li><a href="games.php"> <i class="fa fa-gamepad"></i><?php echo $sidenav['games']?></a></li>
                    <li><a href="news.php"> <i class="fa fa-file"></i><?php echo $sidenav['news']?></a></li>
            </ul><span class="heading"><?php echo $sidenav['user']?></span>
            <ul class="list-unstyled">
              <li> <a href="myfinance.php"> <i class="fa fa-credit-card"></i><?php echo $sidenav['my_finance']?></a></li>
              <li> <a href="shop/my-account.php"> <i class="fa fa-user"></i><?php echo $sidenav['my_account']?></a></li>
            </ul>
         </nav>
         <!-- Sidebar Navigation end-->
         <div class="page-content">
            <!-- Page Header-->
          <div class="container  h-100 justify-content-center align-items-center text-center">
             <br><br>
            <h4>How would you like to pay?</h4> <br><br>
            <div class="row justify-content-center align-items-center text-center">
              
              <div class="col-12 col-md-3 payment">
                <h6>Load Wallet </h6>
                <div class="payment-col" id="wallet">
                  <img src="images/wallet.png">
                </div>
                <p>You can top up your wallets with scratch cards!</p>
              </div>
              <div class="col-12 col-md-3 payment">
                <h6>Credit Card </h6>
                <div class="payment-col" id="credit">
                  <img src="images/card.png">
                </div>
                <p>We accept VISA and Mastercard.</p>
              </div>
              <div class="col-12 col-md-3">
                <h6>Sapphire Crystals </h6>
                <div class="payment-col" id="token">
                  <img src="images/crystal.png" width="60px">

                </div>
                <p>Buy with our new Sapphire Crystals!</p>
              </div>
          </div><hr color="white" width="90%">
            <div class="row justify-content-center align-items-center text-center">
                  <div class="block-white col-md-9 credit">
                     <div class="title"><strong class="d-block">Paying VIA credit/debit card:</strong></div>
                                           <div class="row block-blue">
                        <div class="col-4">
                          <img src="images/premium.png" class="pull-left" width=40px>
                          <div class="paragraph">Amount</div>
                        </div>
                        <div class="col-8">
                          <div class="paragraph pull-right"> &nbsp; $ &nbsp;1.50</div>
                        </div>
                      </div>
                     <div class="block-body">
                      <div class="block-gray text-center">

                    We accept these cards <br>
                    <div class="mx auto">
                      <img src="img/pay1.png" width=80px> &nbsp;
                     <img src="img/pay2.png" width=50px> &nbsp;
                     <img src="img/pay3.png" width=40px> &nbsp;

                    </div>
                        <!--<div class="form-group"> <br>  
                           <input type="submit" value="Signin" class="btn btn-primary">
                           </div>-->

                     <!-- DIV START 
                     <form class="text-left form-validate" method="post">-->
                     <!-- <div class="row padding-0">
                      <div class="col-sm-12"><br>
                        <div class="form-group row">
                            <small class="help-block-none">Card Holder Name</small>
                            <input type="text" class="form-control">
                        </div>
                      </div>
                     </div>
                        <div class="row padding-0">
                           <div class="col-sm-6">
                              <small class="help-block-none">Card Number</small>
                              <input type="text" class="form-control" maxlength="16">
                           </div>
                           <div class="col-sm-6">
                              <small class="help-block-none">Expiration date and security code</small>
                              <div class="row">
                              <div class="col-sm-4 padding-0">
                                <select id='month' class="form-control">
                                     <option value='' disabled="true">--</option>
                                     <option value='1'>01</option>
                                     <option value='2'>02</option>
                                     <option value='3'>03</option>
                                     <option value='4'>04</option>
                                     <option value='5'>05</option>
                                     <option value='6'>06</option>
                                     <option value='7'>07</option>
                                     <option value='8'>08</option>
                                     <option value='9'>09</option>
                                     <option value='10'>10</option>
                                     <option value='11'>11</option>
                                     <option value='12'>12</option>
                                     </select> 
                              </div>
                              <div class="col-sm-4 padding-0">
                                <select id='year' class="form-control">
                                     <option value='' disabled="true">--</option>
                                     <option value='18'>2018</option>
                                     <option value='19'>2019</option>
                                     <option value='20'>2020</option>
                                     <option value='21'>2021</option>
                                     <option value='22'>2022</option>
                                     <option value='23'>2023</option>
                                     <option value='24'>2024</option>
                                     <option value='25'>2025</option>
                                     <option value='26'>2026</option>
                                     <option value='27'>2027</option>
                                     <option value='28'>2028</option>
                                     <option value='29'>2029</option>
                                     <option value='30'>2030</option>
                                     <option value='31'>2031</option>
                                     <option value='32'>2032</option>
                                     <option value='33'>2033</option>
                                     <option value='34'>2034</option>
                                     <option value='35'>2035</option>
                                     <option value='36'>2036</option>
                                     <option value='37'>2037</option>
                                     <option value='38'>2038</option>
                                     <option value='39'>2039</option>
                                     <option value='40'>2040</option>
                                     <option value='41'>2041</option>
                                     <option value='42'>2042</option>
                                     <option value='43'>2043</option>
                                     </select> 
                              </div>
                              <div class="col-sm-4 padding-0">
                                <input type="text" class="form-control" maxlength="3">
                              </div>

                            </div><br>
                            
                           </div>

                        </div> -->
                        <button class="btn btn-info pull-right" id="confirm-credit" onclick="window.location.href='creditcard.php';">Confirm</button><br><br>
                      </div>
                  </div>
               </div>
                <div class="block-white col-md-9 wallet">
                    <div class="title"><strong class="d-block">Paying VIA wallet:</strong></div>
                    <div class="block-body  text-center">

                      <div class="row block-gray">
                        <div class="col-4">
                          <img src="images/cash.png" class="pull-left" width=40px>
                          <div class="paragraph">Load Balance</div>
                        </div>
                        <div class="col-8">
                          <div class="paragraph pull-right" data-id="<?php echo $num['ewallet']; ?>" id="ewallet">$ <?php echo $num['ewallet']; ?></div>
                        </div>
                      </div>
                      <div class="row block-blue">
                        <div class="col-4">
                          <img src="images/premium.png" class="pull-left" width=40px>
                          <div class="paragraph">&nbsp; Amount</div><br>
                        </div>
                        <div class="col-8">
                          <div class="paragraph pull-right"> $&nbsp;2.00</div>
                        </div>
                      </div>
                          <button class="btn btn-info pull-right" id="confirm">Purchase Now</button>
                          
                      </div>
                    </div>
                <div class="block-white col-md-9 token">
                    <div class="title"><strong class="d-block">Paying VIA Sapphire Crystals:</strong></div>
                    <div class="block-body  text-center">

                      <div class="row block-gray">
                        <div class="col-4">
                          <img src="images/diamond.png" class="pull-left" width=40px>
                          <div class="paragraph">Sapphire Crystals</div>
                        </div>
                        <div class="col-8">
                          <div class="paragraph pull-right " data-id="<?php echo $num['tokens']; ?>" id="tokens"> <?php echo $num['tokens']; }?></div>
                        </div>
                      </div>
                      <div class="row block-blue">
                        <div class="col-4">
                          <img src="images/premium.png" class="pull-left" width=40px>
                          <div class="paragraph">&nbsp; Amount</div>
                        </div>
                        <div class="col-8">
                          <div class="paragraph pull-right">1.00</div>
                        </div>
                      </div>
                          <button class="btn btn-info pull-right" id="confirm-token">Purchase Now</button>
                          
                      </div>
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
    $("#confirm").click(function() {
      var ewallet = $('#ewallet').attr("data-id");
      var movieid = "<?php echo $movieid; ?>";
      var movietitle = "<?php echo $movietitle; ?>";
      if(ewallet >= 2) {
      var balance = ewallet - 2.00;
          $.confirm({
              title: 'Pay with E-wallet?',
              content: 'Your balance will be <strong> ' + balance + ' </strong> after the transaction.',
              theme: 'supervan',
              buttons: {
                  confirm: function () {
                    $.ajax({
                      type: "POST",
                      url: "transaction-wallet.php",
                      data: {balance:balance, movieid:movieid, movietitle:movietitle},
                      dataType: "text",
                      success: function(data) {
                      window.location.replace("movies-modal.php?id=" + movieid + "&title=" + movietitle);
                      console.log('success');
                      },
                      error: function(err) {
                      console.log('error'+err);
                      
                      }
                    });
                  },
                  cancel: function () {
                      $.alert('You have cancelled your purchase!');
                  }
              }
          });
    } else {
            $.alert('You do not have enough balance.');
    }
    });


      $("#confirm-token").click(function() {
      var tokens = $('#tokens').attr("data-id");
      var movieid = "<?php echo $movieid; ?>";
      var movietitle = "<?php echo $movietitle; ?>";
      if(tokens >= 1) {
      var balance = tokens - 1.00;

      $.confirm({
          title: 'Pay with Sapphire Crystals?',
          content: 'Your balance will be <strong> ' + balance + ' </strong> after the transaction.',
          theme: 'supervan',
          buttons: {
              confirm: function () {
                $.ajax({
                  type: "POST",
                  url: "transaction.php",
                  data: {balance:balance, movieid:movieid, movietitle:movietitle},
                  dataType: "text",
                  success: function(data) {
                  $.confirm({
                      title: '<strong>Success!</strong>',
                      content: 'You have successfully purchased a premium account. Redirecting you to movies page.',
                      theme: 'light',
                      type: 'green',
                      buttons: {
                          confirm: function () {
                              window.location.replace("movies-modal.php?id=" + movieid + "&title=" + movietitle);
                          }
                      }
                  });
                  
                  },
                  error: function(err) {
                  console.log('error'+err);
                  
                  }
                });
              },
              cancel: function () {
                  $.alert('You have cancelled your purchase!');
              }
          }
      });
    } else {
            $.alert('You do not have enough balance.');
    }
    });
      </script>
   </body>
</html>