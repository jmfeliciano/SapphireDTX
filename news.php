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
    <title>Sapphire | News</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/news-css/fontastic.css">
    <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/news-vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
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
        <!-- Page Header-->
        <!-- Breadcrumb-->
     <!-- Hero Section-->
    <section style="background: url(img/news/bcoinnews.png); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <!--<h1> - <br>Keeping you up to date with the latest news and updates.</h1><a href="#" class="hero-link">Discover More</a>-->
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8"><br><br>
            <h2 class="h3">Bcoin.sg | World’s First Fiat-Crypto Exchange With An Integrated Digital Payment Solution</h2>
            <p class="text-big">More than an exchange — our vision for BCoin.sg is to empower the masses with the ability to trade, store and spend all of their favourite cryptocurrencies easily and securely. The team behind BCoin.sg combines more than 30 years of experience in investment banking, fin-tech and exchange infrastructure development. Singapore-based CEO Davy Goh leads it.</p><br><br>
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="https://edition.cnn.com/travel/article/antonov-an-225-kiev-ukraine/index.html">Biggest unfinished airplane</a></div>
                    <h2 class="h4">Antonov An-225: World's biggest unfinished airplane lies hidden in warehouse</h2></a>
                </header>
                <p>Inside can be found the unfinished chapter of one of the greatest feats of Soviet aviation ever conceived. The only clue is the building's size. It's gargantuan.</p>
                <!--<footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/news/avatar-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>-->
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="img/news/blockchain.png" alt="..."></div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="img/news/bcointop1.png" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                <div class="category"><a href="https://edition.cnn.com/2018/09/24/health/paralyzed-woman-walks-again/index.html">HEALTH is important</a></div>
                    <h2 class="h4">'Amazing' treatment helps paralyzed people walk again</h2></a>
                </header>
                <p>Homosassa, Florida (CNN) - Kelly Thomas inches across the soft grass, using a walker to navigate her way. Each step is exhilarating and exhausting. She pauses amid the 90-degree Florida heat and smiles.</p>
                <!--<footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/news/avatar-2.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>-->
              </div>
            </div>
          </div>
        </div>
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                <div class="category"><a href="https://money.cnn.com/2018/10/02/technology/microsoft-surface-computers/index.html">Technology Hits</a></div>
                    <h2 class="h4">Microsoft unveils new Surface devices, smart headphones</h2></a>
                </header>
                <p>Fall is the season for new gadgets. Apple (AAPL) recently announced its latest iPhones, Amazon (AMZN) showed off new smart speakers and even an Alexa-activated microwave, and Google is hosting its own product launch event next week.</p>
                <!--<footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/news/avatar-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>-->
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="img/news/CEOmediacon.png" alt="..."></div>
        </div>
      </div>
    </section>
    <!-- Divider Section-->
    <!--<section style="background: url(img/news/bcoindivider.jpg); background-size: cover; background-position: center bottom" class="divider">-->
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <!--<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>-->
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header><br><br>
          <h2 style="color:black">Latest News</h2>
          <!--<p class="text-big" style="color:black">Leading Digital Asset Exchange for the Tokenized Economy</p>-->
        </header>
        <div class="row">
          <div class="post col-md-4">
            <div class="post-thumbnail"><img src="img/news/bcoinxaston.png" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">2018-10-04 09:57</div>
                <div class="category"><a href="https://news.abs-cbn.com/entertainment/08/28/18/first-ever-abs-cbn-ball-set-on-september-29">View More</a></div>
              </div>
                <h3 class="h4">First-ever ABS-CBN Ball set on September 29</h3></a>
              <p class="text-muted">The ABS-CBN Ball 2018 will help in the re-launching of Bantay Bata 163’s Children’s Village, which will serve as a home to abused, exploited, and neglected children.</p>
            </div>
          </div>
          <div class="post col-md-4">
            <div class="post-thumbnail"><img src="img/news/bcoinA.png" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">2018-10-04 09:04</div>
                <div class="category"><a href="https://edition.cnn.com/2018/08/25/photos/gallery/pope-francis-ireland/index.html">View More</a></div>
              </div>
                <h3 class="h4">In pictures: Pope Francis visits Ireland</h3></a>
              <p class="text-muted">Pope Francis arrived Saturday in Ireland on the first papal visit to the majority Roman Catholic nation in almost 40 years amid one of the worst sexual abuse scandals the church has yet faced.</p>
            </div>
          </div>
          <div class="post col-md-4">
            <div class="post-thumbnail"><img src="img/news/Abcoin.png" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">2018-10-04 10:07</div>
                <div class="category"><a href="https://edition.cnn.com/2018/10/01/golf/ryder-cup-francesco-molinari-europe-fleetwood-spt-intl/index.html">View More</a></div>
              </div>
                <h3 class="h4">Ryder Cup: Francesco Molinari hails 'perfect week' with Team Europe</h3></a>
              <p class="text-muted">Francesco Molinari's "special year" continued with a magical performance at the Ryder Cup. The Italian rubber stamped Europe's victory at Le Golf National by defeating Phil Mickelson 4&2 on Sunday and also fired himself into the record books.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Newsletter Section-->
    <!--<section class="newsletter no-padding-top">    
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Subscribe to Newsletter</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="#">
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address">
                  <button type="submit" class="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <!-- Gallery Section-->
    <!--<section class="gallery no-padding">    
      <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/news/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="img/news/gallery-1.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/news/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="img/news/gallery-2.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/news/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="img/news/gallery-3.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/news/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="img/news/gallery-4.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>-->
      </div>
    </section>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/news-vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/news-js/front.js"></script>
    <script src="js/front.js"></script>
    <script src="js/custom.js"></script>
    <script>
      $(window).on('load', function() {
  $(".preloader").fadeOut();
  });
</script>
  </body>
</html>
<?php } ?>