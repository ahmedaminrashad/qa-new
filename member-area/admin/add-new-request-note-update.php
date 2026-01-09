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
			$req_id= $_POST['reqid'];
		 	$msg= $_POST['comment'];
		 	$date= $_POST['dateid'];
			mysql_query ("INSERT INTO new_request_comments (request_id, comment, date)
					VALUES('$req_id', '" . mysql_real_escape_string($msg) . "', '$date')") or die(mysql_error()); 
					header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
