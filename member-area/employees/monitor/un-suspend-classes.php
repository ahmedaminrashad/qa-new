<?php

  require ("../includes/dbconnection.php");  
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$data_date1 = date('Y-m-d', time());
	$pid =$_REQUEST['t_id'];
	$link =$_REQUEST['link'];

	mysql_query("UPDATE account SET active = '1' WHERE parent_id = '$pid'") or die(mysql_error());
	
	mysql_query("UPDATE course SET active = 1 WHERE parent_id = $pid") or die(mysql_error());
	
	mysql_query("UPDATE sched SET status = 1 WHERE parent_id = $pid") or die(mysql_error());
	
	mysql_query("UPDATE class_history SET status = '1' WHERE parent_id = '$pid' AND date_admin >= '$data_date1'") or die(mysql_error());

	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>