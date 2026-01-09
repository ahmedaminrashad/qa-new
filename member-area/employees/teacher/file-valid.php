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
	$history =$_REQUEST['history_id'];
	mysql_query("UPDATE class_history SET monitor_id = '1', activation = '00:00:00', start_time = '0000-00-00 00:00:00', end_time = '0000-00-00 00:00:00' WHERE history_id = '$history'") or die(mysql_error());  	
	header("Location: teacher-home");
?>