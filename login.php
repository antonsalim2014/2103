<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/IM_CSS.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <title>SIT Facility Booking System</title>
      <!--  <style>
            body { padding-top:80px; }
        </style> -->
    </head>
    <body> 
        <!--        <div class="navbar-header">
                    <img src="images/logo.png" style="position:absolute;left:10px;top:10px;">
                </div>       		
        -->

        <!-- LOGIN PHP -->
        <?php include '/phpInclude/header.inc.php'; ?>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <h1 class="text-center login-title">Booking System</h1>
                        <form class="form-signin" role="form" action="login-process.php" method="POST">
                            <input type="text" name="MatricNo" class="form-control" placeholder="Matriculation No" required autofocus>
                            <br>
                            <input type="password" name="Password" class="form-control" placeholder="Password" required>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>

<?php include '/phpInclude/footer.inc.php'; ?>