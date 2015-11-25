<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="bootstrap-3.3.5-dist/css/sidebar.css" rel="stylesheet"/>

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>      
        </div>
		<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
		
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<li <?php if($currentPage == "viewprofile.php" || $currentPage == "viewbooking.php" || $currentPage == "booking.php") echo 'class="active"' ?> class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $_SESSION['Name']; ?></b><span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li <?php if($currentPage == "viewprofile.php") echo 'class="active"' ?>><a href="./viewprofile.php">Account Details</a></li>
                        <li class="divider"></li>
                        <li <?php if($currentPage == "viewbooking.php") echo 'class="active"' ?>><a href="./viewbooking.php">My Booking</a></li>
                    </ul>
                </li>
                <li <?php if($currentPage == "index.php") echo 'class="active"' ?>><a href="./index.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>                      
                <li <?php if($currentPage == "booking.php") echo 'class="active"' ?>><a href="./booking.php"><span class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span>New Booking</a></li>      
                <li <?php if($currentPage == "logout.php") echo 'class="active"' ?>><a href="./logout.php">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </div>
</nav>