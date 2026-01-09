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
if (empty($session)) { session_start(); }
include("../includes/session.php");
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");date_default_timezone_set($_SESSION['is']['teacher_time']);
$date_check = date('Y-m-d', time());
$teacher =$_REQUEST['pteacher'];
  $date =$_REQUEST['date'];
  $time =$_REQUEST['time_id'];
  $posted_date = strtotime($date);
$posted_day = date('N', $posted_date);
  if ($date > $date_check)
  		{
  		header('Location: search-advance-class?teacher='.$teacher.'&date='.$date.'&day='.$posted_day.'&time='.$time.'');
  		}
  elseif ($date == $date_check)
  		{
  		header('Location: teacher-home');
  		}
  else
  		{
  		header('Location: teacher-daily-report-by-date-past?teacher='.base64_encode($teacher).'&date='.base64_encode($date).'');
  		}
?>