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
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require("../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$time_start = date(" g:i:A", time(true));

$pid = $_REQUEST['parent_id'];
if ($_SESSION['is']['admin']) {
    mysql_query("UPDATE class_history SET monitor_id = '1' WHERE history_id = '$pid'") or die(mysql_error());
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>