<?php session_start(); ?>
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
<?php
require ("../includes/dbconnection.php");
date_default_timezone_set("Asia/Karachi");
$sy11 = date('Y-m-d');
$time_start = date('h:i a', time());
$rid =$_REQUEST['class_id'];
$cid =$_REQUEST['feed'];
$mid =$_REQUEST['m_id'];
			mysql_query( "UPDATE complaint SET feed = '" . mysql_real_escape_string($cid) . "', cn_id = '2', feed_date = '$sy11', feed_time = '$time_start', feed_id = '$mid' where com_id = '$rid'") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
