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
$sy = date('Y-m-d h:i:sa');

	$tkid =$_REQUEST['new_id'];
	$com =$_REQUEST['comment'];
	$user =$_REQUEST['usertk_id'];
	mysql_query("UPDATE task_creator SET status = '1' WHERE task_id = '$tkid'") or die(mysql_error());
	
	mysql_query ("INSERT INTO task_string (task_id, user, msg, date)
					VALUES('$tkid', '$user', '" . mysql_real_escape_string($com) . "', '$sy')") or die(mysql_error()); 
					 header('Location: ' . $_SERVER['HTTP_REFERER']);
?>