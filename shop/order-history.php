<?php 
error_reporting(0);
session_start();

include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
unset($_SESSION['cart']);
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

	<title>Sapphire | Order History</title>
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
	<script language="javascript" type="text/javascript">
		var popUpWin = 0;

		function popUpWindow(URLStr, left, top, width, height) {
			if (popUpWin) {
				if (!popUpWin.closed) popUpWin.close();
			}
			popUpWin = open(URLStr, 'popUpWin',
				'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
				600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
		}
	</script>

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
			<h3>My Transactions</h3><br>
			<div class="row" >
				<!-- <div class="shopping-cart" >
								<div class="col-md-12 col-sm-12 col-xs-12 shopping-cart-table " > -->
				<div class="table-responsive">
					<form name="cart" method="post">

						<table class="table table-bordered table-hover table-condensed table-striped">
							<thead class="cart-item product-summary thead-dark">
								<tr>
									<th class="cart-romove item">#</th>
									<!-- <th class="cart-description item">Image</th> -->
									<th width="15%" class="cart-product-name item">Product Name</th>

									<th class="cart-qty item">Quantity</th>
									<th width="15%" class="cart-sub-total item">Price</th>

									<th class="cart-total item">Total</th>
									<th class="cart-total item">Payment Method</th>
									<th class="cart-description item">Order Date</th>
									<th class="cart-description item">Status</th>
									<th class="cart-description item">Action</th>

								</tr>
							</thead>
							<!-- /thead -->

							<tbody>

								<?php 
$query=mysqli_query($con,"select products.product_image_1 as pimg1,products.product_name as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.product_price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid,orders.orderStatus as oStatus from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."'");
$totalprice=0;
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>
								<tr>
									<td>
										<?php echo $cnt;?>
									</td>
									<!-- <td class="cart-image">
										<a class="entry-thumbnail" href="product-details.php?pid=<?php echo htmlentities($row['opid']);?>">
											<img src="../../inflightapp/storage/app/public/product_images/<?php echo $row['pimg1'];?>" alt="<?php echo $row['pname'];?>"
											     width="60px" height="60px">
										</a>
									</td> -->
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
										<?php 
															$productPrice = preg_replace('/[^A-Za-z0-9\-]/', '', $row['pprice']);
															echo "$". number_format($productPrice).".00"; ?> </td>
									<td class="cart-product-grand-total">
										<?php 
											$subtotal = $qty*$productPrice;
											echo "$". number_format($subtotal).".00";
											if($row['oStatus']=='Delivered'){
												$totalprice += $subtotal;
												$_SESSION['grandtotal']=$totalprice;
											}
										?>
									</td>
									<td class="cart-product-sub-total">
										<?php
											if($row['paym']==NULL){
												echo "<span class='badge badge-dark'>None</span>";
											} else {
												echo "<span class='badge badge-success'>".$row['paym']."</span>";
											}
										?>
									</td>
									<td class="cart-product-sub-total">
										<?php echo $row['odate']; ?> </td>
									<td class="cart-product-sub-total">
										<?php 
																if($row['paym']==NULL){
																	echo "<span class='badge badge-pill badge-primary'>Order Not Complete</span>";
																} else if($row['paym']!=NULL && $row['oStatus'] == 'in Process' || $row['oStatus'] == NULL){
																	echo "<span class='badge badge-pill badge-primary'>Order Processing</span>";
																} else if($row['oStatus']=='Cancelled'){
																	echo "<span class='badge badge-pill badge-danger'>Order Cancelled</span>";
																} else if($row['oStatus']=='in Process'){
																	echo "<span class='badge badge-pill badge-info'>In  Process</span>";
																} else if($row['oStatus']=='Returned'){
																echo "<span class='badge badge-pill badge-secondary'> Returned</span>";
																} else if($row['oStatus']=='Item Return'){
																echo "<span class='badge badge-pill badge-warning' title='Waiting for cabin confirmation'> Item Return</span>";
																} else{
																	echo "<span class='badge badge-pill badge-success'>".$row['oStatus']."</span>";
																}
															?>
									</td>
									<td class="cart-product-sub-total">
										<?php if($row['paym']==NULL){?>
 										<a class="btn btn-sm btn-outline-warning" href="payment-method.php?oid=<?php echo htmlentities($row['orderid']);?>">Complete Order</a>
										<?php } else if($row['oStatus']=='Delivered'){?>
										<a class="btn btn-sm btn-outline-primary" href="product-details.php?pid=<?php echo htmlentities($row['proid']);?>">Write a Review</a><br><br>
										<button type="button" class="btn btn-sm btn-outline-warning return-item" data-id="<?php echo htmlentities($row['orderid']);?>">Return Item</button>
										<?php } else if($row['oStatus']=='Cancelled' || $row['oStatus']=='Item Return'){ ?>
										<a class="btn btn-sm btn-outline-primary" href="product-details.php?pid=<?php echo htmlentities($row['proid']);?>">Go to Product</a>
 										<?php } else if($row['oStatus']=='Returned'){ ?>
 										<a class="btn btn-sm btn-outline-primary" href="product-details.php?pid=<?php echo htmlentities($row['proid']);?>">Go to Product</a>
 										<?php } else{ ?>
										<button type="button" class="btn btn-sm btn-outline-danger cancel-order" data-id="<?php echo htmlentities($row['orderid']);?>">Cancel</button>
 											<?php } ?>
									</td>

								</tr>
								<?php $cnt=$cnt+1;} ?>
								<?php } else {?>
								<tr>
									<td colspan="10" align="center">
										<h4>No Result Found</h4>
									</td>
								</tr>
								<?php } ?>

							</tbody>
							<!-- /tbody -->
						</table>
						<!-- /table -->
				</div>
				<br>
					<div class="col-12 cart-shopping-total mt-3 pull-right">
						<div class="card bg-light mb-3" style="max-width: 18rem; margin-right: 0px;">
							<div class="card-header"><h6>Grand Total</h6><span>Delivered Items</span></div>
								<div class="card-body">
									<h6 class="card-text text-right"><?php echo "$". number_format($_SESSION['grandtotal']).".00";?></h6>
								</div>
						</div>
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
	<script src="../js/jquery-confirm.js"></script>
	<script src="distribution/js/front.js"></script>
	<script type="text/javascript">
		$('.return-item').on("click", function () {
			var order_id = $(this).data('id');
			console.log(order_id);

			$.confirm({
				title: 'Reason of Return',
				content: '' +
					'<form action="" class="formName">' +
					'<div class="form-group">' +
					'<label>Select Reason:</label>' +
					'<select class="select-reason form-control" required><option disabled selected="true">Select a Reason</option><option>Change of Mind</option><option>Quality Issues</option><option>Product Does Not Match My Order</option><option>Product Did Not Meet My Expectation</option><option>Others..</option></select><br>' +
					'<label>Additional Information (optional)</label>' +
					'<input type="text" placeholder="Enter here.." class="add-info form-control" required />' +
					'</div>' +
					'</form>',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var reason = this.$content.find('.select-reason').val();
							var add_info = this.$content.find('.add-info').val();
							if (!reason) {
								$.alert('Please provide a reason');
								return false;
							} else {
								$.confirm({
									type: 'red',
									theme: 'material',
									title: 'Are you sure you want to return?',
									content: '<strong>Reason:</strong> ' + reason + '<br><strong>Additional Info:</strong> ' + add_info,
									buttons: {
										Yes: {
											btnClass: 'btn-green',
											action: function () {
												$.ajax({
													type: "POST",
													url: "return-order.php",
													data: {
														orderId: order_id,
														reason: reason,
														addInfo: add_info
													},
													dataType: "text",
													success: function (data) {
														window.location.replace("order-history.php");
													},
													error: function (err) {
														console.log(err);

													}
												});

											}

										},
										No: {
											text: 'No', // With spaces and symbols
											action: function () {
												$.alert('Item has not been returned');
											}
										}
									}
								});

							}
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});

		});


		$('.cancel-order').on("click", function () {
			var order_id = $(this).data('id');
			$.confirm({
				type: 'red',
				theme: 'material',
				title: 'Confirmation',
				content: 'Are you sure you want to cancel?',
				buttons: {
					Yes: {
						btnClass: 'btn-red',
						action: function () {

							$.confirm({
								type: 'green',
								title: 'Order Canceled!',
								content: 'Redirecting you to orders history page..',
								buttons: {
									OK: function () {
										$.ajax({
											type: "POST",
											url: "cancel-order.php",
											data: {
												orderId: order_id
											},
											dataType: "JSON",
											success: function (data) {
												window.location.replace("order-history.php");
											},
											error: function (err) {
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
							$.alert('Order has not been cancelled');
						}
					}
				}
			});
		});
	</script>

</body>

</html>
<?php } ?>