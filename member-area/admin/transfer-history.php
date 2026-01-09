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
date_default_timezone_set("Asia/Karachi");
$year1 = date('Y');
$month1 = date('m');
$month2 = date('m', strtotime('-1 month', strtotime(date("F") . "1")));
$month3 = date('m', strtotime('-2 month', strtotime(date("F") . "1")));
$month4 = date('m', strtotime('-3 month', strtotime(date("F") . "1")));
$month5 = date('m', strtotime('-4 month', strtotime(date("F") . "1")));
$month6 = date('m', strtotime('-5 month', strtotime(date("F") . "1")));
if($month2 > $month1){$year2 = $year1-1;} else{$year2 = $year1;}
if($month3 > $month2){$year3 = $year2-1;} else{$year3 = $year2;}
if($month4 > $month3){$year4 = $year3-1;} else{$year4 = $year3;}
if($month5 > $month4){$year5 = $year4-1;} else{$year5 = $year4;}
if($month6 > $month5){$year6 = $year5-1;} else{$year6 = $year5;}
$ddd1 = ''.$year1.'-'.$month1.'-01';
$ddd2 = ''.$year2.'-'.$month2.'-01';
$ddd3 = ''.$year3.'-'.$month3.'-01';
$ddd4 = ''.$year4.'-'.$month4.'-01';
$ddd5 = ''.$year5.'-'.$month5.'-01';
$ddd6 = ''.$year6.'-'.$month6.'-01';
mysql_query("INSERT INTO class_history_backup (parent_id, course_id, teacher_id, atime_s_id, stime_s_id, time_s_id, dept_id, lesson_id, lesson_discription, adept_id, alesson_id, additional_des, monitor_id, status, type, end_time, activation, teacher_remarks, sabaq, sabaqi, manzil, re_date_admin, re_date_teacher, re_date_student, re_status, date_admin, date_student, date_teacher, le_date_admin, le_date_student, le_date_teacher) SELECT parent_id, course_id, teacher_id, atime_s_id, stime_s_id, time_s_id, dept_id, lesson_id, lesson_discription, adept_id, alesson_id, additional_des, monitor_id, status, type, end_time, activation, teacher_remarks, sabaq, sabaqi, manzil, re_date_admin, re_date_teacher, re_date_student, re_status, date_admin, date_student, date_teacher, le_date_admin, le_date_student, le_date_teacher FROM class_history WHERE date_admin < '$ddd3'") or die(mysql_error());
mysql_query("DELETE FROM class_history WHERE date_admin < '$ddd3'") or die(mysql_error());
?>