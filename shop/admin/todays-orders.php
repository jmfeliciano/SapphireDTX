<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CABIN | Pending Orders</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="fontawesome/css/all.min.css">
		<link rel="stylesheet" <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
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

	<body>
		<?php include('include/header.php');?>
		<?php include('include/sidebar.php');?>

		<div class="wrapper">
			<div class="container">
				<div class="content">

					<div class="module">
						<div class="module-head">
							<h4>Today's Orders</h4>
						</div>
						<div class="module-body table">
							<?php if(isset($_GET['del']))
{?>
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Oh snap!</strong>
								<?php echo htmlentities($_SESSION['delmsg']);?>
								<?php echo htmlentities($_SESSION['delmsg']="");?>
							</div>
							<?php } ?>

							<br />


							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display">
								<thead>
									<tr>
										<th>#</th>
										<th>Full Name</th>
										<th>Seat #</th>
										<th width="50">Product ID</th>
										<th>Product </th>
										<th>Qty </th>
										<th>Amount </th>
										<th>Order Date</th>
										<th>Order Status</th>
										<th>Action</th>


									</tr>
								</thead>

								<tbody>
									<?php 
 $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$query=mysqli_query($con,"select shopusers.firstname as firstname,shopusers.lastname as lastname,products.id as prodId,products.product_name as productname,orders.quantity as quantity,orders.orderDate as orderdate,products.product_price as productprice,orders.id as id,orders.orderStatus as orderStatus  from orders join shopusers on  orders.userId=shopusers.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
									<tr>
										<td>
											<?php echo htmlentities($cnt);?>
										</td>
										<td>
											<?php echo htmlentities($row['firstname']); ?>
											<?php echo htmlentities($row['lastname']); ?>
										</td>
										<td>
											14D
										</td>
										<td>
											<?php echo htmlentities($row['prodId']);?>
										</td>
										<td>
											<?php echo htmlentities($row['productname']);?>
										</td>
										<td>
											<?php echo htmlentities($row['quantity']);?>
										</td>
										<td>
											<?php $order_price = $row['quantity']*preg_replace('/[^A-Za-z0-9\-]/', '', $row['productprice']);
												echo "$".number_format($order_price);
											?>
										</td>
										<td>
											<?php echo htmlentities($row['orderdate']);?>
										</td>
										<td>
											<?php 
											 	   $orderstatus = $row['orderStatus'];
												if($orderstatus == NULL){
													echo '<span class="badge badge-pill badge-warning">Order Pending</span>';
												} elseif($orderstatus == 'Item Return') {
													echo '<span class="badge badge-pill badge-warning">Item Return</span>';
												} elseif($orderstatus == 'Cancelled') {
													echo '<span class="badge badge-pill badge-danger">Cancelled</span>';
												} elseif($orderstatus == 'Returned') {
													echo '<span class="badge badge-pill badge-secondary">Item Returned</span>';
												} elseif($orderstatus == 'Delivered') {
													echo '<span class="badge badge-pill badge-success">Delivered</span>';
												} else {
													echo '<span class="badge badge-pill badge-info">In Process</span>';
												}
											?>
										</td>
										<td>
											<?php 
												if($row['orderStatus']=='Cancelled' || $row['orderStatus']=='Returned'){?>
											<span class="badge badge-secondary">No Action Available</span>
											<?php } else{ ?>
											<a href="updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank">
												<i class="icon-edit"></i>
											</a>
											<?php } ?>
										</td>
									</tr>

									<?php $cnt=$cnt+1; } ?>
								</tbody>
							</table>
						</div>
					</div>



				</div>
				<!--/.content-->
			</div>
			<!--/.container-->
		</div>
		<!--/.wrapper-->
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function () {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
	</body>
	<?php } ?>