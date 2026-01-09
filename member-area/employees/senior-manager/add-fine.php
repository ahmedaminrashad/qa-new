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
$ft =$_REQUEST['t_id'];
$fa =$_REQUEST['amount'];
$fdes =$_REQUEST['des'];
$fd =$_REQUEST['date'];
$fty =$_REQUEST['type'];
			mysql_query ("INSERT INTO teacher_fine (teacher_id, date, amount, des, type)
					VALUES('$ft', '$fd', '$fa', '$fdes', '$fty')") or die(mysql_error()); 
					header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
