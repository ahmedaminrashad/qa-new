<?php
  require ("../includes/dbconnection.php");  
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
date_default_timezone_set($TimeZoneCustome);
$time_start = date(" g:i:A", time(true));
$date = date('Y-m-d', time());
$mon = date('n');
$sy = date('Y');
$oid =$_REQUEST['sale_id'];
	$price =$_REQUEST['item_list_amount_1'];
	$pid =$_REQUEST['vendor_order_id'];
			$result = mysql_query("UPDATE account SET invoice_type = '1' where parent_id = '$pid'");

header("Location: ind_details");
?>