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
?>
<?php
$m =$_REQUEST['month'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
	mysql_query("INSERT INTO invoice(parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id)
	SELECT parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id
	FROM payment;") or die(mysql_error());  	
	header("Location: mailing_list?due=$dd&month=$m&year=$y");
?>