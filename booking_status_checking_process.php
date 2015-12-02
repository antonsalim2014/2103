<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once('protected/config.php');
// Connecting to database
try {
    $conn = new PDO("sqlsrv:Server= " . DBHOST . "; Database = " . DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(var_dump($e));
}
date_default_timezone_set("Asia/Singapore");
$mydate=getdate(date("U"));
$timing = array();
for($t = 0; $t <= $mydate['hours']; $t++)
{
	$time = "";
	if($t < 10)
	{
		$time = "'0" . $t . ":00-0" . ($t+1) . ":00'";
	}
	else
	{
		$time = "'" . $t . ":00-" . ($t+1) . ":00'";
	}
	array_push($timing, $time);
}

$sql_select = "UPDATE booking SET statuscode = 'EX' WHERE bookingdate < '" . $mydate['year'] . "-" . $mydate['mon'] . "-" . $mydate['mday'] ."'";
$stmt = $conn->query($sql_select);

$sql_select1 = "UPDATE booking SET statuscode = 'EX' WHERE bookingdate = '" . $mydate['year'] . "-" . $mydate['mon'] . "-" . $mydate['mday'] ."' AND bookingtime in (" . implode(", ", $timing) . ")";
$stmt = $conn->query($sql_select1);

$singleTime = '';
if($mydate['hours'] < 10)
{
	$singleTime = "'0" . $mydate['hours'] . ":00-0" . ($mydate['hours']+1) . ":00'";
}
else
{
	$singleTime = "'" . $mydate['hours'] . ":00-" . ($mydate['hours']+1) . ":00'";
}
$sql_select2 = "UPDATE booking SET statuscode = 'OG' WHERE bookingdate = '" . $mydate['year'] . "-" . $mydate['mon'] . "-" . $mydate['mday'] ."' AND bookingtime=" . $singleTime;
$stmt = $conn->query($sql_select2);

echo json_encode(array(['Success'=>'1']));
?>