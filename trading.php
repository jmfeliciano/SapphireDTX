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
    <title>Sapphire | Trading</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
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
    <link rel="stylesheet" href="css/currency.css">
    <link rel="stylesheet" href="css/share.css">
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
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Trading          </li>
          </ul>
        </div>
<!--TABS-->
<h5 class="pull-right" style="margin-right: 1em;">Powered By <a href="https://www.bcoin.sg/" target="_blank"><img src="images/bcoinlogo.png" width="80px"></a></h5>
  <ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">WALLET</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">TRADING</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">OTHERS</a>
  </li>
</ul>


<!-- wallet panes -->
<div class="tab-content">
  <div class="tab-pane active" id="tabs-1" role="tabpanel"><br>
<div class="container-fluid">
  <h6 class="tading_wallet">My Balance</h6>
    <h6 class="total_wallet">Total SPH = &nbsp;<img src="images/gems.png" width="18px">&nbsp;<?php echo $num['tokens']; ?>&nbsp;</h6>
    <br>
    <h6 class="tading_wallet">CRYPTOCURRENCY</h6>
    </div>

<!--table for wallet trading-->
<div class="container table-responsive">
<div class="row">
<div class="col-12 col-md-8" style="padding:0">
<table class="table table-hover table-active table-sm">
    <thead>
      <tr>
        <th>CURRENCY</th>
        <th>BALANCE</th>
        <th>USD</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>USD</td>
        <td><?php echo $num['ewallet'];?></td>
        <td><?php echo $num['ewallet'];?></td>
      </tr>
      <tr>
        <td>BTC</td>
        <td>0.0000000</td>
        <td>0.0000000</td>
      </tr>
      <tr>
        <td>BCH</td>
        <td>0.0000000</td>
        <td>0.0000000</td>
      </tr>
      <tr>
        <td>ETH</td>
        <td>0.0000000</td>
        <td>0.0000000</td>
      </tr>
      <tr>
        <td>ETC</td>
        <td>0.0000000</td>
        <td>0.0000000</td>
      </tr>
      <tr>
        <td>LTC</td>
        <td>0.0000000</td>
        <td>0.0000000</td>
      </tr>
    </tbody>
  </table>
  </div>
  <div class="col-12 col-md-4 border border-secondary rounded border-side wow fadeInRight">
  <center><br><h5>Top up my E-Wallet</h5></center>
  <div class="col-12">
                  
                  <center><div class="scratch"><strong class="d-block">Enter Scratch card details:</strong><span class="d-block"></span><br></div></center>
                  <br>
                  <div class="block-body">
                  <form>
                    <div class="row">
                      <div class="col-12 col-md-8">
                      <div class="form-group">
                        <label class="form-control-label">code</label>
                        <input type="text" id="card-code" placeholder="EFFHY 1234" class="form-control">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group">       
                        <label class="form-control-label">pin</label>
                        <input type="text" id="card-pin" placeholder="705" class="form-control" maxlength="3">
                      </div>
                      <div class="form-group float-right">       
                        <input type="button" value="Topup" class="btn btn-primary topup-button">
                      </div>
                      </div>
                      </div>
                    </form>
                    </div>
  </div>
</div>

    </div>
    </div>
  </div>
<!--tracks tabs-->
<div class="tab-pane" id="tabs-2" role="tabpanel"><br>
<br>
<div class="container-fluid">
<div class="row">
 <div class="cryptocurrency col-md-9">
   <h5>CRYPTOCURRENCY TRADING</h5>
   <h6 class="currence">Sapphires:&nbsp;<img src="images/gems.png" width="20px"><?php echo $num['tokens']; ?></h6>
   <h6 class="currency">E-Wallet: $<?php echo $num['ewallet'];?></h6> 
  
  <!--INTERFACE-->
  <div id="main_wrapper">
  <div class="container-fluid">
  <div class="row">
  
  <div class="col-12 col-md-5 basewrapper">
    <div id="base_wrapper">
     <h6>You are converting from:</h6>
      <select name="base" class="currencies" id="base">
        <option value="SPH">SPH</option>
        <option value="USD">USD</option>
        <option value="BTC">BTC</option>
        <option value="BCH">BCH</option>
        <option value="ETH">ETH</option>
        <option value="ETC">ETC</option>
        <option value="LTC">LTC</option>
      </select>
      <input id="curr1" type="number" name="curr1" min="0"  placeholder='0' step='.1' oninput="cryptoConverter(this.value)" onchange="cryptoConverter(this.value)">
    </div>
    </div>
    <button id="swap" class="col-12 col-md-2"><i class="fa fa-2x fa-exchange" aria-hidden="true"></i>
</button>
<div class="col-12 col-md-5 targetwrapper">
    <div id="target_wrapper">
    <h6>You will receive:</h6>
      <select name="target" class="currencies" id="target">
        <option value="BTC">BTC</option>
        <option value="BCH">BCH</option>
        <option value="ETH">ETH</option>
        <option value="ETC">ETC</option>
        <option value="LTC">LTC</option>
        <option value="SPH">SPH</option>
        <option value="USD">USD</option>
      </select>
      <input id="curr2" type="number" name="curr2" min="0"  placeholder='0' disabled>
    </div>
    </div>
  </div>
  <img class="cryptoimg" src="images/crypto.png" width="300">
  <input id="history" type="button" value="Buy"> <br><br>
  </div>
  </div>
  </div>
<div class="market col-md-3">
<h5>Market : USD</h5> 

  <table class="table table-sm table-active table-bordered ">
    <tr>
      <th>Pair</th>
      <th>Rate</th>
      <th>Change</th>
    </tr>
    <tr>
      <td>SPH/BTC</td>
      <td style="text-align:right">600.00</td>
      <td>+3.25%</td>  
    </tr>
    <tr>
      <td>BTC/USD</td>
      <td style="text-align:right">7,111.40</td>
      <td>+2.68%</td>    
    </tr>
    <tr>
      <td>BCH/USD</td>
      <td style="text-align:right">567.09</td>
      <td>+3.75%</td>
    </tr>
    <tr>
      <td>ETH/USD</td>
      <td style="text-align:right">294.62</td>
      <td>+3.91%</td>
    </tr>
    <tr>
      <td>ETC/USD</td>
      <td style="text-align:right">13.31</td>
      <td>+4.87%</td>
    </tr>
    <tr>
      <td>LTC/USD</td>
      <td style="text-align:right">63.26</td>
      <td>+4.92%</td>
    </tr>
  </table><br>
  <div id="clock">  
</div>
  </diV>
</div>
</div>
</div>

<!--playlist tabs-->
<div class="tab-pane" id="tabs-3" role="tabpanel"><br>
<div class="container-fluid">
<div class="plane">
  <div class="exit exit--front fuselage">
    
  </div>
  <ol class="cabin fuselage">
    <li class="row row--1">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="1A" />
          <label for="1A">1A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="1B" />
          <label for="1B">1B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="1C" />
          <label for="1C">1C</label>
        </li>
        <li class="seat">
          <input type="checkbox" disabled id="1D" />
          <label for="1D">Occupied</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="1E" />
          <label for="1E">1E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="1F" />
          <label for="1F">1F</label>
        </li>
      </ol>
    </li>
    <li class="row row--2">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="2A" />
          <label for="2A">2A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="2B" />
          <label for="2B">2B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="2C" />
          <label for="2C">2C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="2D" />
          <label for="2D">2D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="2E" />
          <label for="2E">2E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="2F" />
          <label for="2F">2F</label>
        </li>
      </ol>
    </li>
    <li class="row row--3">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="3A" />
          <label for="3A">3A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="3B" />
          <label for="3B">3B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="3C" />
          <label for="3C">3C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="3D" />
          <label for="3D">3D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="3E" />
          <label for="3E">3E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="3F" />
          <label for="3F">3F</label>
        </li>
      </ol>
    </li>
    <li class="row row--4">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="4A" />
          <label for="4A">4A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="4B" />
          <label for="4B">4B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="4C" />
          <label for="4C">4C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="4D" />
          <label for="4D">4D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="4E" />
          <label for="4E">4E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="4F" />
          <label for="4F">4F</label>
        </li>
      </ol>
    </li>
    <li class="row row--5">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="5A" />
          <label for="5A">5A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="5B" />
          <label for="5B">5B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="5C" />
          <label for="5C">5C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="5D" />
          <label for="5D">5D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="5E" />
          <label for="5E">5E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="5F" />
          <label for="5F">5F</label>
        </li>
      </ol>
    </li>
    <li class="row row--6">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="6A" />
          <label for="6A">6A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="6B" />
          <label for="6B">6B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="6C" />
          <label for="6C">6C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="6D" />
          <label for="6D">6D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="6E" />
          <label for="6E">6E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="6F" />
          <label for="6F">6F</label>
        </li>
      </ol>
    </li>
    <li class="row row--7">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="7A" />
          <label for="7A">7A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="7B" />
          <label for="7B">7B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="7C" />
          <label for="7C">7C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="7D" />
          <label for="7D">7D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="7E" />
          <label for="7E">7E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="7F" />
          <label for="7F">7F</label>
        </li>
      </ol>
    </li>
    <li class="row row--8">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="8A" />
          <label for="8A">8A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="8B" />
          <label for="8B">8B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="8C" />
          <label for="8C">8C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="8D" />
          <label for="8D">8D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="8E" />
          <label for="8E">8E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="8F" />
          <label for="8F">8F</label>
        </li>
      </ol>
    </li>
    <li class="row row--9">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="9A" />
          <label for="9A">9A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="9B" />
          <label for="9B">9B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="9C" />
          <label for="9C">9C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="9D" />
          <label for="9D">9D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="9E" />
          <label for="9E">9E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="9F" />
          <label for="9F">9F</label>
        </li>
      </ol>
    </li>
    <li class="row row--10">
      <ol class="seats" type="A">
        <li class="seat">
          <input type="checkbox" id="10A" />
          <label for="10A">10A</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="10B" />
          <label for="10B">10B</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="10C" />
          <label for="10C">10C</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="10D" />
          <label for="10D">10D</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="10E" />
          <label for="10E">10E</label>
        </li>
        <li class="seat">
          <input type="checkbox" id="10F" />
          <label for="10F">10F</label>
        </li>
      </ol>
    </li>
  </ol>
  <div class="exit exit--back fuselage">
    
  </div>
</div>
</div>
</div>

   <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper.js/umd/popper.min.js"> </script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="vendor/jquery/jquery-confirm.js"></script>
      <script src="js/front.js"></script>
      <script src="vendor/slick/slick.min.js"></script>
      <script src="js/custom.js"></script>
    <script src="js/currency.js"></script>
    <script type="text/javascript">
    function cryptoConverter() {
    var curr1 = parseFloat(document.getElementById("curr1").value);
    var base = document.getElementById("base");
    var target = document.getElementById("target");
    var curr2 = document.getElementById("curr2");
    if (base.value === "SPH" && target.value === "SPH")  {
      curr2.value.toFixed(6) = (curr1 * 1);
    } else if (base.value === "SPH" && target.value === "BTC")  {
      curr2.value = (curr1 * 5000);
    } else if (base.value === "SPH" && target.value === "BCH")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "SPH" && target.value === "ETH")  {
      curr2.value = (curr1 * 294.62).toFixed(2);
    } else if (base.value === "SPH" && target.value === "ETC")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "SPH" && target.value === "LTC")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "SPH" && target.value === "USD")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "USD" && target.value === "BTC")  {
      curr2.value = (curr1 / 7111.40).toFixed(6);
    } else if (base.value === "USD" && target.value === "BCH")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "USD" && target.value === "ETH")  {
      curr2.value = (curr1 / 294.62).toFixed(6);
    } else if (base.value === "USD" && target.value === "ETC")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "USD" && target.value === "LTC")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "USD" && target.value === "USD")  {
      curr2.value = (curr1 * 1);
    } else if (base.value === "BTC" && target.value === "BTC")  {
      curr2.value = (curr1 * 1);
    } else if (base.value === "BTC" && target.value === "BCH")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "BTC" && target.value === "ETH")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "BTC" && target.value === "ETC")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "BTC" && target.value === "LTC")  {
      curr2.value = (curr1 * 0).toFixed(6);
    } else if (base.value === "BTC" && target.value === "USD")  {
      curr2.value = (curr1 * 7111.40).toFixed(2);
    } else if (base.value === "BTC" && target.value === "SPH")  {
      curr2.value = (curr1 / 5000).toFixed(6);
    }
    
    }
      $('.topup-button').click(function() {
  var code = $('#card-code').val();
  var pin = $('#card-pin').val();

    $.ajax({
      type: "POST",
      url: "transaction-card.php",
      data: {code:code, pin:pin},
      dataType: "text",
      success: function(data) {
        console.log(data);
        if(data=='1') {
          $.alert({
            title: 'Invalid transaction!',
            content: 'Card has already been used.',
          });
        } else if(data=='2') {
          $.alert({
            title: 'Invalid transaction!',
            content: 'Card has been expired.',
          });
        } else if(data=='3') {
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
      error: function(err) {
        console.log('error'+err);
      }
    });



        });
    </script>
  </body>
</html>
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

<?php } ?>