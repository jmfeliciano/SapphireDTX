<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
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
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6 mx-auto">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <img src="images/pallogo.png" width="100%">
                  </div>
                  <form method="post" action="index.php">
                    <strong>
                    <?php include('errors.php'); ?></strong>
                    <div class="form-group">
                      <input id="login-email" type="text" name="loginEmail" placeholder="E-mail" required data-msg="Please enter your email" class="input-material">
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="loginPassword" placeholder="Password" required data-msg="Please enter your password" class="input-material">
                    </div><input id="login" name="login_user" type="submit" value="Login" class="btn btn-primary float-right">
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><br><br>
                  <div class="">
                  <a href="#" class="forgot-pass" style="color: red">Forgot Password?</a><br><small style="color:blue">Do not have an account? </small><a href="register.php" class="signup" style="color: red">Signup</a>
                  </div>
                   <img class="pull-right" src="images/logo.png" width="50%">
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
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
    <script src="js/custom.js"></script>
  </body>
</html>