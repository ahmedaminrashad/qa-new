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
date_default_timezone_set("Asia/Karachi");
$sy11 = date('Y-m-d');
$rid =$_REQUEST['r_id'];
$cid =$_REQUEST['csrid'];
			mysql_query( "UPDATE new_request SET csr_id = '$cid', status = '7' where request_id = '$rid'") or die(mysql_error());
			if (mysql_query) {
			$result = mysql_query("SELECT * FROM csr_performance Where csr_id = '$cid' AND req_id = '$rid' AND status = '1'");
if (!$result) 
	{
    die("Issue in Data");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result);
if ($tnumberOfRows1 > 0){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{ mysql_query ("INSERT INTO csr_performance(req_id, csr_id, status, date)
					VALUES('$rid','$cid','1','$sy11')") or die(mysql_error());
 }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
