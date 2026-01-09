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
/*require ("dbconnection.php");
  $ID = $_SESSION['is']['teacher_id'];
			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID'");
			if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '2';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			$right_id = MYSQL_RESULT($result,$i,"s_supper_rights");
			if ($right_id == 2){
			require('logout.php');
			exit;
			}
	}*/
?>