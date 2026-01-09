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
include("../includes/session1.php");
  require ("../includes/dbconnection.php");
			$teacher_bank = $_POST['abank'];
			$teacher_bcode = $_POST['acode'];
			$teacher_acc = $_POST['aacc'];
			$pppiiiddd = $_POST['proiidd'];
			$salary_amu = $_POST['tsalary'];
			$rent_amu = $_POST['trent'];
			$tax_amu = $_POST['ttax'];
			$teacher_title = $_POST['atitle'];
			$teacher_class = $_POST['class_r'];
			$teacher_csr = $_POST['csr_r'];
			$teacher_hour = $_POST['hour_r'];
			$tmedi = $_POST['tmedi'];
			$tent = $_POST['tent'];
			$tmisc = $_POST['tmisc'];
			$teobi = $_POST['teobi'];
			$zoom = $_POST['ZoomLink'];
			$wa = $_POST['ggidw'];

mysql_query ("UPDATE profile SET salary_amount = '$salary_amu', residence_all = '$rent_amu', tax = '$tax_amu', bank = '$teacher_bank', branch_code = '$teacher_bcode', account_no = '$teacher_acc', account_title = '$teacher_title', hour_rate = '$teacher_hour', medical = '$tmedi', entertainment = '$tent', misc = '$tmisc', eobi = '$teobi', link = '$zoom', group_id = '$wa' WHERE teacher_id = '$pppiiiddd'") or die(mysql_error()); 
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>