<?php
include "class.phpmailer.php";
include "class.smtp.php";
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
$mail = new PHPMailer;

$mail->IsSMTP();
$mail->Host = 'quransquare.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@quransquare.com';
$mail->Password = '0G?!~ge?nAo&';
$mail->Port = '587';
$mail->From ='info@quransquare.com';
$mail->AddAddress("deve.ahmedramadan@gmail.com");
$mail->IsHtml(true);
$mail->Subject = 'test Subject';
$mail->Body = 'test Body';
if (!$mail->send()) {
    echo "Mailer Error " . $mail->ErrorInfo;
} else {
    echo "Message sent to :" . $pname . "<a href='parent-accounts'>Go Back to Accounts</a><br />";
}
