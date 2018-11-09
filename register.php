<?php include('server.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Register</title>
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
            <!-- Logo & Information Panel-->
            <div class="col-lg-6 mx-auto">
              <div class="info">
                <div class="content">
                  <div class="logo">
                    <h3 style="color:black">Register</h3>
                  </div>
                    <form class="text-left form-validate" method="post" >
                    <strong>
                        <?php include('errors.php'); ?>
                      </strong>
                    <div class="form-group-material">
                      <input id="register-firstname" type="text" name="registerFirstname" required data-msg="Please enter your first name" class="input-material">
                      <label for="register-firstname" class="label-material">Firstname</label>
                    </div>
                    <div class="form-group-material">
                      <input id="register-lastname" type="text" name="registerLastname" required data-msg="Please enter your last name" class="input-material">
                      <label for="register-lastname" class="label-material">Lastname</label>
                    </div>
                    <div class="form-group-material">
                      <input id="register-email" type="email" name="registerEmail" required data-msg="Please enter a valid email address" class="input-material">
                      <label for="register-email" class="label-material">Email Address      </label>
                    </div>
                    <div class="form-group-material">
                      <input id="register-number" type="text" name="registerNumber" required data-msg="Please enter your contact number" maxlength="11" class="input-material">
                      <label for="register-number" class="label-material">Contact Number     </label>
                    </div>
                    <div class="form-group-material">
                      <input id="register-password" type="password" name="registerPassword" required data-msg="Please enter your password" class="input-material">
                      <label for="register-password" class="label-material">Password        </label>
                    </div>
                    <div class="form-group-material">
                      <input id="register-password2" type="password" name="registerPassword2" required data-msg="Please enter your password" class="input-material">
                      <label for="register-password2" class="label-material">Confirm Password        </label>
                    </div>
                    <div class="form-group terms-conditions text-center">
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                      <label for="register-agree">I agree with the terms and policy</label>
                    </div>
                    <div class="form-group text-center">
                      <input id="register" name="reg_user" type="submit" value="Register" class="btn btn-primary">
                    </div>
                  </form><small style="color:black">Already have an account? </small><a href="index.php" class="signup">Login</a>
                </div>
              </div>
            </div>
        </div>
      </div>
     <!-- <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
        Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)
      </div> -->
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>