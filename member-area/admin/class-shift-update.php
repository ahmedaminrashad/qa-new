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

require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
$cid =$_REQUEST['class_id'];
$tid =$_REQUEST['techid'];
			mysql_query( "UPDATE class_history SET teacher_id = '$tid', status = '18' where history_id = '$cid'") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
