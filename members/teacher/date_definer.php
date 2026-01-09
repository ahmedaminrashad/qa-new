<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
date_default_timezone_set($_SESSION['is']['teacher_time']);
$date_check = date('Y-m-d');
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