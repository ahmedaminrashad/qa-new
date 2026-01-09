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

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
date_default_timezone_set("Africa/Cairo");
$time_start = date(" g:i:A", time(true));
?>
<?php
	// sending query
	mysql_query("TRUNCATE TABLE payment") or die(mysql_error());
?>
<?php
$m =$_REQUEST['month'];
$isd =$_REQUEST['issue'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
$date = date('d-m-Y', time());
	mysql_query("INSERT INTO payment (parent_id, parent_name, fee, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id)
	SELECT parent_id, parent_name, fee, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id
	FROM account WHERE active = 1 AND payment_cycle = 15") or die(mysql_error());  
	if(mysql_query){
	mysql_query ("UPDATE payment SET issue = '$date', due = '$dd', submit = '00-00-0000', mon_id = '$m', y_id = '$y'") or die(mysql_error());
	mysql_query("delete from payment where exists (select 1 from invoice where payment.parent_id = invoice.parent_id and payment.mon_id = invoice.mon_id and payment.y_id = invoice.y_id)") or die(mysql_error());
header("Location: confirm-monthly-invoice?due=$dd&month=$m&year=$y");
}
?>