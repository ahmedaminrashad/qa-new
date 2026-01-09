<?php
// Include guard to prevent multiple includes
if (defined('MONITORING_FUNCTIONS_LOADED')) {
    return;
}
define('MONITORING_FUNCTIONS_LOADED', true);

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
if (!function_exists('ratio')) {
function ratio($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND (monitor_id = $sr OR monitor_id = 4 )");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0%';
			}
		else if ($tnumberOfRows > 0) 
			{
	$result = mysql_query("SELECT * FROM sched Where course_id = $cr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0){
			echo 'N-A';
			}
		else if ($numberOfRows > 0) 
			{
			$total = $numberOfRows*4;
			$rate = $tnumberOfRows/$total;
			$figure = $rate*100;
			echo ''.mb_substr($figure, 0, 5).'%';
			}
			}

	}
}
if (!function_exists('schedule_classes')) {
function schedule_classes($cr)
{
// sending query
   $result = mysql_query("SELECT * FROM sched Where course_id = $cr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			}
	}
}
if (!function_exists('classes')) {
function classes($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			}
	}
}
if (!function_exists('today')) {
function today($var1, $var2)
{
$result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$var1' and monitor_id = '$var2'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows;
}
}
if (!function_exists('time1')) {
function time1($var){
$result1 = mysql_query("SELECT * FROM timestart Where time_s_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '0';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$i = 0; // Initialize row index
					$hidden_tt = MYSQL_RESULT($result1,$i,"time_s");
	
			  		echo $hidden_tt;
			}
}
}
if (!function_exists('StudentName')) {
function StudentName($var){
$result1 = mysql_query("SELECT * FROM course Where course_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$i = 0; // Initialize row index
					$hidden_tt = MYSQL_RESULT($result1,$i,"course_yrSec");
	
			  		echo $hidden_tt;
			}
}
}
if (!function_exists('TeacherName')) {
function TeacherName($var){
$result1 = mysql_query("SELECT * FROM profile Where teacher_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$i = 0; // Initialize row index
					$hidden_tt = MYSQL_RESULT($result1,$i,"teacher_name");
	
			  		echo $hidden_tt;
			}
}
}
if (!function_exists('MonitorName')) {
function MonitorName($var, $var1, $var2){
if ($var2 == 2){ $all = '<i class="fa fa-clock-o"></i>'; }
else { $all = ''; }
$result1 = mysql_query("SELECT * FROM monitor Where mnt_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$i = 0; // Initialize row index
					$hidden_tt = MYSQL_RESULT($result1,$i,"mnt_name");
	
			  		if ($var1 == 11){
			  		echo '<span class="label label-sm label-warning">'.$all.' On Trial ('.$hidden_tt.')</span>';
			  		}
			  		elseif ($var1 == 17){
			  		echo '<span class="label label-sm label-danger">'.$all.' Suspended ('.$hidden_tt.')</span>';
			  		}
			  		elseif ($var1 == 18){
			  		echo '<span class="label label-sm label-danger">'.$all.' Shifted ('.$hidden_tt.')</span>';
			  		}
			  		elseif ($var1 == 19){
			  		echo '<span class="label label-sm label-info">'.$all.' Advance ('.$hidden_tt.')</span>';
			  		}
			  		elseif ($var1 == 20){
			  		echo '<span class="label label-sm label-warning">'.$all.' Re-Scheduled ('.$hidden_tt.')</span>';
			  		}
			  		else {
			  		echo '<span class="label label-sm label-success">'.$all.' Regular ('.$hidden_tt.')</span>';
			  		}
			}
}
}

if (!function_exists('timediff')) {
function timediff($var, $var1){
$result1 = mysql_query("SELECT * FROM timestart Where time_s_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '0';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$i = 0; // Initialize row index
					$hidden_tt = MYSQL_RESULT($result1,$i,"time_s");
	
			  		$am = $hidden_tt;
$pm = $var1;
$minutes_diff = round(abs(strtotime($pm) - strtotime($am)) / 60);
echo $minutes_diff;
			}
}
}
?>