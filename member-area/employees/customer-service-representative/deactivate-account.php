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
date_default_timezone_set("Asia/Karachi");
$time_start = date("h:i:s A", time(true));
?>
<?php
date_default_timezone_set("Asia/Karachi");
$data_date1 = date('Y-m-d', time());
	$pid =$_REQUEST['t_id'];
	$adate =$_REQUEST['date'];

	mysql_query("UPDATE account SET active = '3', dept_id = '1003', deactivation_date = '$adate' WHERE parent_id = '$pid'") or die(mysql_error());  	

	mysql_query("UPDATE course SET nature = '2', Teacher = '0', active = '7' WHERE parent_id = '$pid'") or die(mysql_error());  	
 	
	mysql_query("DELETE FROM sched WHERE parent_id = '$pid'") or die(mysql_error());
	
	mysql_query("DELETE FROM class_history WHERE parent_id = '$pid' AND date_admin >= '$data_date1' AND monitor_id = '1'") or die(mysql_error());
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>