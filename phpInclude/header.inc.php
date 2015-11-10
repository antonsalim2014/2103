<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!(isset($_SESSION['email']) && $_SESSION['password'] != '')) 
{
	if($_SERVER['PHP_SELF'] != "/2103Mini-Pro/login.php") //Prevent double redirect on login page
		header ("Location: login.php");
}
else
{
	header ("Location: home.php");
}
?>
        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.5-dist/css/IM_CSS.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/style.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.5-dist/css/designTemplate.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        