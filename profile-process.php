<?php include '/phpInclude/header.inc.php'; ?>
<?php

$userID = $_SESSION['userID'];
$newPass = $_POST['password'];

require_once('protected/config.php');

// Connecting to database
try {
    $conn = new PDO("sqlsrv:Server= " . DBHOST . "; Database = " . DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(var_dump($e));
}

// SQL command and get data
$sql_select = "UPDATE userAccount SET UserPassword= '$newPass' WHERE UserID = '$userID'";
$stmt = $conn->query($sql_select);
header("Location: viewProfile.php");
$_SESSION['update'] = 'true';
?>
