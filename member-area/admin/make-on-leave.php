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
date_default_timezone_set("Africa/Cairo");
$data_date1 = date('Y-m-d', time());
?>
<?php
	$pid =$_REQUEST['p_id'];
	$date =$_REQUEST['date'];

	mysql_query("UPDATE account SET active = '7', leave_date = '$date' WHERE parent_id = '$pid'") or die(mysql_error());  	

	if(mysql_query){
 	
mysql_query("UPDATE course SET nature = '1', Teacher = '0', active = '7' WHERE parent_id = '$pid'") or die(mysql_error());
mysql_query("DELETE FROM sched WHERE parent_id = '$pid'") or die(mysql_error());
mysql_query("DELETE FROM class_history WHERE parent_id = '$pid' AND date_admin >= '$data_date1' AND monitor_id = '1'") or die(mysql_error());
	header('Location: email-general?pid='.$pid.'&type=email-onleave-account-temp&leavedate='.$date.'');
}
?>