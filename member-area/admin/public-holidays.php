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
  date_default_timezone_set("Africa/Cairo");
$date = date('Y-m-d', time());
$result2 = mysql_query("SELECT * FROM `public_holidays` WHERE pb_id = '1'");
if (!$result2) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows2 = MYSQL_NUMROWS($result2);
If ($tnumberOfRows2 == 0){
			echo '';
			}
		else if ($tnumberOfRows2 > 0) 
			{
					$sdate = MYSQL_RESULT($result2,$i,"start_date");
					$edate = MYSQL_RESULT($result2,$i,"end_date");
					$status = MYSQL_RESULT($result2,$i,"status");
					$des = MYSQL_RESULT($result2,$i,"details");
	
			  		if ($date >= $sdate AND $date <= $edate AND $status == 2){
			
mysql_query("UPDATE class_history SET monitor_id = '21', lesson_discription = '$des' WHERE date_admin = '$date' AND monitor_id = '1'") or die(mysql_error());
}
else { exit; }
}
    ?>