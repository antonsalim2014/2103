<?php include '/phpInclude/header.inc.php'; ?>
<?php
$emailAdd = trim($_POST['Email']);
$pass = trim($_POST['Password']);
// DB connection variable
$host = "yeoenghuat.database.windows.net";
$user = "enghuat";
$pwd = "adminpass1!";
$db = "sitdatabase";

// Connecting to database
try {
    $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}

// SQL command
$sql_select = "SELECT DISTINCT Email, UserPassword FROM userAccount WHERE Email = '$emailAdd'";
$stmt = $conn->query($sql_select);
$user = $stmt->fetchAll(); 

// default redirected location for login-process.
header("Location: login.php");

if(count($user) > 0){
    foreach($user as $user1) {
       if($user1['Email'] == $emailAdd && $user1['UserPassword'] == $pass){ 
          // Successful login, redirect to Home.php
		  header("Location: Home.php");
	   }
	}
}
?>