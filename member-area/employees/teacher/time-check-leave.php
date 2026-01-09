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
$zone =$_REQUEST['timezone'];
date_default_timezone_set($zone);
$time_start = date("H:i:s", time(true));
$TTS =$_REQUEST['TTS'];

$history =$_REQUEST['history_id'];
if ($time_start <= $TTS){
header("Location: leave_absent_mark?history_id=".$history."&attend=5");
}
else {
header("Location: teacher-home?error_id=2");
}		
?>
