<?php include '/phpInclude/header.inc.php'; ?>

<?php

// Author: Terence Lim
// Date: 26 Aug 2015
// Simple PHP script for Database Demo
// Adapted from: https://azure.microsoft.com/en-us/documentation/articles/web-sites-php-sql-database-deploy-use-git/

// DB connection info
// TODO: ADD IN DB CONNECTION INFORMATION
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

$sql_select = "SELECT * FROM Account_User";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {
    echo "<h2>People who are registered:</h2>";
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Contact</th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['Name']."</td>";
        echo "<td>".$registrant['Email']."</td>";
        echo "<td>".$registrant['Contact']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}

?>