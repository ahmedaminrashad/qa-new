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
?>
<?php
	$teacher_time =$_REQUEST['timeid'];
	$student_time =$_REQUEST['studentid'];
	$teach_id =$_REQUEST['teacherid'];
	$student_id =$_REQUEST['s_id'];
	$link =$_REQUEST['link'];

	mysql_query("UPDATE sched SET time_s_id = '$teacher_time', atime_s_id = '$teacher_time', stime_s_id = '$student_time', teacher_id = '$teach_id' WHERE course_id = '$student_id'") or die(mysql_error());
	
	mysql_query("UPDATE course SET Teacher = '$teach_id' WHERE course_id = '$student_id'") or die(mysql_error());
	
	header("Location: $link");
?>