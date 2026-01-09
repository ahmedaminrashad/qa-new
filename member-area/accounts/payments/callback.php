<?php
require('config.php');
require ("../../includes/dbconnection.php");
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
date_default_timezone_set($TimeZoneCustome);

$time_start = date(" g:i:A", time(true));
$date = date('d/m/Y', time());

echo '<h2>GET Data</h2>';
echo '<pre>';
print_r($_GET);
echo '</pre>';

$pid = $_REQUEST['custom'];
$oid = $_REQUEST['txn_id'];
$session_id = $_GET['session_id'];
mysql_query("UPDATE invoice SET status = '2', submit = '$date', d = now() WHERE session_id IN ('$session_id')") or die(mysql_error());
header("Location: https://qarabic.com/member-area/accounts/ind_details");
