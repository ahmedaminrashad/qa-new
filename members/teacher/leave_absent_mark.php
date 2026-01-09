<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
 date_default_timezone_set($TimeZoneCustome);
$time_start = date('Y-m-d H:i:s');
  $studentID =$_REQUEST['studentID'];
  $parentID =$_REQUEST['parentID'];
  $teacherID =$_REQUEST['teacherID'];
  $Adate =$_REQUEST['Adate'];
  $date =$_REQUEST['date'];
  $time =$_REQUEST['time'];
  $ai =$_REQUEST['attend'];
  $history_id =$_REQUEST['history_id'];
  if ($ai == 4){$des_id = 'I have been waiting for whole class time.';} 
  elseif ($ai == 5){$des_id = 'Student/Admin has informed in advance for the leave.';}
  elseif ($ai == 6){$des_id = 'Declined by Student/Parent.';}
  $sql = "UPDATE class_history SET monitor_id = '$ai', start_time = '$time_start', end_time = '$time_start', lesson_discription = '$des_id' WHERE history_id = '$history_id'";
  if ($conn->query($sql) === TRUE) {
  echo '';
  }
					//header('Location: ' . $_SERVER['HTTP_REFERER']);
					if ($ai == 4){ echo '<script>window.open("absent-email?studentID='.$studentID.'&parentID='.$parentID.'&teacherID='.$teacherID.'&date='.$date.'&time='.$time.'&Adate='.$Adate.'&historyID='.$history_id.'","_self")</script>'; }
					if ($ai == 5){ echo '<script>window.open("teacher-home","_self")</script>'; }
					if ($ai == 6){ echo '<script>window.open("01-check-sub?parent_id='.$ppis.'","_self")</script>'; }
?>