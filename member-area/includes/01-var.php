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
$INS_ID = '43';//'26';
$CL_ID = 'qarabicacademy@gmail.com';//'eng.mohamedramadan00@gmail.com';
$SEC = '5d4aac71c6af4c8c80cbd57d4e38f45d';//'ec7e64ff0da34fa4ab476c055478f8c4';
$admin = '+201012230774';//'+201012230774';
$site = 'http://api.whatsmate.net/v3/whatsapp/group/text/message/' . $INS_ID;
?>

