<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h6><?php echo $sidenav['welcome']?> ,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading"><?php echo $sidenav['main']?></span>
        <ul class="list-unstyled">
                <li><a href="home.php"> <i class="fa fa-home"></i><?php echo $sidenav['home']?> </a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'music' ? ' active' : '' ?>"><a href="music.php?action=music"> <i class="fa fa-music"></i><?php echo $sidenav['music']?></a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'movies' ? ' active' : '' ?>"><a href="movies.php?action=movies"> <i class="fa fa-play"></i><?php echo $sidenav['movies']?></a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'series' ? ' active' : '' ?>"><a href="series.php?action=series"> <i class="fa fa-play-circle"></i><?php echo $sidenav['series']?></a></li>
                <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i><?php echo $sidenav['shop']?></a></li>
                <li><a href="shop/inflight.php"> <i class="fa fa-cutlery"></i><?php echo $sidenav['inflight_meals']?></a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'philippineairlinesplus' ? ' active' : '' ?>"><a href="philippineairlinesplus.php?action=philippineairlinesplus"> <i class="fa fa-plane"></i><?php echo $sidenav['airline_plus']?></a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'games' ? ' active' : '' ?>"><a href="games.php?action=games"> <i class="fa fa-gamepad"></i><?php echo $sidenav['games']?></a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'news' ? ' active' : '' ?>"><a href="news.php?action=news"> <i class="fa fa-file"></i><?php echo $sidenav['news']?></a></li>

        </ul><span class="heading"><?php echo $sidenav['user']?></span>
        <ul class="list-unstyled">
          <li> <a href="myfinance.php"> <i class="fa fa-credit-card"></i><?php echo $sidenav['my_finance']?></a></li>
          <li><a href="shop/my-account.php"><i class="icon fa fa-user"></i><?php echo $sidenav['my_account']?></a></li>
        </ul>
      </nav>