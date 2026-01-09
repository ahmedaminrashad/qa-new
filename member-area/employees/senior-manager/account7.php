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
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['ppt'];
	$sid =$_REQUEST['Course_ID'];

	mysql_query("UPDATE account SET active = '1', dept_id = '1002' WHERE parent_id = '$pid'") or die(mysql_error());  	

	header("Location: student_inactive2?Course_ID=$sid");
?>