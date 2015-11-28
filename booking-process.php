<?php include '/phpInclude/header.inc.php'; ?>
<?php
session_start();

$userID = $_SESSION['userID'];
$bDate = $_POST['bDate'];
$bFacility = $_POST['bFacility'];
$bTime = $_POST['bTime'];

echo $bDate . $bFacility . $bTime . $userID;
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
$sql_select = "INSERT INTO booking (BookingDate, FacilityID, UserID, StatusCode, BookingTime)VALUES ('$bDate', '$bFacility', '$userID', 'AC', '$bTime')";
$stmt = $conn->query($sql_select);
header("Location: viewbooking.php");

?>

