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
	$msg =$_REQUEST['message_type'];
	$oid =$_REQUEST['sale_id'];
	$price =$_REQUEST['item_list_amount_1'];
	$pid =$_REQUEST['vendor_order_id'];
if ($msg == 'RECURRING_INSTALLMENT_SUCCESS'){
header('Location: https://www.tarteelequran.com/member-area/accounts/recurring-started?sale_id='.$oid.'&item_list_amount='.$price.'&vendor_order_id='.$pid.'');
}
elseif ($msg == 'RECURRING_INSTALLMENT_FAILED'){
header('Location: https://www.tarteelequran.com/member-area/accounts/recurring-failed?sale_id='.$oid.'&item_list_amount='.$price.'&vendor_order_id='.$pid.'');
}
elseif ($msg == 'RECURRING_STOPPED'){
header('Location: https://www.tarteelequran.com/member-area/accounts/recurring-failed?sale_id='.$oid.'&item_list_amount='.$price.'&vendor_order_id='.$pid.'');
}
elseif ($msg == 'RECURRING_COMPLETE'){
header('Location: https://www.tarteelequran.com/member-area/accounts/recurring-failed?sale_id='.$oid.'&item_list_amount='.$price.'&vendor_order_id='.$pid.'');
}
?>