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
	$pid =$_REQUEST['t_id1'];
	$link =$_REQUEST['link'];

	mysql_query("UPDATE course SET nature = '2', Teacher = '0' WHERE course_id = '$pid'") or die(mysql_error());  	
if(mysql_query){
 	
mysql_query("DELETE FROM sched WHERE course_id = '$pid'") or die(mysql_error());
	if (){ echo "Success";} else { echo ""No;}

}
?>