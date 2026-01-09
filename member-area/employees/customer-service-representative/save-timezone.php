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
		$ptzname =$_REQUEST['tzname'];
		$ptzdiff =$_REQUEST['tzdiff'];
		$ptzphp =$_REQUEST['tzphp'];
		$ptzid =$_REQUEST['tzid'];
		$s_timee =$_REQUEST['tcid'];

		
mysql_query( "UPDATE time_zone SET timezone_diff = '$ptzdiff', timezone_name = '$ptzname', php_tz = '$ptzphp' where tz_id = '$ptzid'") or die(mysql_error()); 
							 header("Location: save-timezone-student?tz_name=$ptzname&tz_id=$ptzid&tz_diff=$ptzdiff&tz_php=$ptzphp&c_id=$s_timee");

?>