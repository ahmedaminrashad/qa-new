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
$sql = "select sum(invoice.fee+invoice.invoice_add) from invoice JOIN account ON account.parent_id = invoice.parent_id WHERE invoice.mon_id = '1' and invoice.y_id = '4' and invoice.currency_id = '1' and invoice.status = '1' and account.dept_id = '1003'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
echo $addfee;
?>