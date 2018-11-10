
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
	<title>Admin | Pending Orders</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../../css/custom.css">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container-dashoard text-secondary">
        <div class="container-dashoard col-centeredh-100 justify-content-center align-items-center text-center">
          <br><br>
            <h2>Cabin Crew Dashboard</h2><br><br>
              <div class="row ">
                    <div class="col-md-4">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="todays-orders.php" class="btn btn-outline-primary btn-hover--transform-shadow btn--transition btn-lg mybutton btn-top-up">
                            <i class="fa fa-2x fa-tasks" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Today's Orders
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="pending-orders.php" class="btn btn-outline-warning btn-hover--transform-shadow btn--transition btn-lg mybutton btn-top-up">
                        <i class="fa fa-2x fa-tasks" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Pending Orders</a>
                    </div>
                    <div class="col-md-4">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="pending-orders.php" class="btn btn-outline-success btn-hover--transform-shadow btn--transition btn-lg mybutton btn-top-up">
                        <i class="fa fa-2x fa-inbox" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Delivered Orders</a>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-md-12">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="todays-orders.php" class="btn btn-outline-info btn-hover--transform-shadow btn--transition btn-lg mybutton btn-top-up">
                            <i class="fas fa-2x fa-boxes" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Products in Stock
                        </a>
                    </div>
                  </div>
              </div>
        </div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>