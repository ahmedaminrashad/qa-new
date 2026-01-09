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
$man =$_REQUEST['man'];
$tech =$_REQUEST['tech'];
			mysql_query( "UPDATE profile SET manager_id = '$man' where teacher_id = '$tech'") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
