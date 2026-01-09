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
	// sending query
	mysql_query("INSERT INTO sched3(uni, course_id, teacher_id, time_s_id, stime_s_id, atime_s_id, day_id, sday_id, aday_id, dept_id, adept_id, parent_id, php_tz, status)
	SELECT sched_id, course_id, teacher_id, time_s_id, stime_s_id, atime_s_id, day_id, sday_id, aday_id, dept_id, adept_id, parent_id, php_tz, status
	FROM sched WHERE sched_id NOT IN(SELECT uni FROM sched3);") or die(mysql_error());
	header("Location: admin-home");
?>