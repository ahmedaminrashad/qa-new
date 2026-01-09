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
date_default_timezone_set("Asia/Karachi");
$date_check = date('Y-m-d', time());
$teacher =$_REQUEST['pteacher'];
  $date =$_REQUEST['date'];
  $time =$_REQUEST['time_id'];
  $posted_date = strtotime($date);
$posted_day = date('N', $posted_date);
  if ($date > $date_check)
  		{
  		header('Location: search-advance-class?&teacher='.$teacher.'&date='.$date.'&day='.$posted_day.'&time='.$time.'');
  		}
  else {
  if (!empty($teacher) && !empty($date) && !empty($time)) 
  		{
  		header('Location: teacher_date_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && !empty($date) && !empty($time)) 
  		{
  		header('Location: date_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && empty($date) && !empty($time)) 
  		{
  		header('Location: teacher_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && !empty($date) && empty($time)) 
  		{
  		header('Location: teacher_date?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && empty($date) && !empty($time)) 
  		{
  		header('Location: time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && !empty($date) && empty($time)) 
  		{
  		header('Location: date?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && empty($date) && empty($time)) 
  		{
  		header('Location: teacher?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  else header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=1');
  	}
?>