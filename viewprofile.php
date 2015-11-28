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

        <?php
        include "./phpInclude/header.inc.php";
        // azure connection variable
        require_once('protected/config.php');

        // Connecting to database
        try {
            $conn = new PDO("sqlsrv:Server= " . DBHOST . "; Database = " . DBNAME, DBUSER, DBPASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die(var_dump($e));
        }
        
        if($_SESSION['update'] == 'true'){
            echo '<script>';
            echo 'alert("Password updated Successfully!")';
            echo '</script>';
            $_SESSION['update'] = 'false';
        }
        ?>
        <div class="page-container">
            <!-- top navbar -->
            <!--            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
            -->
            <div class="container">
                <div class="row row-offcanvas row-offcanvas-left">
                    <!-- sidebar -->
                    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                        <?php include '/phpInclude/sidebar.inc.php'; ?>
                    </div>

                    <!-- main area -->
                    <div class="col-xs-12 col-sm-9">
                        <h1 class="page-header">View Profile</h1>
                        <form action="profile-process.php" method="POST">
                            <div class="navview">
                                <ul class="nav navbar-nav">                                
                                    <?php
                                    // SQL command and get data
                                    $sql_select = "SELECT DISTINCT Name, Matriculation_No, Email, Contact FROM userAccount WHERE Matriculation_No = '" . $_SESSION['matricNo'] . "'";
                                    $stmt = $conn->query($sql_select);
                                    $user = $stmt->fetchAll();
                                    if (count($user) > 0) {
                                        foreach ($user as $row) {
                                            echo '<li>';
                                            echo '   <label>Name: </label>';
                                            echo '   <div class="name">';
                                            echo '      <input size="30" type="text" class="form-control" placeholder="" value="' . $row['Name'] . '" readonly>';
                                            echo '   </div>';
                                            echo '</li>';
                                            echo '<br>';
                                            echo '<li>';
                                            echo '   <label>Martic number: </label>';
                                            echo '   <div class="matricNo">';
                                            echo '      <input size="30" type="text" class="form-control" placeholder="" value="' . $row['Matriculation_No'] . '" readonly>';
                                            echo '   </div>';
                                            echo '</li>';
                                            echo '<br>';
                                            echo ' <li >';
                                            echo '   <label>Email: </label>';
                                            echo '   <div class="date">';
                                            echo '        <input size="30" type="text" class="form-control" placeholder="" value="' . $row['Email'] . '" readonly>';
                                            echo '   </div>';
                                            echo '</li>';
                                            echo '<br>';
                                            echo '<li >';
                                            echo '   <label>Contact No: </label>';
                                            echo '   <div class="date">';
                                            echo '       <input size="30" type="text" class="form-control" placeholder="" value="' . $row['Contact'] . '" readonly>';
                                            echo '   </div>';
                                            echo '</li>';
                                            echo '<br>';
                                            echo '<li >';
                                            echo '<label>Password: </label>';
                                            echo '   <div class="Password">';
                                            echo '       <input size="30" name="password"type="password" class="form-control" placeholder="Update new password" value="" required>';
                                            echo '   </div>';
                                            echo '</li>';
                                            echo '<br>';
                                            echo '<li>';
                                            echo '<div class="form-group">';
                                            echo '<br>';
                                            echo '<button type="submit" id="submitBtn" class="btn btn-primary" value="Update">Update</button>';
                                            echo '</div>';
                                            echo '</li>';
                                        }
                                    }
                                    ?>
                                </ul>           
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>