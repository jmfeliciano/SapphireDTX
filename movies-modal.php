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
    <title>Sapphire | Movies</title>
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
    <link rel="stylesheet" href="vendor/jquery/jquery-confirm.css">

    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
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
    <?php include 'includes/header.php'; ?>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h6><?php echo $sidenav['welcome']?>,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
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
        <!-- Breadcrumb-->
                     <div class="container-fluid">
        <div class="row">
          <ul class="col-6 col-sm-4 col-md-9 breadcrumb">
            <li class="breadcrumb-item"><a href="home.php"><?php echo $sidenav['home']?></a></li>
            <li class="breadcrumb-item active"><?php echo $sidenav['movies']?></li>
          </ul>
          <div class="col-6 col-sm-4 col-md-3 pull-right">
            <br>
            <div class="form-group">
              <select id="moviesgenre" class="selectpicker form-control" style="border-color:black; color:black">
              <?php 
              echo '
                <option value="" disabled selected>'.$series['select_category'].'</option>
                <option value="3">New Releases</option>
                <option value="2">Top Movies</option>
                <option value="1">Featured Movies</option>
                <option value="5">International Movies</option>'
              ?>
              </select>
            </div>
          </div>
        </div>
        </div>
<div class="container-fluid">
            <?php
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '3'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['new_releases'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>

                                </div>';
                
                        }
                    }
            ?>
         <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div><br>
      <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '2'");
                    $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['top_movies'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                </div>';
                                $dataid = $row['id'];
                
                }
            }
            ?>
         <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div><br>
      <?php
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '1'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['featured_movies'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>

                                </div>';
                
                        }
                    }
            ?>
         <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div><br>
      <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category_id = '5'");
                    $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h6 class="my-content">'.$movies['international_movies'].'</h6>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                </div>';
                                $dataid = $row['id'];
                }
            }
            ?>
            <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div>

    <?php
$data2 = mysqli_query($con,"SELECT * FROM movies WHERE id = $hi ");
while($row2 = mysqli_fetch_array($data2)) {  
echo '
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">

<div class="modal-body">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
<div class="row">
<div class="col-sm-4 col-md-4 text-center">

<br>
<div class="snip1205">
<img  src="../inflightapp/storage/app/public/cover_images/'.$row2['cover_image'].'" class="stretchy">
<a class="clean-link movie-title" data-id="'.$row2['title'] .'" href="#">'.$row2['title'] .'</a>
</div><br>'; ?>

    <button class="btn btn-info btn-sm col-md-6 play-with-ads float-left" id="inherit autoplay">
      <i class="fa fa-play-circle">
      </i>&nbsp;<?php echo $movies['with_ads']?>
    </button>
<?php echo '
    <button class="btn btn-success btn-sm col-md-6 float-right button-movie-id" id="inherit autoplay">
      <i class="fa fa-play-circle">
      </i>&nbsp;'.$movies['without_ads'].'
    </button>
</div>
<div class="col-xs-8 col-sm-8 col-md-8"><br>
  <button class="btn btn-dark btn-sm col-md-4 pull-right" id="inherit autoplay">
      <strong>Price:</strong>&nbsp;<img src="img/dollar.png" width="15px" style="margin-top:-3px">&nbsp; $'.$row2['ewallet_price'] .' <br> <strong>Sapphires:</strong>&nbsp;<img src="images/gems.png" width="15px" style="margin-top:-3px">&nbsp;'.$row2['token_price'] .'
    </button>
<h5><strong>'.$row2['title'] .'</strong></h5> 
<p><span class="btn btn-sm btn-dark">'.$row2['content_rating'] .'</span>&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;'.$row2['running_time'].'mins &nbsp;&nbsp;| <i class="fa fa-clock"></i>&nbsp;&nbsp;&nbsp;'.$row2['release_date'].'</p>
<p>';

$data6 = mysqli_query($con,"select genres.name from movies left join genre_movie on genre_movie.movie_id=movies.id join genres on genres.id=genre_movie.genre_id where movies.id=$hi");
$count = mysqli_num_rows($data6);
$x = 0;
while($row6 = mysqli_fetch_array($data6)) {  
  if($x==$count-1){
    echo ''.$row6['name'] .'';
  } else {
    echo ''.$row6['name'] .' | ';
  }
$x = $x +1;
}
echo '
</p>
<p>'.$row2['movie_description'] .'</p>
<p><strong>Director:</strong> '.$row2['director'] .'</p>
<p><strong>Cast:</strong> '.$row2['cast'] .'<br><br>
<button class="btn btn-sm btn-dark watch-trailer">
<i class="fa fa-play-circle">
</i>&nbsp;'.$movies['watch_trailer'].'
</button>


</p>
</div>
</div>
<br>'; ?>
<video oncontextmenu="return false;" src="../inflightapp/storage/app/public/trailer_videos/<?php echo ''.$row2['trailer_video'].''; ?>" id="trailer" width="1px" controls controlsList="nodownload"> 
</video>
<video oncontextmenu="return false;" src="../inflightapp/storage/app/public/movie_videos/<?php echo ''.$row2['movie_video'].''; ?>" id="noads" width="1px" controls controlsList="nodownload"> 
</video>
<video oncontextmenu="return false;" src="../inflightapp/storage/app/public/movie_videos/<?php echo ''.$row2['movie_video'].''; ?>" <?php } ?> id="player" width="1px" controls  controlbar=”no” controlsList="nodownload"

ads = '{  
    "servers": 
      [
        {
          "apiAddress": "ads.php"
        }
      ],
    "schedule": 
      [
<?php
$data3 = mysqli_query($con,"SELECT * FROM ads");
while($row3 = mysqli_fetch_array($data3)) {  
              echo '
        {
          "position": "'.$row3['roll'] .'",
          "startTime": "'.$row3['time'] .'"
        },'; 
} 
?>
              
      ]
    }'> 
</video>
        
</div>
</div>
</div>
</div>

    </div>
<footer class="footer text-center">

        </footer>
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
    <script src="js/vastvideoplugin.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
        <script type="text/javascript">
      $(window).on('load',function(){
        $('#myModal').modal('show');
      }
                  );
      function goBack(){
        window.location.href = "movies.php";
      }
      
      $('.play-with-ads').on("click", function(){
        var element = document.getElementById('player');
        if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        }
        else if (element.webkitRequestFullScreen) {
          element.webkitRequestFullScreen();
        }
        initAdsFor('player');
        document.getElementById('player').play();
      });
      $('.watch-trailer').on("click", function(){
        var trailer = document.getElementById('trailer');
        if (trailer.mozRequestFullScreen) {
          trailer.mozRequestFullScreen();
        }
        else if (trailer.webkitRequestFullScreen) {
          trailer.webkitRequestFullScreen();
        }
        document.getElementById('trailer').play();
      });
      //ON PLAY BUTTON
        $('.button-movie-id').on("click", function(){
        <?php 
        $userid=$num['id'];
        
        $results = mysqli_query($con,"SELECT * FROM mvownership WHERE user_id = $userid AND movie_id = $hi");
        $numResults = mysqli_num_rows($results);
          if($numResults == 0) { ?>
             var movieid = getUrlParameter('id');
             var movietitle = $('.movie-title').data('id');
             $.confirm({
              title: 'Purchase movie?',
              content: 'You are about to buy ' + movietitle + '.' ,
              theme: 'supervan',
              buttons: {
                  confirm: function () {
                    $.alert('Proceeding to payments page..');
                    window.location.href = "payment-method.php?id=" + movieid + "&title=" + movietitle;
                  },
                  cancel: function () {
                      $.alert('You have cancelled your purchased');
                  }
              }
          });
             
        <?php } else { ?>

        var data = document.getElementById('noads');
        if (data.mozRequestFullScreen) {
          data.mozRequestFullScreen();
        }
        else if (data.webkitRequestFullScreen) {
          data.webkitRequestFullScreen();
        }
        document.getElementById('noads').play();
        <?php } }?>

             
         });
    </script>
    <script>
      var player = document.getElementById('player');
      var supposedCurrentTime = 0;
      player.addEventListener('timeupdate', function() {
        if (!player.seeking) {
          supposedCurrentTime = player.currentTime;
        }
      });
      // prevent user from seeking
      player.addEventListener('seeking', function() {
        // guard agains infinite recursion:
        // user seeks, seeking is fired, currentTime is modified, seeking is fired, current time is modified, ....
        var delta = player.currentTime - supposedCurrentTime;
        if (Math.abs(delta) > 0.01) {
          console.log("Seeking is disabled");
          player.currentTime = supposedCurrentTime;
        }
      });
      // delete the following event handler if rewind is not required
      player.addEventListener('ended', function() {
        // reset state in order to allow for rewind
        supposedCurrentTime = 0;
      });
    </script>
  </body>
</html>