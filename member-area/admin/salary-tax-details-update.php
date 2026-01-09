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
include("../includes/session1.php");
require ("../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$tax =$_REQUEST['tax'];
$sid =$_REQUEST['sal_id'];
			mysql_query( "UPDATE teacher_salary SET tax = '$tax' where salary_id = '$sid'") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
