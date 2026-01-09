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
	$pid =$_REQUEST['n_id'];
	date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());

	mysql_query("UPDATE note_student SET status = '2', read_date = '$sy11', read_time = '$date11' WHERE note_id = '$pid'") or die(mysql_error());  	

	header("Location: make-regular-parent?ppid=$pid&ddid=$did&frr=$frs");
?>