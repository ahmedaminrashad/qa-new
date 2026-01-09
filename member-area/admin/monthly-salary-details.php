<?php session_start(); ?>
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
<?php
  require ("../includes/dbconnection.php");
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$sy1 = date('d-m-Y');
?>
<?php 
// sending query
$vid = $_POST['vid'];
$vbi = $_POST['vbi'];
$date = $_POST['date'];
$checkbox = $_POST['checkbox'];
$checkbox_a = $_POST['amu'];
$checkbox_n = $_POST['name'];
$checkbox_t = $_POST['tax'];
$checkbox_c = $_POST['acc_cat'];
$checkbox_h = $_POST['acc_head'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$del_ida = $checkbox_a[$i];
$del_idn = $checkbox_n[$i];
$del_idt = $checkbox_t[$i];
$ac_cat = $checkbox_c[$i];
$ac_head = $checkbox_h[$i];
mysql_query ("INSERT INTO account_entry(date, voucher_id, description, amount, vendor_id, ac_cat_id, account_head, bank_id, office_id, tax)
					VALUES('$date','$vid','Payment of $del_idn Salary FOM','$del_ida','1','$ac_cat','$ac_head','2','$vib','$del_idt')") or die(mysql_error()); 					
 		header(
			 	"Location: list-of-voucher");
				}
				?>