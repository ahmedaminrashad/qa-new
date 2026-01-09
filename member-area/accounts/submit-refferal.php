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
$sy11 = date('Y-m-d');
$date11 = date('h:i A', time());
$new_name =$_REQUEST['name'];
$new_email =$_REQUEST['email'];
$new_phone =$_REQUEST['phone'];
$new_skype =$_REQUEST['skype'];
$new_relation =$_REQUEST['relation'];
$new_comments =$_REQUEST['comments'];
$new_pid =$_REQUEST['p_id'];
$new_pname =$_REQUEST['p_name'];
mysql_query ("INSERT INTO new_request (name, email, phone, skype, message, date, time, site_id, parent_id, parent_name)
					VALUES('" . mysql_real_escape_string($new_name) . "','$new_email','" . mysql_real_escape_string($new_phone) . "','" . mysql_real_escape_string($new_skype) . "','" . mysql_real_escape_string($new_comments) . "','$sy11','$date11','0','$new_pid','$new_pname')");

header("Location: refer-a-friend?msg=1");
?>