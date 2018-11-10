<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cryptoSPHQuery=mysqli_query($con,"select * from cryptocurrency where id=4");
$rowSPH=mysqli_fetch_array($cryptoSPHQuery);
$cid=intval($_GET['cid']);
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
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
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
	
	<?php
    error_reporting(0);
  //FOR THIS ACCOUNT
    $queryy = "SELECT * FROM shopusers WHERE id='$id'";
    $resultss = mysqli_query($con, $queryy);
    $account=mysqli_fetch_assoc($resultss);
  //TAX
    $chTaxQuery=mysqli_query($con,"select * from charges where id=1");
    $rowTax=mysqli_fetch_array($chTaxQuery);
  //SERVICE CHARGE
    $SCTaxQuery=mysqli_query($con,"select * from charges where id=2");
    $rowSC=mysqli_fetch_array($SCTaxQuery);
	//CURRENCY
    $chCurQuery=mysqli_query($con,"select * from charges where id=3");
    $rowCur=mysqli_fetch_array($chCurQuery);
  //SPH VALUE
		$cryptoSPHQuery=mysqli_query($con,"select * from cryptocurrency where id=4");
		$rowSPH=mysqli_fetch_array($cryptoSPHQuery);
?>

<header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="../home.php" class="navbar-brand">
              <div class="brand-text brand-big visible"><img src="../images/pal1.png" width="180"></div>
              <div class="brand-text brand-sm"><strong class="text-primary">P</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-bars"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            
            
            <!-- Tasks end-->
             <div class="list-inline-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="nav-link"><?php echo $header['coins']?> <i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu megamenu">
                <div class="row megamenu-buttons">
                  <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=4");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4">
                    <a href="#" class="d-block megamenu-button-link bg-default">
                      <img src="../images/gems.png" width="20px">&nbsp;&nbsp;&nbsp;<span>SPH/USD</span>
                      <strong>'.$row['value'] .'</strong>
                    </a>
                  </div>';}?>
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=1");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-default">
                  <img src="../images/bitcoin.png" width="20px">&nbsp;&nbsp;&nbsp;<span>BTC/USD</span>
                      <strong>'.$row['value'] .'</strong></a></div>';}?>
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=2");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-default">
                  <img src="../images/bitcoincash.png" width="20px">&nbsp;&nbsp;&nbsp;<span>BCH/USD</span>
                      <strong>'.$row['value'] .'</strong></a></div>';}?>
                <?php
                $data = mysqli_query($con,"select * from cryptocurrency where id=3");
                while($row = mysqli_fetch_array($data)) {  
                echo'
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-default">
                  <img src="../images/ethereum.png" width="15px">&nbsp;&nbsp;&nbsp;<span>ETH/USD</span>
                      <strong>'.$row['value'] .'</strong></a></div>';}?>
                </div>
              </div>
            </div>
            <!-- Megamenu end     -->
          <!-- Laad Balance          -->
          <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="E-Wallet"><span>&nbsp;</span><span class="pull-right"><img src="../img/dollar.png" width="15px"> &nbsp; <?php echo htmlspecialchars_decode($rowCur['symbol']); ?><?php echo $account['ewallet']; ?></span></a>
            </div>
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="Sapphire Crystals"> <span>&nbsp;</span><span class="pull-right"><img src="../images/gems.png" width="18px"> &nbsp; <?php echo $num['tokens']; ?></span></a>
            </div>
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="Sapphire Crystals"> <span>&nbsp;</span><span class="pull-right"><?php echo $header['miles']?> 120</span></a>
            </div>
         
            <!-- Log out               -->
              <div class="list-inline-item logout"><a id="logout" href="logout.php" class="nav-link"><?php echo $header['logout']?> <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="../img/avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h6><?php echo $sidenav['welcome']?>,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading"><?php echo $sidenav['main']?></span>
        <ul class="list-unstyled">
                <li><a href="../home.php"> <i class="fa fa-home"></i><?php echo $sidenav['home']?></a></li>
                <li><a href="../music.php"> <i class="fa fa-music"></i><?php echo $sidenav['music']?></a></li>
                <li><a href="../movies.php"> <i class="fa fa-play"></i><?php echo $sidenav['movies']?></a></li>
                <li><a href="../series.php"> <i class="fa fa-play-circle"></i><?php echo $sidenav['series']?></a></li>
                <li><a href="index.php"> <i class="fa fa-shopping-bag"></i><?php echo $sidenav['shop']?></a></li>
                <li class="active"><a href="inflight.php"> <i class="fa fa-cutlery"></i><?php echo $sidenav['inflight_meals']?></a></li>
                <li><a href="../philippineairlinesplus.php"> <i class="fa fa-plane"></i><?php echo $sidenav['airline_plus']?></a></li>
                <li><a href="../games.php"> <i class="fa fa-gamepad"></i><?php echo $sidenav['games']?></a></li>
                <li><a href="../news.php"> <i class="fa fa-file"></i><?php echo $sidenav['news']?></a></li>

        </ul><span class="heading"><?php echo $sidenav['user']?></span>
        <ul class="list-unstyled">
          <li> <a href="../myfinance.php"> <i class="fa fa-credit-card"></i><?php echo $sidenav['my_finance']?></a></li>
          <li> <a href="my-account.php"> <i class="fa fa-user"></i><?php echo $sidenav['my_account']?></a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      

        <section>

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

<div class="side-menu animate-dropdown outer-bottom-xs">       
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($con,"select id,product_category_name from product_categories where product_category_name in ('Hot Meals', 'Snacks', 'Drinks')");

while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="inflightmeals.php?cid=<?php echo $row['id'];?>" class="dropdown-toggle"><i class="icon fas fa-star fa-fw"></i>
                <?php echo $row['product_category_name'];?></a><br>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->	
 <div class="sidebar-module-container">
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
					$ <?php echo htmlentities($row['product_price']);?></span>
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
		</div>	
		</div>	
	</div>
		</section>
<section  style="margin-top : 200px;">
			
					<!-- /.home-owl-carousel -->
				</section>

<!-- <?php include('includes/footer.php');?> -->

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
	<script src="distribution/vendor/chart.js/Chart.min.js"></script>
	<script src="distribution/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="distribution/js/charts-home.js"></script>
	<script src="distribution/js/front.js"></script>

</body>
</html>