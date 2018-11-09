<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
require('includes/mp3file.class.php');
$hi = $_GET['id'];
$mid = $_GET['mid'];

if(isset($_GET['mid']) && $_GET['action']=="favorites" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into favorites(userId,musicId) values('".$_SESSION['id']."','$mid')");
echo "<script>alert('Music added in Favorites');</script>";
header('location:music.php');

}
}

// Code forProduct deletion from  wishlist	
$mpid=intval($_GET['del']);
if(isset($_GET['del']) && $_GET['action']=="del" ){
$query=mysqli_query($con,"delete from favorites where id='$mpid'");
}
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
    <title>Sapphire | Philippine Airlines +</title>
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
    <link rel="stylesheet" href="css/music.css">
    <link rel="stylesheet" href="css/philippineairlinesplus.css">

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
            <li class="breadcrumb-item active"><?php echo $sidenav['airline_plus']?></li>
          </ul>
        </div>
<!--ALBUMS/TABS-->
  <ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">PROMOTIONS</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">ABOUT US</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">DESTINATIONS</a>
	</li>
    <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">INFLIGHT MAGAZINES</a>
	</li>
    <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">PAX SAFETY</a>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active" id="tabs-1" role="tabpanel"><br>
<div class="container-fluid">
<div class="row">
<div class="col-6 col-md-6">
<img id="myImg" src="images/promo/pal/promo.jpg" width="100%" 	onclick="onClick(this)">
</div>
<div class="col-6 col-md-6">
<img id="myImg" src="images/promo/pal/promo1.jpg" width="100%" 	onclick="onClick(this)">
</div>
</div><br>
<div class="row">
<div class="col-6 col-md-6">
<img id="myImg" src="images/promo/pal/promo2.jpg" width="100%" 	onclick="onClick(this)">
</div>
<div class="col-6 col-md-6">
<img id="myImg" src="images/promo/pal/promo3.jpg" width="100%" 	onclick="onClick(this)">
</div>
</div><br>
<div class="row">
<div class="col-6 col-md-6">
<img id="myImg" src="images/promo/pal/promo4.jpg" width="100%" 	onclick="onClick(this)">
</div>  
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>
</div>
</div>
<!--Tab panes-->
<div class="tab-pane" id="tabs-2" role="tabpanel"><br>
<div class="container-fluid">
<div class="wrapper">
  <ul class="tabs clearfix alltab" data-tabgroup="first-tab-group">
    <li><a href="#tab1" class="active">About</a></li>
    <li><a href="#tab2">Mission </a></li>
    <li><a href="#tab3">Vision</a></li>
    <li><a href="#tab4">Fleet</a></li>
    <li><a href="#tab5">Awards</a></li>
  </ul>
  <section id="first-tab-group" class="tabgroup">
    <div id="tab1">
      <h2>About Philippine Airlines</h2><br>
      <div class="row">
      <div class="col-md-6">
      <h6 class="font-italic">Corporate Social Responsibility</h6>
      <img src="images/pal/pal.jpg" width="100%">
      </div>
      <div class="col-md-6">
      <p class="text-justify"><strong>Philippine Airlines</strong> also known as PAL, is the flag carrier and national airline of the Philippines.<br><br>
      PAL Holdings: part of a group of companies owned by business tycoon <strong>Lucio C. Tan</strong>. <br><br> <strong>March 1941</strong> - Philippine Airlines (PAL) began to soar in the Philippine sky with one noble mission: to serve as a factor in building a better nation.<br><br> 
      <p>
      </div>
      </div>
    </div>
    <div id="tab2">
      <h2>Our Mission</h2><br>
      <div class="row">
      <div class="col-md-6">
      <h6 class="font-italic">Corporate Social Responsibility</h6>
      <img src="images/pal/palmission.png" width="100%">
      </div>
      <div class="col-md-6">
      <p class="text-justify">To meet the needs of the public for moving people, goods, and information, and in particular for safe and reliable travel, transport, communications, distribution, and related services (president’s flights, transportation and cargo services);<br><br>

      To offer such services of reasonable competitive prices and at the highest level of quality consistent with such prices;<br><br>

      To provide satisfying career to its employees;<br><br>

      To provide adequate return to its stockholders; and<br><br>

      To represent the best of the Philippines and the Filipino people to the world.
      <p>
      </div>
      </div>
    </div>
    <div id="tab3">
      <h2>Our Vision</h2><br>
      <div class="row">
      <div class="col-md-6">
      <h6 class="font-italic">Corporate Social Responsibility</h6>
      <p class="text-justify">To be the most preferred airline in Asia<p>
      <img src="images/pal/palvision.jpg" width="100%">
      </div>
      <div class="col-md-6">
     
      </div>
      </div>
    </div>
    <div id="tab4">
      <h2>Our Fleet</h2><br>
      <div class="row">
      <div class="col-md-6">
      <h6 class="font-italic">67 Aircraft Registered</h6>
       <p class="text-justify">The Philippine Airlines fleet is composed of wide-body and narrow-body aircraft from five families (excluding PAL Express fleet): Airbus A320, Airbus A321neo, Airbus A330, their flagship Airbus A350, and Boeing 777. As of October 13, 2018, there were 67 aircraft registered in the PAL fleet.
      <p>
      <img src="images/pal/a320.jpg" width="100%"><hr>
      <img src="images/pal/a321.jpg" width="100%">
      </div>
      <div class="col-md-6">
      <img src="images/pal/a330.jpg" width="100%"><hr>
      <img src="images/pal/boeing777.png" width="100%">
      </div>
      </div>
    </div>
    <div id="tab5">
      <h2>Our Awards</h2><br>
      <div class="row">
      <div class="col-md-6">
      <h6 class="font-italic">Skytrax awards a 4-Star rating to Philippine Airlines</h6><br>
      <img src="images/pal/planeaward.png" width="100%"><br><hr>
      <img src="images/pal/award.jpg" width="100%"><br>
      <p class="text-justify">Philippine Airlines (PAL) has been certified as a 4-Star airline by Skytrax, the international air transport rating organisation. PAL, joining 40 well- renowned airlines in this prestigious category, is the first and only airline in the country to have a 4-Star Rating.</p><hr>
      <h6 class="font-italic">PAL wins another 4-Star international award</h6><br>
      <img src="images/pal/award1.jpg" width="100%"><br>
      </div>
      <div class="col-md-6">
       <p class="text-justify">Philippine Airlines has won another international award, garnering a FOUR STAR Major Regional Airline 2019 rating certified by APEX – the New York-based Airline Passenger Experience Association, a world-renowned global, non-profit airline customer association. The new 4-Star honors, awarded in a special ceremony in Boston, USA on September 24, is the latest in a string of international victories notched by the Filipino flag carrier.</p><hr>
      <h6 class="font-italic"> PAL receives award "Fourth Best Airline Worldwide for Cabin Service</h6><br>
      <img src="images/pal/award2.jpg" width="100%"><hr>
      <img src="images/pal/award3.jpg" width="100%">
      <p class="text-justify">
       Philippine Airlines has been adjudged "Fourth Best Airline Worldwide forCabin Service" by SmartTravelAsia.Com readers. Smart Travel Asia - an independent online travel magazine over the last 15 years with airline surveys and reviews - conducted the poll from May to June 2017 with an estimated 30,000 respondents. The survey covered the carrier's international and domestic cabin service.</p><hr>
      </div>
      </div>
    </div>
  </section>
</div>
</div>
</div>

<!--Tab panes-->
<div class="tab-pane" id="tabs-3" role="tabpanel"><br>
<div class="container-fluid">
<div class="vid-main-wrapper clearfix" style="overflow-x:auto;">

  	  <!-- PLAYER -->
      <div class="vid-container">
        <video oncontextmenu="return false;" id="vid_frame" frameborder="0" width="560" height="315" style="background-color: black" controls controlsList="nodownload">
          <source src="images/promvid/pal/Philippines.mp4" type="video/mp4">
        </video>
      </div>

      <!-- THE PLAYLIST -->
      <div class="vid-list-container">
            <ol id="vid-list">
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/Philippines.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/philippines.jpg"/></span>
                  <div class="desc">Philippines</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/Hongkong.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/hongkong.jpg" /></span>
                  <div class="desc">Hongkong</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/KualaLumpur.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/kuala.jpg" /></span>
                  <div class="desc">Kuala Lumpur</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/bangkok.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/bangkok.jpg" /></span>
                  <div class="desc">Bangkok</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/shanghai.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/shanghai.jpg" /></span>
                  <div class="desc">Shanghai</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/Singapore.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/singapore.jpg" /></span>
                  <div class="desc">Singapore</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/japan.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/japan.jpg" /></span>
                  <div class="desc">Japan</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/taiwan.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/taiwan.jpg" /></span>
                  <div class="desc">Taiwan</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/Macau.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/macau.jpg" /></span>
                  <div class="desc">Macau</div>
                </a>
              </li>
              <li>
                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='images/promvid/pal/SouthKorea.mp4'">
                  <span class="vid-thumb"><img width=72 src="images/promvid/southkorea.jpg" /></span>
                  <div class="desc">South Korea</div>
                </a>
              </li>
            </ul>
       </div>
</div>
</div>
</div>

<!--Tab panes-->
<div class="tab-pane" id="tabs-4" role="tabpanel"><br>
<div class="container-fluid">
<div class="row">
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookJan" target="_blank"> 
<img src="images/mabuhay/jan.jpg" width="100%">
January 2018
<div class="modal fade" id="basicbookJan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      <li data-target="#carousel-example-1z" data-slide-to="3"></li>
      <li data-target="#carousel-example-1z" data-slide-to="4"></li>
      <li data-target="#carousel-example-1z" data-slide-to="5"></li>
      <li data-target="#carousel-example-1z" data-slide-to="6"></li>
      <li data-target="#carousel-example-1z" data-slide-to="7"></li>
      <li data-target="#carousel-example-1z" data-slide-to="8"></li>
      <li data-target="#carousel-example-1z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jan2018/Jan2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookFeb" target="_blank">
<img src="images/mabuhay/feb.jpg" width="100%">
February 2018
<div class="modal fade" id="basicbookFeb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-2z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-2z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2z" data-slide-to="1"></li>
      <li data-target="#carousel-example-2z" data-slide-to="2"></li>
      <li data-target="#carousel-example-2z" data-slide-to="3"></li>
      <li data-target="#carousel-example-2z" data-slide-to="4"></li>
      <li data-target="#carousel-example-2z" data-slide-to="5"></li>
      <li data-target="#carousel-example-2z" data-slide-to="6"></li>
      <li data-target="#carousel-example-2z" data-slide-to="7"></li>
      <li data-target="#carousel-example-2z" data-slide-to="8"></li>
      <li data-target="#carousel-example-2z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Feb2018/Feb2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-2z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookMar" target="_blank">
<img src="images/mabuhay/mar.jpg" width="100%">
March 2018
<div class="modal fade" id="basicbookMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-3z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-3z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-3z" data-slide-to="1"></li>
      <li data-target="#carousel-example-3z" data-slide-to="2"></li>
      <li data-target="#carousel-example-3z" data-slide-to="3"></li>
      <li data-target="#carousel-example-3z" data-slide-to="4"></li>
      <li data-target="#carousel-example-3z" data-slide-to="5"></li>
      <li data-target="#carousel-example-3z" data-slide-to="6"></li>
      <li data-target="#carousel-example-3z" data-slide-to="7"></li>
      <li data-target="#carousel-example-3z" data-slide-to="8"></li>
      <li data-target="#carousel-example-3z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-3z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-3z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookApr" target="_blank">
<img src="images/mabuhay/apr.jpg" width="100%">
April 2018
<div class="modal fade" id="basicbookApr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-4z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-4z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-4z" data-slide-to="1"></li>
      <li data-target="#carousel-example-4z" data-slide-to="2"></li>
      <li data-target="#carousel-example-4z" data-slide-to="3"></li>
      <li data-target="#carousel-example-4z" data-slide-to="4"></li>
      <li data-target="#carousel-example-4z" data-slide-to="5"></li>
      <li data-target="#carousel-example-4z" data-slide-to="6"></li>
      <li data-target="#carousel-example-4z" data-slide-to="7"></li>
      <li data-target="#carousel-example-4z" data-slide-to="8"></li>
      <li data-target="#carousel-example-4z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Apr2018/Apr2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Mar2018/Mar2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-4z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-4z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookMay" target="_blank">
<img src="images/mabuhay/may.jpg" width="100%">
May 2018
<div class="modal fade" id="basicbookMay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-5z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-5z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-5z" data-slide-to="1"></li>
      <li data-target="#carousel-example-5z" data-slide-to="2"></li>
      <li data-target="#carousel-example-5z" data-slide-to="3"></li>
      <li data-target="#carousel-example-5z" data-slide-to="4"></li>
      <li data-target="#carousel-example-5z" data-slide-to="5"></li>
      <li data-target="#carousel-example-5z" data-slide-to="6"></li>
      <li data-target="#carousel-example-5z" data-slide-to="7"></li>
      <li data-target="#carousel-example-5z" data-slide-to="8"></li>
      <li data-target="#carousel-example-5z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/May2018/May2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-5z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-5z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookJun" target="_blank">
<img src="images/mabuhay/jun.jpg" width="100%">
June 2018
<div class="modal fade" id="basicbookJun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-6z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-6z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-6z" data-slide-to="1"></li>
      <li data-target="#carousel-example-6z" data-slide-to="2"></li>
      <li data-target="#carousel-example-6z" data-slide-to="3"></li>
      <li data-target="#carousel-example-6z" data-slide-to="4"></li>
      <li data-target="#carousel-example-6z" data-slide-to="5"></li>
      <li data-target="#carousel-example-6z" data-slide-to="6"></li>
      <li data-target="#carousel-example-6z" data-slide-to="7"></li>
      <li data-target="#carousel-example-6z" data-slide-to="8"></li>
      <li data-target="#carousel-example-6z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jun2018/Jun2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-6z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-6z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookJul" target="_blank">
<img src="images/mabuhay/jul.jpg" width="100%">
July 2018
<div class="modal fade" id="basicbookJul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-7z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-7z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-7z" data-slide-to="1"></li>
      <li data-target="#carousel-example-7z" data-slide-to="2"></li>
      <li data-target="#carousel-example-7z" data-slide-to="3"></li>
      <li data-target="#carousel-example-7z" data-slide-to="4"></li>
      <li data-target="#carousel-example-7z" data-slide-to="5"></li>
      <li data-target="#carousel-example-7z" data-slide-to="6"></li>
      <li data-target="#carousel-example-7z" data-slide-to="7"></li>
      <li data-target="#carousel-example-7z" data-slide-to="8"></li>
      <li data-target="#carousel-example-7z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Jul2018/Jul2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-7z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-7z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookAug" target="_blank">
<img src="images/mabuhay/aug.jpg" width="100%">
August 2018
<div class="modal fade" id="basicbookAug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-8z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-8z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-8z" data-slide-to="1"></li>
      <li data-target="#carousel-example-8z" data-slide-to="2"></li>
      <li data-target="#carousel-example-8z" data-slide-to="3"></li>
      <li data-target="#carousel-example-8z" data-slide-to="4"></li>
      <li data-target="#carousel-example-8z" data-slide-to="5"></li>
      <li data-target="#carousel-example-8z" data-slide-to="6"></li>
      <li data-target="#carousel-example-8z" data-slide-to="7"></li>
      <li data-target="#carousel-example-8z" data-slide-to="8"></li>
      <li data-target="#carousel-example-8z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Aug2018/Aug2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-8z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-8z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookSep" target="_blank">
<img src="images/mabuhay/sep.jpg" width="100%">
September 2018
<div class="modal fade" id="basicbookSep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-9z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-9z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-9z" data-slide-to="1"></li>
      <li data-target="#carousel-example-9z" data-slide-to="2"></li>
      <li data-target="#carousel-example-9z" data-slide-to="3"></li>
      <li data-target="#carousel-example-9z" data-slide-to="4"></li>
      <li data-target="#carousel-example-9z" data-slide-to="5"></li>
      <li data-target="#carousel-example-9z" data-slide-to="6"></li>
      <li data-target="#carousel-example-9z" data-slide-to="7"></li>
      <li data-target="#carousel-example-9z" data-slide-to="8"></li>
      <li data-target="#carousel-example-9z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Sep2018/Sep2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-9z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-9z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-4 col-md-3 mb-3">
<a data-toggle="modal" data-target="#basicbookOct" target="_blank">
<img src="images/mabuhay/oct.jpg" width="100%">
October 2018
<div class="modal fade" id="basicbookOct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-10z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-10z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-10z" data-slide-to="1"></li>
      <li data-target="#carousel-example-10z" data-slide-to="2"></li>
      <li data-target="#carousel-example-10z" data-slide-to="3"></li>
      <li data-target="#carousel-example-10z" data-slide-to="4"></li>
      <li data-target="#carousel-example-10z" data-slide-to="5"></li>
      <li data-target="#carousel-example-10z" data-slide-to="6"></li>
      <li data-target="#carousel-example-10z" data-slide-to="7"></li>
      <li data-target="#carousel-example-10z" data-slide-to="8"></li>
      <li data-target="#carousel-example-10z" data-slide-to="9"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_1.jpg" alt="First slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_3.jpg" alt="Third slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_4.jpg" alt="Fourth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_5.jpg" alt="Fifth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_6.jpg" alt="Sixth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_7.jpg" alt="Seventh slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_8.jpg" alt="Eight slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_9.jpg" alt="Ninth slide">
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="images/mabuhay/Oct2018/Oct2018_10.jpg" alt="Tenth slide">
     </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-example-10z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-10z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
</div>
</div>
</div>

<!--Tab panes-->
<div class="tab-pane" id="tabs-5" role="tabpanel"><br>
<div class="container-fluid">
<div class="row">
<div class="col-6 col-md-6">
<a data-toggle="modal" data-target="#basicExample" target="_blank">
<img src="images/pal/safetycard.jpg" width="100%">
<div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div id="carousel-example-11z" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
     <li data-target="#carousel-example-11z" data-slide-to="0" class="active"></li>
     <li data-target="#carousel-example-11z" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
     <div class="carousel-item active">
      <img class="d-block w-100" src="images/pal/safety.jpg" alt="First slide">
     </div>
    
    </div>
    <a class="carousel-control-prev" href="#carousel-example-11z" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-11z" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
 </div>
</div>
</a>
</div>
<div class="col-6 col-md-6">
<img class="watch-video" src="images/pal/safetyvid.jpg" width="100%"> 
  <video oncontextmenu="return false;" class="embed-responsive-item" id="video" allowscriptaccess="always" width="0%" controls controlsList="nodownload">
  <source src="images/pal/safetyvid.mp4" type="video/mp4" width="0%">
  </video>
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
    <script src="js/front.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/turn.min.js"></script>
    <script>
    function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("myModal").style.display = "block";
    }
    function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("myModal").style.display = "block";
    }
    var span = document.getElementsByClassName("close")[0];
      span.onclick = function() { 
        document.getElementById("myModal").style.display = "none";
    }

    </script>
    <script>
    $(document).ready(function () {
    $('.vid-item').each(function(index){
      $(this).on('click', function(){
        var current_index = index+1;
        $('.vid-item .thumb').removeClass('active');
        $('.vid-item:nth-child('+current_index+') .thumb').addClass('active');
        });
      });
    });
    </script>
    <script type="text/javascript">
    (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

    $(function(){    
        $('.view-pdf').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Jan2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'January 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })

    $(function(){    
        $('.view-pdf1').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Feb2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'February 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })

    $(function(){    
        $('.view-pdf2').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Mar2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'March 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })
    
    $(function(){    
        $('.view-pdf3').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Apr2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'April 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })
    $(function(){    
        $('.view-pdf4').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/May2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'May 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })
    $(function(){    
        $('.view-pdf5').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Jun2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'June 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })

    $(function(){    
        $('.view-pdf6').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Jul2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'July 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })

    $(function(){    
        $('.view-pdf7').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Aug2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'August 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })

     $(function(){    
        $('.view-pdf8').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Sep2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'September 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })

      $(function(){    
        $('.view-pdf9').on('click',function(){
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="images/mabuhay/Oct2018.pdf#toolbar=0"></iframe></div>'
            $.createModal({
            title:'October 2018',
            message: iframe,
            closeButton:true,
            scrollable:false
            });
            return false;        
        });    
    })
    </script>
    <script>
   $('.tabgroup > div').hide();
  $('.tabgroup > div:first-of-type').show();
  $('.tabs a').click(function(e){
    e.preventDefault();
      var $this = $(this),
          tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
          others = $this.closest('li').siblings().children('a'),
          target = $this.attr('href');
      others.removeClass('active');
      $this.addClass('active');
      $(tabgroup).children('div').hide();
      $(target).show();
    
  })
    </script>
    <script>
       $('.watch-video').on("click", function(){
        var video = document.getElementById('video');
        if (video.mozRequestFullScreen) {
          video.mozRequestFullScreen();
        }
        else if (video.webkitRequestFullScreen) {
          video.webkitRequestFullScreen();
        }
        document.getElementById('video').play();
      });
    </script>
    <script>
    $('#destinationvid').click(function() {
    $('#destinationvid').get(0).play()
    });

    $('#destinationvid').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
      var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
      var event = state ? 'FullscreenOn' : 'FullscreenOff';

      // Now do something interesting
      document.getElementById('destinationvid').pause();
    });
    </script>
    <script>
    $('#video').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
      var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
      var event = state ? 'FullscreenOn' : 'FullscreenOff';

      // Now do something interesting
      document.getElementById('video').pause();
    });
    </script>
  </body>
</html>


<?php } ?>