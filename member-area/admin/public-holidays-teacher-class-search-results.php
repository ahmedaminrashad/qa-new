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
//$date = date('Y-m-d', time());
//$day = date('N', time());
$teacher =$_REQUEST['teacher'];
  $date =$_REQUEST['date'];
  $day =$_REQUEST['day'];
  $des =$_REQUEST['msg'];
mysql_query("UPDATE class_history SET monitor_id = '21', lesson_discription = '$des' WHERE status < 19 AND monitor_id = 1 AND date_admin = '$date' AND teacher_id IN ($teacher)") or die(mysql_error());
header('Location: admin-home');
?>