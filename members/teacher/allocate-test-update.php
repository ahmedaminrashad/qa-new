<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
include("../includes/main-var.php");
date_default_timezone_set($TimeZoneCustome);
$sy11 = date('Y-m-d');
$sid =$_REQUEST['s_id'];
$did =$_REQUEST['dept'];
header('Location: add-test'.$did.'?st_id='.$sid.'');
?>
