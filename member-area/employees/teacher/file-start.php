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
$time_start = date('Y-m-d H:i:s');
?>
<?php
	$history =$_REQUEST['history_id'];
	mysql_query("UPDATE class_history SET monitor_id = '3', start_time = '$time_start', end_time = '$time_start' WHERE history_id = '$history'") or die(mysql_error());  	
	header("Location: teacher-home");
?>