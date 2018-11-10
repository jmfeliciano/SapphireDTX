<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cryptoSPHQuery=mysqli_query($con,"select * from cryptocurrency where id=4");
$rowSPH=mysqli_fetch_array($cryptoSPHQuery);
$cid=intval($_GET['scid']);
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
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

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

	    <title>Sapphire | Category</title>

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
		<!-- Demo Purpose Only. Should be removed in production : END -->

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link rel="stylesheet" href="assets/css/myfont.css">
		
			<!-- NAVBAR -->
		<link rel="stylesheet" href="distribution/vendor/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome CSS-->
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

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">
	
	<?php include('includes/header.php');?>

<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row outer-bottom-sm'>
			<div class='col-md-3 sidebar'>
	            <!-- ================================== TOP NAVIGATION ================================== -->
<!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">
	            	<div class="sidebar-filter">
		            	<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
	<?php include('includes/side-menu.php');?>
</div><!-- /.sidebar-widget -->



    
<!-- ============================================== COLOR: END ============================================== -->

	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->

				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">									
			<?php
$ret=mysqli_query($con,"select * from products where product_category_id='$cid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>							
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
				<span class="price">
					$ <?php echo htmlentities($row['product_price']);?>			</span>
										   <span class="price-before-discount"><strike><small>$<?php echo htmlentities($row['product_price_before_discount']);?></small></strike></span><span class="token_price pull-right"><img src="assets/images/payments/gems.png" width="18" height="18"> <?php 
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
	  <?php } } else {?>
	
		<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
		</div>
		
<?php } ?>	
		
	
		
		
	
		
	
		
	
		
										</div><!-- /.row -->
							</div><!-- /.category-product -->
						
						</div><!-- /.tab-pane -->
						
				

				</div><!-- /.search-result-container -->

			</div><!-- /.col -->

		</div></div>
		</div>
		
</div>
	
		    
</section>
<section class="section featured-product wow fadeInUp" style="margin-top : 200px;">
					<h3 class="section-title">Sponsored Items </h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
				

						<?php 
$qry=mysqli_query($con,"select * from products where product_category_id=4");
while($rw=mysqli_fetch_array($qry))
{

			?>

				<div class="item item-carousel">
						<div class="col-md-12 col-12 wow fadeInUp">
							<!-- <div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image"> -->
							<div class="card">
							<div class="containerview">
							<img src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($rw['product_image_1']);?>" alt="" class="img-fluid" width="100%" height="100%">
							<div class="overlay"></div>
  							<div class="card-img-top button"><a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"> VIEW PRODUCT </a></div>
							</div>
								<!-- </div>
														 /.image 


													</div>
												 /.product-image -->
								<div class="card-body">

									<div class="product-info text-left">
										<h3 class="name">
											<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>">
												<?php echo htmlentities($rw['product_name']);?>
											</a>
										</h3>
										<div class="rating rateit-small"></div>
										<div class="description"></div>

										<div class="product-price">
											<span class="price">$
												<?php echo htmlentities($rw['product_price']);?>
											</span>
											<span class="price-before-discount">
												<strike>
													<small>$
														<?php echo htmlentities($rw['product_price_before_discount']);?>
													</small>
												</strike>
											</span>
											<span class="token_price pull-right">
												<img src="assets/images/payments/gems.png" width="18" height="18">
												<?php 
												$productPrice = floatval($rw['product_price']);
												$SPHValue = str_replace( ',', '', $rowSPH['value'] );
												$tokenPrice = $productPrice / $SPHValue;
												$tokenPriceProduct = number_format($tokenPrice, 2);
												echo htmlentities($tokenPriceProduct);?>
											</span>
										</div>
										<!-- /.product-price -->

									</div>
									<!-- /.product-info -->
								</div>
								<!-- /.cart -->
							</div>
							<!-- /.product -->

						</div>
					</div>

						<!-- /.item -->
						<?php } ?>


					</div>
					<!-- /.home-owl-carousel -->
				</section>


</div>
</div>
<!-- <?php include('includes/footer.php');?> -->
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