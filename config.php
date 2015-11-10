< ?php
	$mysql_hostname = "<YourHostName>";
	$mysql_user = "<YourUserName>";
	$mysql_password = "<YourPassWord>";
	$mysql_database = "<YourDataBaseName>";
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
	or die("Opps some thing went wrong");
	mysql_select_db($mysql_database, $bd) or die("Unable to connect to the world most powerful database.");
?>