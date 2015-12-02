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

$sql_select = "SELECT Time_Range FROM timing WHERE Time_Range NOT IN 
				(SELECT BookingTime FROM booking 
					WHERE BookingDate = '" . $_GET['date'] . "' 
					AND FacilityID = '" . $_GET['fid'] . "'
					AND StatusCode IN ('AC', 'OG'))";
$stmt = $conn->query($sql_select);
$timeResults = $stmt->fetchAll();
$data = [];
if (count($timeResults) > 0) {
    foreach ($timeResults as $timeResult) {
        array_push($data,['Time_Range' => $timeResult['Time_Range']]);
    }
    header('Content-type: application/json');
    echo json_encode($data);
} else {
    header('Content-type: application/json');
    echo json_encode($data);
}
?>