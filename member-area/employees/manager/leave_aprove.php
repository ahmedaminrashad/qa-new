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
$time_start = date(" g:i:A", time(true));
?>
<?php
	$pid =$_REQUEST['leave_id'];
	$date = date('d-m-Y', time());
	mysql_query("UPDATE applica SET status = '9', objection = 'Nil' WHERE leave_id = '$pid'") or die(mysql_error());  	
	header("Location: leave_app.php");
?>