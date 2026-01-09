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
		$t_timee1 =$_REQUEST['t_time1'];
		$t_timee2 =$_REQUEST['t_time2'];
		$t_timee3 =$_REQUEST['t_time3'];
		$t_timee4 =$_REQUEST['t_time4'];
		$t_timee5 =$_REQUEST['t_time5'];
		$t_timee6 =$_REQUEST['t_time6'];
		$t_timee7 =$_REQUEST['t_time7'];
		$s_timee1 =$_REQUEST['s_time1'];
		$s_timee2 =$_REQUEST['s_time2'];
		$s_timee3 =$_REQUEST['s_time3'];
		$s_timee4 =$_REQUEST['s_time4'];
		$s_timee5 =$_REQUEST['s_time5'];
		$s_timee6 =$_REQUEST['s_time6'];
		$s_timee7 =$_REQUEST['s_time7'];
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

		
if ($wtday1 == 1 OR $wtday1 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday1','$wsday1','$t_timee1','$s_timee1','$wtday1','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
if ($wtday2 == 1 OR $wtday2 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday2','$wsday2','$t_timee2','$s_timee2','$wtday2','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
if ($wtday3 == 1 OR $wtday3 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday3','$wsday3','$t_timee3','$s_timee3','$wtday3','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
if ($wtday4 == 1 OR $wtday4 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday4','$wsday4','$t_timee4','$s_timee4','$wtday4','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
if ($wtday5 == 1 OR $wtday5 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday5','$wsday5','$t_timee5','$s_timee5','$wtday5','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
if ($wtday6 == 1 OR $wtday6 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday6','$wsday6','$t_timee6','$s_timee6','$wtday6','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
if ($wtday7 == 1 OR $wtday7 > 1){
			mysql_query ("INSERT INTO sched(course_id, teacher_id, room_id, day_id, sday_id, time_s_id, stime_s_id, aday_id, atime_s_id, parent_id, dept_id, adept_id, php_tz, status)
					VALUES('$s_id','$t_id','1','$wtday7','$wsday7','$t_timee7','$s_timee7','$wtday7','$t_timee', '$p_id', '$d_id', '$ad_id', '$php_id', '$active1')") or die(mysql_error()); 
			}
			header("Location: send-schedule-sms?tech=$t_id&stu=$s_id&ttime=$t_timee&td1=$wtday1&td2=$wtday2&td3=$wtday3&td4=$wtday4&td5=$wtday5&td6=$wtday6&td7=$wtday7");
?>