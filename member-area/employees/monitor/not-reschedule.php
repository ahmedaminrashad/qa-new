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
  $o_id =$_REQUEST['original_id'];
  $h_id =$_REQUEST['his_id'];  
mysql_query("UPDATE class_history SET re_status = 1 WHERE history_id = '$o_id'") or die(mysql_error());
mysql_query("DELETE FROM class_resched WHERE history_id = '$h_id'") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>