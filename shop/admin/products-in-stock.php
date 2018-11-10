<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CABIN | Product In Stock</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- jQuery Confirm -->
	<link rel="stylesheet" href="css/jquery-confirm.css">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
</head>

<body>
	<?php include('include/header.php');?>
	<?php include('include/sidebar.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="content">

				<div class="module">
					<div class="module-head">
						<h4>Manage Products In Stock</h4>
					</div>
					<div class="module-body table">


						<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>In Stock</th>
									<th>Status </th>
									<th>Action </th>

								</tr>
							</thead>
							<tbody>

								<?php $query=mysqli_query($con,"select id,product_name,product_in_stock from products");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
								<tr>
									<td>
										<?php echo htmlentities($cnt);?>
									</td>
									<td><?php echo htmlentities($row['id']);?></td>
									<td>
										<?php echo htmlentities($row['product_name']);?>
									</td>
									<td>
										<?php echo htmlentities($row['product_in_stock']);?>
									</td>
									<td>
										<?php $st=$row['product_in_stock'];
                                            if($st == 0)
                                            {
                                                echo "Out of Stock";
                                            }
                                            else
                                            {
                                                echo "In Stock";
                                            }
										 ?>
									</td>
									<td>
										<button class="btn btn-primary in-stock" title="Edit Quantity">Edit In Stock</button>
									</td>

									<?php $cnt=$cnt+1; } ?>

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
	<script src="scripts/jquery-confirm.js"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function () {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		});

		$('.in-stock').on('click', function () {
			var product_id = $(this).parent().siblings(":nth-child(2)").html();
			
			var product_name = $(this).parent().siblings(":nth-child(3)").text();

			$('table').find('.stock-number').removeClass('stock-number');
			$(this).parent().siblings(":nth-child(4)").addClass('stock-number');

			$('table').find('.stock-status').removeClass('stock-status');
			$(this).parent().siblings(":nth-child(5)").addClass('stock-status');


			$.confirm({
				title: 'Product ' + product_name,
				content: '' +
					'<div class="form-group">' +
					'<label>In Stock</label>' +
					'<input type="number" placeholder="Enter here.." class="product-stock form-control" required min="0"/>' +
					'</div>',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-green',
						action: function () {
							var product_stock = this.$content.find('.product-stock').val();
							if (!product_stock) {
								$.alert('Please provide product in stock!');
								return false;
							} else {
								$.confirm({
									type: 'green',
									theme: 'material',
									title: 'Are you sure this is the available stock?',
									content: '<strong>Product:</strong> ' + product_name + '<br><strong>In Stock:</strong> ' +
										product_stock,
									buttons: {
										Yes: {
											btnClass: 'btn-green',
											action: function () {
												$.ajax({
													type: "POST",
													url: "edit-in-stock.php",
													data: {
														productId: product_id,
														inStock: product_stock
													},
													dataType: "JSON",
													success: function (data) {
														$('.stock-number').html(product_stock).removeClass('stock-number');
														if(product_stock == 0){
															$('.stock-status').html("Out of Stock").removeClass('stock-status');
														} else {
															$('.stock-status').html("In Stock").removeClass('stock-status');
														}
														// window.location.replace("products-in-stock.php");
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
												$.alert('Product In Stock has not been changed');
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
	</script>
</body>
<?php } ?>