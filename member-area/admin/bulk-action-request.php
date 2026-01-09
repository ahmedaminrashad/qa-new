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
include("../includes/session1.php");
$action_id =$_REQUEST['action'];
$checkbox = $_POST['checkbox'];
if($action_id == 3){
			mysql_query('UPDATE new_request SET status = 2 WHERE request_id IN (' . implode(',', array_map('intval', $checkbox)) . ')') or die(mysql_error()); 		
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
elseif($action_id == 5){
			mysql_query('UPDATE new_request SET status = 10 WHERE request_id IN (' . implode(',', array_map('intval', $checkbox)) . ')') or die(mysql_error()); 		
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
elseif($action_id == 4){
			mysql_query('UPDATE new_request SET status = 3 WHERE request_id IN (' . implode(',', array_map('intval', $checkbox)) . ')') or die(mysql_error()); 		
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
elseif($action_id == 2){
mysql_query('DELETE FROM new_request WHERE request_id IN (' . implode(',', array_map('intval', $checkbox)) . ')') or die(mysql_error());
	mysql_query('DELETE FROM new_request_comments WHERE request_id IN (' . implode(',', array_map('intval', $checkbox)) . ')') or die(mysql_error());  		
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
?>
