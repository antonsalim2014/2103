<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT Booking Facility System  </title>

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>

        <script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>
        <link href="bootstrap-3.3.5-dist/css/sidebar.css" rel="stylesheet"/>
    </head>

    <body>
        <div class="page-container">
            <!-- top navbar -->
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h3>SIT Booking Facility System</h3>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-offcanvas row-offcanvas-left">
                    <!-- sidebar -->
                    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-4">
                        <h3>View Account Profile</h3>
                        <div class="navview">
                            <ul class="nav navbar-nav">         
                                <li>
                                    <label>Name: </label>
                                    <input  type="text" class="form-control" placeholder="" value="<?php echo "name" ?>" readonly>
                                </li>  
                                <li>
                                    <label>Martic number: </label>
                                    <input  type="text" class="form-control" placeholder="" value="<?php echo "marticNumber" ?>" readonly>
                                </li>    
                                <li >
                                    <label>Email</label>
                                    <div class="date">
                                        <input  type="text" class="form-control" placeholder="" value="<?php echo "email" ?>"  id="example1" readonly>
                                    </div>
                                </li>      
                            </ul>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>