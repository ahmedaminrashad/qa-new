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
 date_default_timezone_set("Asia/Karachi");
$time_start = date('Y-m-d H:i:s');
  $ai =$_REQUEST['attend'];
  $history_id =$_REQUEST['history_id'];
  if ($ai == 4){$des_id = 'I have been waiting for whole class time.';} 
  elseif ($ai == 5){$des_id = 'Student/Admin has informed in advance for the leave.';}
  elseif ($ai == 6){$des_id = 'Declined by Student/Parent.';}
  mysql_query("UPDATE class_history SET monitor_id = '$ai', start_time = '$time_start', end_time = '$time_start', lesson_discription = '$des_id' WHERE history_id = '$history_id'") or die(mysql_error());
					header('Location: ' . $_SERVER['HTTP_REFERER']);
?>