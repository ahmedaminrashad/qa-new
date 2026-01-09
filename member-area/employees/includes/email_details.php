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

date_default_timezone_set("Africa/Cairo");
$username_db='quranoas_adelr';
$userpass_db='!XMVz}AeduK!';
$name_db='quranoas_students';
$server_db='localhost';

$port = '587';



//Create info email account varaibles for SMTP mail server

$email_server_info='mail.quranoasis.com';

$email_info='info@quranoasis.com';

$email_pass_info='v(;HZuG6lUs$';

$company_name_info='Admin QuranOasis';

$subject_info='Account Login Details at www.QuranOasis.com';



//Create accounts email account varaibles for SMTP mail server

$email_server_accounts='mail.quranoasis.com';

$email_accounts='info@quranoasis.com';

$email_pass_accounts='v(;HZuG6lUs$';

$company_name_accounts='Accounts at QuranOasis';

$subject_accounts='Invoice Request';



//Create info email account varaibles for SMTP mail server

$email_server_sched='mail.quranoasis.com';
$email_sched='info@quranoasis.com';

$email_pass_sched='v(;HZuG6lUs$';

company_name_sched='Admin QuranOasis';
$subject_sched='Online Arabic Classes';

?>