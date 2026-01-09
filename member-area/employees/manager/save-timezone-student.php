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
		$ptzname =$_REQUEST['tz_name'];
		$ptzdiff =$_REQUEST['tz_diff'];
		$ptzphp =$_REQUEST['tz_php'];
		$ptzid =$_REQUEST['tz_id'];
		$pcid =$_REQUEST['c_id'];

		mysql_query( "UPDATE course SET timezone = '$ptzdiff', time_name = '$ptzname', php_tz = '$ptzphp' where tz_id = '$ptzid'") or die(mysql_error()); 
							 header("Location: list-of-country-timezone?con=$pcid");

?>