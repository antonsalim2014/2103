<!DOCTYPE html>
<!-- LOGIN PHP -->
<?php include '/phpInclude/header.inc.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIT Facility Booking System</title>
	<style>
            body { padding-top:80px; }
	</style>
    </head>
    <body> 
    <div class="navbar-header">
        <img src="images/logo.png" style="position:absolute;left:10px;top:10px;">
    </div>       		

    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <h1 class="text-center login-title">Booking System</h1>
                <form class="form-signin">
                <input type="text" class="form-control" placeholder="Email" required autofocus>
				<br>
                <input type="password" class="form-control" placeholder="Password" required>
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