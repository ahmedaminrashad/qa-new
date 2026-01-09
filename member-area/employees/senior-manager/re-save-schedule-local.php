<?php
  require ('../includes/dbconnection.php');
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
		$t_id =$_REQUEST['teacher'];
		$s_id =$_REQUEST['student'];
		$t_timee =$_REQUEST['t_time'];
		$s_timee =$_REQUEST['s_time'];
		$wtday1 =$_REQUEST['td1'];
		$wtday2 =$_REQUEST['td2'];
		$wtday3 =$_REQUEST['td3'];
		$wtday4 =$_REQUEST['td4'];
		$wtday5 =$_REQUEST['td5'];
		$wtday6 =$_REQUEST['td6'];
		$wtday7 =$_REQUEST['td7'];
		$wsday1 =$_REQUEST['sd1'];
		$wsday2 =$_REQUEST['sd2'];
		$wsday3 =$_REQUEST['sd3'];
		$wsday4 =$_REQUEST['sd4'];
		$wsday5 =$_REQUEST['sd5'];
		$wsday6 =$_REQUEST['sd6'];
		$wsday7 =$_REQUEST['sd7'];
		$p_id =$_REQUEST['parent_id'];
		$d_id =$_REQUEST['dept_id'];
		$ad_id =$_REQUEST['adept_id'];
		$php_id =$_REQUEST['time_php'];
		$active1 =$_REQUEST['active'];

		
if ($wtday1 == 1){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday1','$wsday1','$t_timee','$s_timee','$wtday1','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
if ($wtday2 == 2){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday2','$wsday2','$t_timee','$s_timee','$wtday2','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
if ($wtday3 == 3){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday3','$wsday3','$t_timee','$s_timee','$wtday3','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
if ($wtday4 == 4){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday4','$wsday4','$t_timee','$s_timee','$wtday4','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
if ($wtday5 == 5){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday5','$wsday5','$t_timee','$s_timee','$wtday5','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
if ($wtday6 == 6){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday6','$wsday6','$t_timee','$s_timee','$wtday6','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
if ($wtday7 == 7){
			mysql_query ("INSERT INTO sched3(uni, course_id, teacher_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status, mnt_id, type)
					VALUES('1', '$s_id','$t_id','$wtday7','$wsday7','$t_timee','$s_timee','$wtday7','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '19', '11', '2')") or die(mysql_error()); 
			}
			header("Location: send-schedule-sms?tech=$t_id&stu=$s_id&ttime=$t_timee&td1=$wtday1&td2=$wtday2&td3=$wtday3&td4=$wtday4&td5=$wtday5&td6=$wtday6&td7=$wtday7");
?>