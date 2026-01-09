<?php
// Include guard to prevent multiple includes
if (defined('HOME_FUNCTIONS_LOADED')) {
    return;
}
define('HOME_FUNCTIONS_LOADED', true);

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
if (!function_exists('site_all')) {
function site_all($m, $y, $s)
{
$result = mysql_query("SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y AND site_id = '$s'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('site_total')) {
function site_total($y, $s)
{
$result = mysql_query("SELECT * FROM new_request Where YEAR(date) = $y AND site_id = '$s'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('leftsall')) {
function leftsall($m, $y)
{
$result = mysql_query("SELECT * FROM account WHERE MONTH(deactivation_date) = $m AND YEAR(deactivation_date) = $y AND dateDiff(deactivation_date,regular_date) > 30");

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
  }
if (!function_exists('req_reg_ratio')) {
function req_reg_ratio($m, $y)
{
$result = mysql_query("SELECT * FROM new_request Where status != 10 AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$requ = MYSQL_NUMROWS($result);
$result = mysql_query("SELECT * FROM account Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$regu = MYSQL_NUMROWS($result);
		if ($requ > 0){
$total=($regu/$requ)*100;
echo number_format($total, 0); echo '%';
		}
		else {echo '0%';}
}
  }
if (!function_exists('req_reg_ratio_year')) {
function req_reg_ratio_year($y)
{
$result = mysql_query("SELECT * FROM new_request Where status != 10 AND YEAR(date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$requ = MYSQL_NUMROWS($result);
$result = mysql_query("SELECT * FROM account Where YEAR(regular_date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$regu = MYSQL_NUMROWS($result);
$total=($regu/$requ)*100;
echo number_format($total, 0); echo '%';
		}
  }
if (!function_exists('requests')) {
function requests($m, $y)
{
$result = mysql_query("SELECT * FROM new_request Where status != 10 AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('requests_att')) {
function requests_att($y)
{
$result = mysql_query("SELECT * FROM new_request Where status != 10 AND YEAR(date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('requests_all')) {
function requests_all($m, $y)
{
$result = mysql_query("SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('requests_total')) {
function requests_total($y)
{
$result = mysql_query("SELECT * FROM new_request Where YEAR(date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('trials')) {
function trials($m, $y)
{
$result = mysql_query("SELECT * FROM account Where MONTH(trial_date) = $m AND YEAR(trial_date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('trials_total')) {
function trials_total($y)
{
$result = mysql_query("SELECT * FROM account Where YEAR(trial_date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('regulars')) {
function regulars($m, $y)
{
$result = mysql_query("SELECT * FROM account Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('regulars_total')) {
function regulars_total($y)
{
$result = mysql_query("SELECT * FROM account Where YEAR(regular_date) = $y");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
  }
if (!function_exists('active')) {
function active($m)
{
$result = mysql_query("SELECT * FROM account Where active = 1 AND regular_date <= '$m'");

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
  }
if (!function_exists('free')) {
function free($m)
{
$result = mysql_query("SELECT * FROM account Where active = 5 AND regular_date <= '$m'");

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
function req_note($er)
{
// sending query
   $result = mysql_query("SELECT * FROM new_request_comments Where request_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
echo $tnumberOfRows;
}
else { echo 0; }
}
  }
if (!function_exists('csr')) {
function csr($t)
  {
			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$t'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo 'Not Alocated';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$acat_id = MYSQL_RESULT($result,$i,"teacher_id");
					$acat_name = MYSQL_RESULT($result,$i,"teacher_name");
					echo $acat_name;
		
	$i++;	 
			}
			}
	}
  }
if (!function_exists('hsum')) {
function hsum($h, $m, $y){
  $sql = "select sum(amount) from account_entry where account_head = $h AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '--';
        }
}
  }
if (!function_exists('psum')) {
function psum($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
}
  }
if (!function_exists('rsum')) {
function rsum($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
}
function tot($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $second-$first;
if($total >= 2) 
        {
            echo '<font color="#44B6AE"><i class="fa fa-sort-up"></i>  <b>'.$total.'</b></font>';
        }
    else
        {
            echo '<font color="#EF4836"><i class="fa fa-sort-down"></i>  <b>'.$total.'</b></font>';
        }
}
  }
if (!function_exists('totavg')) {
function totavg($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
if ($second == 0){ echo '--'; }
if ($second > 0){ $total = ($first/$second)*100;
echo number_format($total, 2); echo '%';
}
}
  }
if (!function_exists('pavg')) {
function pavg($y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$pa = $first/12;
echo number_format($pa, 2);
}
  }
if (!function_exists('ravg')) {
function ravg($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$ra = $second/12;
echo number_format($ra, 2);
}
  }
if (!function_exists('gavg')) {
function gavg($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
if ($second == 0){ echo '--'; }
if ($second > 0){ $total = (($first/$second)*100)/12;
echo number_format($total, 2); echo '%';
}
}
  }
if (!function_exists('cash')) {
function cash($y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $second-$first;
if($total >= 0) 
        {
            echo '<font color="#44B6AE"><b>'.$total.'</b></font>';
        }
    else
        {
            echo '<font color="#EF4836"><b>'.$total.'</b></font>';
        }
}
  }
?>