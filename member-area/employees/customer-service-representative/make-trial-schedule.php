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
	$pid =$_REQUEST['pidf'];
	$tsu =$_REQUEST['at'];

	mysql_query("UPDATE sched SET status = $tsu WHERE course_id = $pid") or die(mysql_error());  	

	header("Location: make-trial-schedule3?pids=$pid&ats=$tsu");

?>