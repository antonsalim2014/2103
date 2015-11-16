<?php include '/phpInclude/header.inc.php'; ?>
<?php
$matricNo = strtolower(trim($_POST['MatricNo']));
$pass = trim($_POST['Password']);
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

// SQL command
$sql_select = "SELECT DISTINCT Matriculation_No, UserPassword FROM userAccount WHERE Matriculation_No = '$matricNo'";
$stmt = $conn->query($sql_select);
$user = $stmt->fetchAll(); 

// default redirected location for login-process.
header("Location: login.php");

if(count($user) > 0){
    foreach($user as $user1) {
       if(strtolower($user1['Matriculation_No']) == $matricNo && $user1['UserPassword'] == $pass){ 
          // Successful login, redirect to Home.php
		  header("Location: Home.php");
	   }
	}
}
?>

