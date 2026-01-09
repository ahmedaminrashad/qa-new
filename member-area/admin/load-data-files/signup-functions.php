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
function trials($s_date, $e_date)
{
$result = mysql_query("SELECT * FROM account Where trial_date >= '$s_date' AND trial_date <= '$e_date'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '0';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
function regulars($s_date, $e_date)
{
$result = mysql_query("SELECT * FROM account Where regular_date >= '$s_date' AND regular_date <= '$e_date'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '0';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
function lefts($s_date, $e_date)
{
$result = mysql_query("SELECT * FROM account WHERE deactivation_date >= '$s_date' AND deactivation_date <= '$e_date'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$var1 = 0;
			}
		else if ($numberOfRows > 0) 
			{
			$var1 = $numberOfRows;
			 }
			 echo $var1;
		}
function leave($s_date, $e_date)
{
$result = mysql_query("SELECT * FROM account WHERE leave_date >= '$s_date' AND leave_date <= '$e_date'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$var1 = 0;
			}
		else if ($numberOfRows > 0) 
			{
			$var1 = $numberOfRows;
			 }
			 echo $var1;
		}
function suspended($s_date, $e_date)
{
$result = mysql_query("SELECT * FROM account WHERE suspension_date >= '$s_date' AND suspension_date <= '$e_date'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$var1 = 0;
			}
		else if ($numberOfRows > 0) 
			{
			$var1 = $numberOfRows;
			 }
			 echo $var1;
		}
?>