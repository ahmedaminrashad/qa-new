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
include("../includes/session.php");
require ("../includes/dbconnection.php");
			$leaveid= $_POST['leave_id'];
		 	$status_id= $_POST['status_id'];
		 	$remarks= $_POST['remarks'];
			mysql_query ("UPDATE leave_app SET status = '$status_id', manager_remarks = '" . mysql_real_escape_string($remarks) . "' WHERE leave_id = '$leaveid'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
