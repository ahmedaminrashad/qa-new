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

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
date_default_timezone_set("Africa/Cairo");
$tdate = date('Y-m-d');
?>
<?php
	$value1 = explode(":", $_REQUEST['checkbox1']);
	$c1=$value1[0];
	$ac1=$value1[1];
	$value2 = explode(":", $_REQUEST['checkbox2']);
	$c2=$value2[0];
	$ac2=$value2[1];
	$value3 = explode(":", $_REQUEST['checkbox3']);
	$c3=$value3[0];
	$ac3=$value3[1];
	$value4 = explode(":", $_REQUEST['checkbox4']);
	$c4=$value4[0];
	$ac4=$value4[1];
	$value5 = explode(":", $_REQUEST['checkbox5']);
	$c5=$value5[0];
	$ac5=$value5[1];
	$value6 = explode(":", $_REQUEST['checkbox6']);
	$c6=$value6[0];
	$ac6=$value6[1];
	$value7 = explode(":", $_REQUEST['checkbox7']);
	$c7=$value7[0];
	$ac7=$value7[1];
	$value8 = explode(":", $_REQUEST['checkbox8']);
	$c8=$value8[0];
	$ac8=$value8[1];
	$value9 = explode(":", $_REQUEST['checkbox9']);
	$c9=$value9[0];
	$ac9=$value9[1];
	$value10 = explode(":", $_REQUEST['checkbox10']);
	$c10=$value10[0];
	$ac10=$value10[1];
	$value11 = explode(":", $_REQUEST['checkbox11']);
	$c11=$value11[0];
	$ac11=$value11[1];
	$value12 = explode(":", $_REQUEST['checkbox12']);
	$c12=$value12[0];
	$ac12=$value12[1];
	$value13 = explode(":", $_REQUEST['checkbox13']);
	$c13=$value13[0];
	$ac13=$value13[1];
	$value14 = explode(":", $_REQUEST['checkbox14']);
	$c14=$value14[0];
	$ac14=$value14[1];
	$value15 = explode(":", $_REQUEST['checkbox15']);
	$c15=$value15[0];
	$ac15=$value15[1];
	$value16 = explode(":", $_REQUEST['checkbox16']);
	$c16=$value16[0];
	$ac16=$value16[1];
	$value17 = explode(":", $_REQUEST['checkbox17']);
	$c17=$value17[0];
	$ac17=$value17[1];
	$value18 = explode(":", $_REQUEST['checkbox18']);
	$c18=$value18[0];
	$ac18=$value18[1];
	$value19 = explode(":", $_REQUEST['checkbox19']);
	$c19=$value19[0];
	$ac19=$value19[1];
	$value20 = explode(":", $_REQUEST['checkbox20']);
	$c20=$value20[0];
	$ac20=$value20[1];
	$value21 = explode(":", $_REQUEST['checkbox21']);
	$c21=$value21[0];
	$ac21=$value21[1];
	$value22 = explode(":", $_REQUEST['checkbox22']);
	$c22=$value22[0];
	$ac22=$value22[1];
	$value23 = explode(":", $_REQUEST['checkbox23']);
	$c23=$value23[0];
	$ac23=$value23[1];
	$value24 = explode(":", $_REQUEST['checkbox24']);
	$c24=$value24[0];
	$ac24=$value24[1];
	$value25 = explode(":", $_REQUEST['checkbox25']);
	$c25=$value25[0];
	$ac25=$value25[1];
	$value26 = explode(":", $_REQUEST['checkbox26']);
	$c26=$value26[0];
	$ac26=$value26[1];
	$read=number_format($_REQUEST['read'], 2);
	$manzil=number_format($_REQUEST['manzil'], 2);
	$makharij=$_REQUEST['makharij'];
	$noon=$_REQUEST['noon'];
	$meem=$_REQUEST['meem'];
	$qulqala=$_REQUEST['qulqala'];
	$guuna=$_REQUEST['guuna'];
	$madda=$_REQUEST['madda'];
	$t_id=$_REQUEST['test_id'];
	$tgrade=$_REQUEST['tgrade'];
	$tajweed_mistakes=$c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9+$c10+$c11+$c12+$c13+$c14+$c15+$c16+$c17+$c18+$c19+$c20+$c21+$c22+$c23+$c24+$c25+$c26;
	$tajweed_total=$makharij+$noon+$meem+$qulqala+$guuna+$madda;
	$tajweed_marks_taken=$tajweed_total-$tajweed_mistakes;
	$tajweed_results=number_format(($tajweed_marks_taken/$tajweed_total)*100, 2);
	$my_array = array("$ac1","$ac2","$ac3","$ac4","$ac5","$ac6","$ac7","$ac8","$ac9","$ac10","$ac11","$ac12","$ac13","$ac14","$ac15","$ac16","$ac17","$ac18","$ac19","$ac20","$ac21","$ac22","$ac23","$ac24","$ac25","$ac29");
	$actual_mistakes= implode(',', $my_array);
	mysql_query( "UPDATE test_results SET tajweed_marks = '$tajweed_results', reading_marks = '$read', hifz_marks = '$manzil', mistakes = '$actual_mistakes', taken_date_admin = '$tdate', status_id = '2', teacher_p = '$tgrade', taken_by = '1' WHERE test_id = '$t_id'") or die(mysql_error()); 
							 header("Location: test_status");

	?>