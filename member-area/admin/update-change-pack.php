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
$data_date1 = date('Y-m-d', time()); 
$nod =$_REQUEST['txtnod'];
$cid =$_REQUEST['courseID'];
$cur_id =$_REQUEST['cur'];
$result = mysql_query("SELECT * FROM fee_package Where package_id = '$nod'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$pac_id = MYSQL_RESULT($result,$i,"package_id");
					$pac_name = MYSQL_RESULT($result,$i,"package_name");
					$pac_classes = MYSQL_RESULT($result,$i,"package_classes");
					$pac_usd = MYSQL_RESULT($result,$i,"fee_usd");
					$pac_gbp = MYSQL_RESULT($result,$i,"fee_gbp");
					$pac_aud = MYSQL_RESULT($result,$i,"fee_aud");
					$pac_pkr = MYSQL_RESULT($result,$i,"fee_pkr");
					if ($cur_id == 1){ $ufee = $pac_usd;}
					elseif ($cur_id == 2){ $ufee = $pac_gbp;}
					elseif ($cur_id == 3){ $ufee = $pac_aud;}
					elseif ($cur_id == 4){ $ufee = $pac_pkr;}
	$i++;	 
			}
			}
mysql_query("UPDATE course SET Fee = '$ufee', Number_of_Days = '$nod' WHERE course_id = '$cid'") or die(mysql_error());
mysql_query("DELETE FROM sched WHERE course_id = '$cid'") or die(mysql_error());
mysql_query("DELETE FROM class_history WHERE course_id = '$pid' AND date_admin >= '$data_date1' AND monitor_id = '1'") or die(mysql_error());
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
