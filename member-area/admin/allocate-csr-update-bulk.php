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
date_default_timezone_set("Africa/Cairo");
$rid =$_REQUEST['r_id'];
$myArray = explode(',', $rid);
for($i=0;$i<count($myArray);$i++){
$del_id = $myArray[$i];
$sy11 = date('Y-m-d');
$cid =$_REQUEST['csrid'];
			mysql_query( "UPDATE new_request SET csr_id = '$cid', status = '7' where request_id = '$del_id'") or die(mysql_error());
 mysql_query ("INSERT INTO csr_performance(req_id, csr_id, status, date)
					VALUES('$del_id','$cid','1','$sy11')") or die(mysql_error());
echo 'Allocated (<a href="'.$_SERVER["HTTP_REFERER"].'">Go back</a>)';
}
?>
