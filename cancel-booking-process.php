<?php include '/phpInclude/header.inc.php'; ?>
<?php
session_start();

// DB connection variable

require_once('protected/config.php');

// Connecting to database
try {
    $conn = new PDO( "sqlsrv:Server= ". DBHOST ."; Database = " . DBNAME , DBUSER, DBPASS);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}

// SQL command and get data
$sql_select = "UPDATE booking SET statuscode = 'CN' WHERE bookingID ='" . $_GET['bid'] . "'";
$stmt = $conn->query($sql_select);
header("Location: viewbooking.php");

?>

