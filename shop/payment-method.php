<?php 
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	// unset($_SESSION['cart']);
$id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);
?>
<?php
if(isset($_GET['oid'])){
	// $pdtid=array();
	$orderId = $_GET['oid'];
    $sql = "SELECT * FROM products WHERE id=$orderId";
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$productPrice = preg_replace('/[^A-Za-z0-9\-]/', '', $row['product_price']);
				$quantity = $_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $quantity*$productPrice;
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;
				$total_price = number_format($totalprice);
				$_SESSION['tp']=$total_price;
				// array_push($pdtid,$row['id']);
			}
		}
}

if (isset($_GET['id'])) {

		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");
		;

	}
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

	    <title>Sapphire | Payment Method</title>
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
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
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
		<!-- theme stylesheet-->
		<link rel="stylesheet" href="distribution/css/style.default.css" id="theme-stylesheet">
		<!-- Custom stylesheet - for your changes-->
		<link rel="stylesheet" href="distribution/css/custom.css">

		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home">
	
		<?php include('includes/header.php');?>

<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<br><br>
<div class="container-fluid">
    <!-- <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
      <li class="breadcrumb-item active">Payment Method</li>
    </ul> -->
</div>
										<?php $query=mysqli_query($con,"select products.product_image_1 as pimg1,products.product_name as pname,products.id as c,orders.productId as opid,orders.quantity as qty,products.product_price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is null");
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0){?>

	  <div class="container h-100 justify-content-center align-items-center text-center" style="margin-top:-70px">
  <h4>ORDER DETAILS</h4>
  <div class="shopping-cart">
					<div class="col-md-12 col-sm-12 shopping-cart-table ">
						<div class="table-responsive">
							<form name="cart" method="post">
  
								<table class="table table-bordered table-hover table-condensed">
									<thead class="cart-item product-summary thead-dark">
										<tr>
											<th class="cart-romove item">#</th>
											<th class="cart-description item">Image</th>
											<th class="cart-product-name item">Product Name</th>
											<th class="cart-qty item">Quantity</th>
											<th class="cart-sub-total item">Price Per unit</th>
											<th class="cart-total">Total Price</th>
											<th class="cart-csub-total item">Sapphires</th>
											<th class="cart-ctotal last-item">Total Price</th>
											<th class="cart-description item">Order Date &amp;Time</th>
											<th class="cart-total last-item">Action</th>
										</tr>
									</thead>
									<!-- /thead -->
  
									<tbody>

	<?php
	$totalproductprice = 0;
while($row=mysqli_fetch_array($query))
{
	$price=$row['pprice'];
	$qty=$row['qty'];
	$totalproductprice = $totalproductprice + ($qty*$price);
?>

										<tr>
											<td>
												<?php echo $cnt;?>
											</td>
											<td class="cart-image">
												<a class="entry-thumbnail" href="detail.html">
													<img src="../../inflightapp/storage/app/public/product_images/<?php echo $row['pimg1'];?>" alt="<?php echo $row['pimg1'];?>"  width="60px" height="60px">
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
												<?php echo $qty; ?>
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
														$tokenPriceProduct = number_format($tokenPrice, 2);
														echo htmlentities($tokenPriceProduct);
													?>
												</span>
											</td>

											<td class="cart-product-cgrand-total"><span class="cart-grand-total-price"><img src="../images/gems.png" width="20px"> <?php
														//SAPPHIRE PRICE
														$productPrice = floatval($grand_total);
														$SPHValue = str_replace( ',', '', $rowSPH['value'] );
														$tokenPrice = $productPrice / $SPHValue;
														$tokenPriceProduct = number_format($tokenPrice, 2);
														echo htmlentities($tokenPriceProduct);
													?></td>
											<td class="cart-product-sub-total">
												<?php echo $row['odate']; ?> </td>

											<td>
												<a class="btn btn-outline-danger" href="payment-method.php?id=<?php echo $row['oid']; ?> ">Delete</a>
											</td>
										</tr>
										<?php $cnt=$cnt+1;} ?>
										<tr><hr>

										</tr>


									</tbody>
									<!-- /tbody -->
								</table>
								<!-- /table -->

						</div>
					</div>

				</div>
				<!-- /.shopping-cart -->
						<hr>
            <h4>How would you like to pay?</h4>
			<div class="row justify-content-center align-items-center text-center">

			<div class="col-12 col-md-4 payment">
				<label class="payment-col mt-4" id="paymethod1">
					<input type="radio" class="wallet" id="wallet" name="paymethod" value="EWALLET" checked="checked"><br>E Wallet
					<div class="pt-3" id="wallet">
						<img src="../images/wallet.png">
					</div>
				</label>
				<p>You can top up your wallets with scratch cards!</p>
				<div class="list-inline-item logout">
					<span class="pull-right"><img src="../img/dollar.png" width="20px"> &nbsp;
						<?php echo htmlspecialchars_decode($rowCur['symbol']); ?>
						<?php echo $account['ewallet']; ?></span>
				</div>
			</div>

			<div class="col-12 col-md-4 payment">
				<label class="payment-col mt-4 p-1" id="paymethod2">
					<input type="radio" id="card" name="paymethod" value="Credit Card"><br>Credit/Debit Card
					<div  class="pt-3" id="credit">
						<img src="../images/card.png">
					</div>
				</label>
				<p>We Accept These Cards</p><br>
				<img src="../img/pay1.png" width=80px> &nbsp;
				<img src="../img/pay2.png" width=50px> &nbsp;
				<img src="../img/pay3.png" width=40px> &nbsp;
			</div>

			<div class="col-12 col-md-4">
				<label class="payment-col mt-3" id="paymethod3">
					<input type="radio" class="token" id="token" name="paymethod" value="TOKENS"><br>Sapphire Crystals
					<div  class="pt-3" id="token">
						<img src="../images/crystal.png">
					</div>
				</label>
				<p>Buy with our new Sapphire Crystals!</p>
				<div class="list-inline-item logout">
					<span class="pull-right"><img src="../images/gems.png" width="30px"> &nbsp;
						<?php echo $account['tokens']; ?>&nbsp;&nbsp;</span>
				</div>
			</div>

			</div>
			</div>

           
   	<br>
   	 <center>
		<div class="col-md-4">
		<a id="submit-payment" name="submit" class="btn btn-block btn-primary">Next</a>
		</div>
	</center><br><br>
		<?php } else {?>
		<div class="container">
				<h4>No Result Found</h4>
				<small class="font-italic">Please refresh the page again</small>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<?php } ?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	<script>
		$(document).ready(function () {
			$('#card').click(function() {
				$('#submit-payment').attr("href", "../creditcardshop.php")
			})

			$('#wallet').click(function() {
				$("#submit-payment").removeAttr("href");
			})

			$('#token').click(function() {
				$("#submit-payment").removeAttr("href");
			})
		});
	</script>
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


		$('#submit-payment').on( "click", function() {



			var paymethod = $("input[name='paymethod']:checked").val();
			// var totalpprice = <?php echo $_SESSION['totalpprice']; ?>;
			// var taxValue = <?php echo $rowTax['value']; ?>;


			//TAX PERCENTAGE
			var taxvaluee = '<?php echo $rowTax['value']; ?>';
			var taxvalue = '0.'+parseInt(taxvaluee.toString().replace(/,/g , ""));
			var totalpprice = <?php echo $totalproductprice; ?>;
			var totalppricee = parseInt(totalpprice.toString().replace(/,/g , ""));
			//TAX
			var taxOneQty = totalppricee * taxvalue;
			var taxOneQtywCommaFixed = taxOneQty.toFixed(2);
			var taxOneQtywComma = taxOneQtywCommaFixed.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			//SERVICE CHARGE
			var servicecharge = "<?php echo $rowSC['value']; ?>"
			//TOTAL
			var totalOnewtax = totalppricee + taxOneQty;
			var totalOnewtaxcommaFixed = totalOnewtax.toFixed(2);
			var totalOnewtaxcomma = totalOnewtaxcommaFixed.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			//SYMBOL
			var taxSymbol = '<?php echo htmlspecialchars_decode($rowTax['symbol']); ?>';
			var curSymbol = '<?php echo htmlspecialchars_decode($rowCur['symbol']); ?>';
			//VALUE
			var taxValue = '<?php echo htmlspecialchars_decode($rowTax['value']); ?>';

			$.confirm({
				type: 'blue',
				title: 'Confirmation',
				content: 'Are you sure you want to use '+ paymethod+'?<br><span class="font-weight-bold text-uppercase"><br>Order Summary</span><br><span class="font-weight-bold font-italic">Subtotal:</span> <span class="pull-right">'+curSymbol+totalppricee+'.00</span><br><span class="font-weight-bold font-italic">Tax: </span> <small class="font-italic">('+taxValue+'%)</small> <span class="pull-right">'+taxSymbol+taxOneQtywComma+'</span><br><span class="font-weight-bold font-italic">Service Charge:</span> <span class="pull-right">'+curSymbol+servicecharge+'.00</span><hr><span class="font-weight-bold font-italic">Grand Total:</span><span class="pull-right"> '+curSymbol+totalOnewtaxcomma+'</span>',
				buttons: {
					Yes: {
					btnClass: 'btn-green',
					action: function(){

						$.confirm({
							type: 'blue',
							title: 'Processing..',
							content: 'Confirming your order.',
							buttons: {
								OK: function () {
									$.ajax({
									type: "POST",
									url: "shop-transaction.php",
									data: {method:paymethod,totalpprice:totalOnewtaxcommaFixed},
									dataType: "JSON",
									success: function(data) {
										if(data == '2'){
											$.alert('You do not have enough balance.');
										} else if(data =='1') {								
												$.confirm({
													type: 'green',
													title: 'Thank you for shopping with us!',
													content: 'Your order is now in process..',
													buttons: {
														OK: function () {
															window.location.replace("order-history.php");
														}
													}
												})
										} else {
											$.alert('Order unsuccessful please try again.');
										}
									},
									error: function(err) {
									console.log(err);
									
									}
								});
								}
							}
						})
					
					}

					},
					No: {
						text: 'No', // With spaces and symbols
						action: function () {
							$.alert('Order Unsuccessful');
						}
					}
				}
			});
		});
	</script>

<!-- NAVBAR SCRIPTS -->
	
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