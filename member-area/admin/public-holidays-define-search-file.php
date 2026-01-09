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
$date = date('Y-m-d', time());
$msg =$_POST['msg'];
$teacher =$_POST['checkbox'];
  $c =$_POST['date'];
  $posted_date = strtotime($c);
$posted_day = date('N', $posted_date);
  if ($c > $date)
  		{
  		header('Location: public-holidays-advance-class?&teacher='.implode(',', array_map('intval', $teacher)).'&date='.$c.'&day='.$posted_day.'&msg='.$msg.'');
  		}
  else 	{
  		header('Location: public-holidays-teacher-class-search-results?&teacher='.$teacher.'&date='.$c.'&check=1&msg='.$msg.'');
  		}
?>