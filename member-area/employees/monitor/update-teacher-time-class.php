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
		$a_timee =$_REQUEST['a_time'];
		$tdate =$_REQUEST['t_date'];
		$sdate =$_REQUEST['s_date'];
		$adate =$_REQUEST['a_date'];
		$p_id =$_REQUEST['parent_id'];
		$d_id =$_REQUEST['dept'];
		$ad_id =$_REQUEST['a_dept'];
		$history =$_REQUEST['history'];
		$leadate =$_REQUEST['admindate'];
		$letdate =$_REQUEST['teacherdate'];
		$lesdate =$_REQUEST['studentdate'];
		$mp =$_REQUEST['mp_id'];
			mysql_query ("UPDATE class_history SET date_teacher = '$tdate', date_student = '$sdate', time_s_id = '$t_timee', stime_s_id = '$s_timee', date_admin = '$adate', atime_s_id = '$a_timee', status = '18' WHERE history_id = '$history'") or die(mysql_error());
			if(mysql_query){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			else { echo 'There is some error please contact Faisal Farooq at fearfarooq@gmail.com'; }
?>