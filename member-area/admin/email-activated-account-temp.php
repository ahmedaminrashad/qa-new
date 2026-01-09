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
 = 'Your Account has beed Activated';
 = 'Following action has been taken to your account at www.Qarabic.com';
 = 'This is a confirmation email that your account has been Activated. If you have any question in this regard, feel free to ask anything.';
 = 'Hope you are satified with our services.';
 = 'This is a software generated request. If you have any dispute over this email. Please contact as soon as possible.';
 = '<strong>Admin Qarabic</strong>
<br>www.Qarabic.com
<br>E-mail: info@Qarabic.com<br>
';
?>