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
              <div class="brand-text brand-big visible"><!-- <strong class="text-primary">PHILIPPINE</strong>&nbsp;<strong>AIRLINES</strong> -->
             <img src="../images/pal1.png" width="180">
              </div>
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
              <a rel="nofollow" href="#" data-toggle="tooltip" title="E-Wallet"><span>&nbsp;</span><span class="pull-right"><img src="../img/dollar.png" width="15px"> &nbsp; $<?php echo $num['ewallet']; ?></span></a>
            </div>
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="Sapphire Crystals"><span>&nbsp;</span><span class="pull-right"><img src="../images/gems.png" width="15px"> &nbsp; <?php echo $num['tokens']; ?></span></a>

            </div>
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="Miles"><span>&nbsp;</span><span class="pull-right"><?php echo $header['miles']?> 120</span></a>
            </div>
            <!-- Log out               -->
            <div class="list-inline-item logout">
              <a id="logout" href="logout.php" class="nav-link"><?php echo $header['logout']?> <i class="icon-logout"></i></a>
            </div>

            <!-- Language -->
            <div class="nav-item dropdown list-inline-item">
            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><img src="../images/<?php echo $flag ?>.png" alt="" width="30px"></i><i class="fa fa-caret-down ml-1"></i></a>
            <div class="dropdown-menu flagdropdown" aria-labelledby="dropdown01" style="width: 150px !important; min-width: 150px; max-width: 150px;">

               <a class="dropdown-item" href="?lang=en"><img src="../images/gb.png" width="30px" alt=""><span class="ml-3">English</span></a>

                <a class="dropdown-item" href="?lang=kr"><img src="../images/kr.png" width="30px" alt=""><span class="ml-3">Korean</span></a>

                <a class="dropdown-item" href="?lang=jp"><img src="../images/jp.png" width="30px" alt=""><span class="ml-3">Japanese</span></a>

                <a class="dropdown-item" href="?lang=cn"><img src="../images/cn.png" width="30px" alt=""><span class="ml-3">Chinese</span></a>

                 <a class="dropdown-item" href="?lang=my"><img src="../images/my.png" width="30px" alt=""><span class="ml-3">Malay</span></a>

              </div>
            </div>
            <!-- Language end -->
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
                <li class="active"><a href="index.php"> <i class="fa fa-shopping-bag"></i><?php echo $sidenav['shop']?></a></li>
                <li><a href="inflight.php"> <i class="fa fa-cutlery"></i><?php echo $sidenav['inflight_meals']?></a></li>
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