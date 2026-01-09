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
$subject = 'Your Account has beed Deactivated';
$first_line = 'Following action has been taken to your account at www.Qarabic.Com';
$first_para = 'This is a confirmation email that your account has been deactivated. If you have any question in this regard, feel free to ask anything.';
$second_para = 'Hope you are satified with our services.';
$bottom_line = 'This is a software generated request. If you have any dispute over this email. Please contact as soon as possible.';
$bottom = '<strong>Admin Qarabic Institute</strong>
<br>www.Qarabic.Com
<br>E-mail: info@Qarabic.com<br>
<br>Phone:<br>
USA: +1 (445) 300-1433<br>
UK: +44-741-839-7601<br>';
?>