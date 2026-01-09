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
  
$tcid =$_REQUEST['cid']; 
$tdid =$_REQUEST['did'];
$link =$_REQUEST['link'];
$p_id =$_REQUEST['parent_id']; 
$cur_id =$_REQUEST['ttcur'];
$nod =$_REQUEST['nnod'];

mysql_query("UPDATE sched SET dept_id = '$tdid' WHERE course_id = '$tcid'") or die(mysql_error()); 

	header("Location: update-fee?parent_id=".$p_id."&ttcur=".$cur_id."&nnod=".$nod."&aaa=".$tcid."");

?>
