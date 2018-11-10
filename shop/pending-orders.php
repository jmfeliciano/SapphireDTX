<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if (isset($_GET['id'])) {

		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");
		;

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

	<title>Pending Order History</title>
	<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
	<!-- NAVBAR -->
	<link rel="stylesheet" href="distribution/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="distribution/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Custom Font Icons CSS-->
	<link rel="stylesheet" href="distribution/css/font.css">
	<!-- Google fonts - Muli-->
	<link rel="stylesheet" href="assets/css/myfont.css">
	<!-- jQuery Confirm -->
	<link rel="stylesheet" href="../css/jquery-confirm.css">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="distribution/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="distribution/css/custom.css">

	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body class="cnt-home">

	<?php include('includes/header.php');?>

	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('includes/top-header.php');?>
		<?php include('includes/main-header.php');?>
		<?php include('includes/menu-bar.php');?>
	</header>
	<!-- ============================================== HEADER : END ============================================== -->
	<div class="body-content outer-top-xs">
		<div class="container">
		<h4 class="text-center">PENDING ORDERS</h4>
			<div class="row inner-bottom-sm">
				<div class="shopping-cart">
					<div class="col-md-12 col-sm-12 shopping-cart-table ">
						<div class="table-responsive">
							<form name="cart" method="post">

										<?php $query=mysqli_query($con,"select products.product_image_1 as pimg1,products.product_name as pname,products.id as c,orders.productId as opid,orders.quantity as qty,products.product_price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is null");
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0){?>
								<table class="table table-bordered table-hover table-condensed">
															<thead class="cart-item product-summary thead-dark">
																<tr>
																	<th class="cart-romove item">#</th>
																	<th class="cart-description item">Image</th>
																	<th class="cart-product-name item">Product Name</th>

																	<th class="cart-qty item">Qty</th>
																	<th class="cart-sub-total item">Price Per unit</th>
																	<th class="cart-total">Total Price:</th>
																	<th class="cart-csub-total item">Sapphires</th>
																	<th class="cart-ctotal last-item">Total Price</th>
																	<th class="cart-description item">Order Date &amp;Time</th>
																	<th class="cart-total last-item">Action</th>
																</tr>
															</thead>
															<!-- /thead -->

															<tbody>
<?php 
	while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td>
												<?php echo $cnt;?>
											</td>
											<td class="cart-image">
												<a class="entry-thumbnail" href="detail.html">
													<img src="../../inflightapp/storage/app/public/product_images/<?php echo $row['pimg1'];?>" alt="<?php echo $row['pimg1'];?>"  width="40px" height="40px">
												</a>
											</td>
											<td class="cart-product-name-info">
												<h4 class='cart-product-description'>
													<a href="product-details.php?pid=<?php echo $row['opid'];?>">
														<?php echo $row['pname'];?>
													</a>
												</h4>


											</td>
											<td class="cart-product-quantity">
												<?php echo $qty=$row['qty']; ?>
											</td>
											<td class="cart-product-sub-total">
												<?php echo $price=$row['pprice']; ?> </td>
											<td class="cart-product-grand-total">
												<?php 
												$grand_total = number_format($qty*$price);
												echo ($grand_total);?>
											</td>
											<td class="cart-product-csub-total"><span class="cart-sub-total-price"><img src="../images/gems.png" width="20px">
													<?php
														//SAPPHIRE PRICE
														$productPrice = floatval($price);
														$SPHValue = str_replace( ',', '', $rowSPH['value'] );
														$tokenPrice = $productPrice / $SPHValue;
														$tokenPriceProduct = number_format($tokenPrice, 8);
														echo htmlentities($tokenPriceProduct);
													?>
												</span>
											</td>

											<td class="cart-product-cgrand-total"><span class="cart-grand-total-price"><img src="../images/gems.png" width="20px"> <?php
														//SAPPHIRE PRICE
														$productPrice = floatval($grand_total);
														$SPHValue = str_replace( ',', '', $rowSPH['value'] );
														$tokenPrice = $productPrice / $SPHValue;
														$tokenPriceProduct = number_format($tokenPrice, 8);
														echo htmlentities($tokenPriceProduct);
													?></td>
											<td class="cart-product-sub-total">
												<?php echo $row['odate']; ?> </td>

											<td>
												<a class="btn btn-outline-danger" href="pending-orders.php?id=<?php echo $row['oid']; ?> ">Delete</a>
											</td>
										</tr>
								<?php $cnt=$cnt+1;} ?>
								</tbody>
									<!-- /tbody -->
								</table><br>
								<div class="cart-checkout-btn pull-right">
									<button type="submit" name="ordersubmit" class="btn btn-primary">
										<a style="color:white;" href="payment-method.php">Proceed To Payment</a>
									</button>
								</div>
								<!-- /table -->
								<?php } else {?>
									<span colspan="10" align="center">
										<h6>No Result Found</h6>
									</span>
								<?php } ?>
						</div>
					</div>

				</div>
				<!-- /.shopping-cart -->
			</div>
			<!-- /.row -->
			</form>
			<!-- ============================================== BRANDS CAROUSEL ============================================== -->
			<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.body-content -->
	</div>
	</section>
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
		$(document).ready(function () {
			$(".changecolor").switchstylesheet({
				seperator: "color"
			});
			$('.show-theme-options').click(function () {
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function () {
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