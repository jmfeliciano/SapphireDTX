<?php
session_start();
error_reporting(0);
include('includes/config.php'); 

// $chTaxQuery=mysqli_query($con,"select * from charges where id=1");
// $rowTax=mysqli_fetch_array($chTaxQuery);

$cryptoSPHQuery=mysqli_query($con,"select * from cryptocurrency where id=4");
$rowSPH=mysqli_fetch_array($cryptoSPHQuery);

if(strlen($_SESSION['login'])==0){   ?>
							<script language="javascript">
                document.location="../index.php";
              </script>
<?php } else{ ?>	
<?php include 'includes/connect.php';
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['product_price']);
			header('location:index.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
$id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Sapphire | Shop</title>

	    <!-- Bootstrap Core CSS -->
	    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/blue.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/myfont.css">
		
		<!-- NAVBAR -->
		<link rel="stylesheet" href="distribution/vendor/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome CSS-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
		<link rel="stylesheet" href="distribution/vendor/font-awesome/css/font-awesome.min.css">
		<!-- Custom Font Icons CSS-->
		<link rel="stylesheet" href="distribution/css/font.css">
		<!-- Google fonts - Muli-->
		<link rel="stylesheet" href="assets/css/myfont.css">
		<!-- theme stylesheet-->
		<link rel="stylesheet" href="distribution/css/style.default.css" id="theme-stylesheet">
		<!-- Custom stylesheet - for your changes-->
		<link rel="stylesheet" href="distribution/css/custom.css">

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home"></body>
	
	<?php include('includes/header.php');?>

		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->


     <div class="contmin col-md-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">	
            <img class="d-block w-100" src="assets/images/sliders/1st.jpg" alt="Post Picture">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Featured Products</h1>
                <p class="text-truncate">Surprise your loved ones on their upcoming flight! Buy Now!</p>
                <p><a class="btn btn-xs btn-outline-primary" href="category.php?cid=1" role="button">Featured Items</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/images/sliders/2nd.jpg" alt="Post Picture">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Accessories</h1>
                <p class="text-truncate">Surprise your loved ones on their upcoming flight! Buy Now!</p></p>
                <p><a class="btn btn-xs btn-outline-primary" href="category.php?cid=2" role="button">Accessories</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/images/sliders/3rd.jpg" alt="Post Picture">
            <div class="container">
              <div class="carousel-caption text-left">
               <h1>Travel Kit</h1>
                <p class="text-truncate">Surprise your loved ones on their upcoming flight! Buy Now!</p></p>
                <p><a class="btn btn-xs btn-outline-primary" href="category.php?cid=3" role="button">Travel Kit</a></p>
              </div>
            </div>
					</div>
					<div class="carousel-item">
            <img class="d-block w-100" src="assets/images/sliders/4th.jpg" alt="Post Picture">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Sponsored Items</h1>
                <p class="text-truncate">Surprise your loved ones on their upcoming flight! Buy Now!</p></p>
                <p><a class="btn btn-xs btn-outline-primary" href="sub-category.php?scid=4" role="button">Sponsored Items</a></p>
              </div>
            </div>
          </div>
					<div class="carousel-item">
            <img class="d-block w-100" src="assets/images/sliders/5th.jpg" alt="Post Picture">
            <div class="container">
              <div class="carousel-caption text-left">
               <h1>Inflight Meals</h1>
                <p class="text-truncate">Surprise your loved ones on their upcoming flight! Buy Now!</p></p>
                <p><a class="btn btn-xs btn-outline-primary" href="category.php?cid=5" role="button">Inflight Meals</a></p>
              </div>
            </div>
					</div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

		<!-- ============================================== SCROLL TABS ============================================== -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">Featured Products</h3>
			</div>
<div class="body-content outer-top-xs" id="top-banner-and-menu"><br>
	<div class="container">
		<div class="furniture-container homepage-container">
		
		<div class="row">
			<div class="col-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php include('includes/side-menu.php');?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->
<div class="col-md-9">
				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">	
<?php
$ret=mysqli_query($con,"select * from products where product_category_id in ('1','2','3','4')");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>

		    	
		<div class="col-6 col-sm-6 col-md-4 wow fadeInUp">
			<!-- <div class="products">				
			<div class="product">		
			<div class="product-image">
			<div class="image"> -->

				<div class="card">
				<div class="containerview">
				<img src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>" alt="" class="img-fluid" width="100%" height="100%">
				<div class="overlay"></div>
  			<div class="card-img-top button"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"> VIEW PRODUCT </a></div>
				</div>
			<!-- </div> --><!-- /.image -->			                      		   
		<!-- </div> --><!-- /.product-image -->
			
		<div class="card-body">
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['product_name']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">$<?php echo htmlentities($row['product_price']);?></span>
				<span class="price-before-discount"><strike><small>$<?php echo htmlentities($row['product_price_before_discount']);?></small></strike></span><span class="token_price pull-right"><img src="../images/gems.png" width="18" height="18"> <?php 
					$productPrice = floatval($row['product_price']);
					$SPHValue = str_replace( ',', '', $rowSPH['value'] );
					$tokenPrice = $productPrice / $SPHValue;
					$tokenPriceProduct = number_format($tokenPrice, 2);
					echo htmlentities($tokenPriceProduct);?></span>		
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
			</div>
			</div>
		</div>
	<?php } ?>

			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div>
			</div>
			</div>
			</div>
</div>
			
	
		    
</section>
<!-- <?php include('includes/footer.php');?> -->
         <!-- ============================================== TABS ============================================== -->
</div>
		<!-- ============================================== TABS : END ============================================== -->
</div>
</div>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});


	</script>
	<!-- For demo purposes – can be removed on production : End -->

	<!-- NAVBAR SCRIPTS -->
	<script src="distribution/vendor/jquery/jquery.min.js"></script>
	<script src="distribution/vendor/popper.js/umd/popper.min.js">
	</script>
	<script src="distribution/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="distribution/vendor/jquery.cookie/jquery.cookie.js">
	</script>
	<script src="distribution/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="distribution/js/front.js"></script>



</body>
</html>
<?php } ?>