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
  
$pid =$_REQUEST['spid']; 
$con_id =$_REQUEST['scon'];
$man_id =$_REQUEST['sman'];
$time_id =$_REQUEST['stimezone'];
$date_id =$_REQUEST['date'];
$active_id =$_REQUEST['act'];
$skype_id =$_REQUEST['skypes'];
$link =$_REQUEST['link'];

$result3 = mysql_query("SELECT * FROM time_zone WHERE tz_id = $time_id");
if (!$result3) 
		{
		die("Quedfbdfiled");
		}
			$numberOfRows = MYSQL_NUMROWS($result3);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$tzy_parent = MYSQL_RESULT($result3,$i,"timezone_diff");
			$tzname_tech = MYSQL_RESULT($result3,$i,"timezone_name");
			$tzname_php = MYSQL_RESULT($result3,$i,"php_tz");
				}

mysql_query("UPDATE course SET c_id = '$con_id', m_id = '$man_id', tz_id = '$time_id', timezone = '$tzy_parent', time_name = '$tzname_tech', php_tz = '$tzname_php', date = '$date_id', active = '$active_id' WHERE parent_id = '$pid'") or die(mysql_error());  	

	header("Location: ".$link."");

?>
