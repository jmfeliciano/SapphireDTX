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
                        <h4>Purchased Top-up Cards</h4>
                    </div>
                    <div class="module-body table">
                        <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Value</th>
                                    <th>Date Purchase</th>
                                    <th>Status</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
 $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$query=mysqli_query($con,"select * from topupcard");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                                <tr>
                                    <td>
                                    <?php echo htmlentities($cnt);?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['user']);?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['value']);?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['date_bought']);?>
                                    </td>
                                    <td>
											<?php 
											 	   $cardstatus = $row['cardStatus'];
												if($cardstatus == NULL){
													echo '<span class="badge badge-pill badge-warning">Card Pending</span>';
												} elseif($cardstatus == 'Delivered') {
													echo '<span class="badge badge-pill badge-success">Delivered</span>';
												} else {
													echo '<span class="badge badge-pill badge-info">In Process</span>';
												}
											?>
										</td>
                                    <td>
											<a href="updatecard.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank">
												<i class="icon-edit"></i>
											</a>
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
			var productId = $(this).parent().siblings(":nth-child(1)").html();
			
			var user = $(this).parent().siblings(":nth-child(3)").text();
			var value = $(this).parent().siblings(":nth-child(4)").text();
			var status = $(this).parent().siblings(":nth-child(6)").text();


			$('table').find('.stock-number').removeClass('stock-number');
			$(this).parent().siblings(":nth-child(4)").addClass('stock-number');

			$('table').find('.stock-status').removeClass('stock-status');
			$(this).parent().siblings(":nth-child(5)").addClass('stock-status');


			$.confirm({
				title: value + 'Top-up Card',
				content: '' +
					'<div class="form-group">' +
					'<label>User: '+user+'</label>' +
					'<p>Current Status: <strong>' + status + '</strong></p>' +
					'</div>',
				buttons: {
					formSubmit: {
						text: 'Deliver',
						btnClass: 'btn-green',
						action: function () {
							var product_stock = this.$content.find('.product-stock').val();
								$.confirm({
									type: 'green',
									theme: 'material',
									title: 'Are you sure you want to deliver this?',
									content: '<strong>Product:</strong> ' + value + 'Top-up Card' + '<br><strong>Product ID:</strong> ' +
										productId,
									buttons: {
										Yes: {
											btnClass: 'btn-green',
											action: function () {
												$.ajax({
													type: "POST",
													url: "updatecard.php",
													data: {
														productId: productId
													},
													dataType: "JSON",
													success: function (data) {
														$.alert(value + 'Top-up Card is delivered to ' + user)
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