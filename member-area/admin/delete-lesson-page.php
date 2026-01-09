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
?>
<?php
$dept_id =$_REQUEST['cid'];
$img_id =$_REQUEST['img'];
	mysql_query("DELETE FROM lesson_image WHERE page_id = '$dept_id'") or die(mysql_error());
	unlink('../uploads/'.$img_id.'');
	unlink('../uploads/thumb/'.$img_id.'');  		
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>