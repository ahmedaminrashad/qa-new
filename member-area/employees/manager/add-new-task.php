<?php session_start(); ?>
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
<?php
  include("../includes/session.php");
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
require ("../includes/smsGateway.php");

$apid =$_REQUEST['p_id'];
$adate =$_REQUEST['time'];
$apman =$_REQUEST['pman'];
$acom =$_REQUEST['comment'];
$sstu =$_REQUEST['stu'];
$spid =$_REQUEST['ppid'];

			mysql_query ("INSERT INTO task (parent_name, task_date, manager, task_des, type_id, parent_id)
					VALUES('$apid','$adate','$apman','$acom','$sstu','$spid')") or die(mysql_error()); 							
 		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>