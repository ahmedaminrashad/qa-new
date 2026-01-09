<?php 
session_start();
require("../includes/dbconnection.php");
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
date_default_timezone_set($_SESSION['is']['teacher_time']);
$time_start = date("g:i:A", time(true));
$time_start1 = date('Y-m-d H:i:s');
$history = $_REQUEST['history_id'];
mysql_query("UPDATE class_history SET monitor_id = '3', activation = '$time_start', start_time = '$time_start1', end_time = '$time_start1' WHERE history_id = '$history'") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>