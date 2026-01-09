<?php
error_reporting(E_STRICT | E_ALL);
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
date_default_timezone_set($TimeZoneCustome);

$ppisid =$_REQUEST['parent_id'];


$current = date('Y-m-d');
$date = strtotime($current);
$date1 = strtotime("+7 day", $date);
$SDate = date('Y-m-d', $date1);
$smonth = date('F');
$sm = date('m');
$sy = date('Y');
if($sy == "2014")
{
$y = 1;
}
elseif($sy == "2015")
{
$y = 2;
}
elseif($sy == "2016")
{
$y = 3;
}
elseif($sy == "2017")
{
$y = 4;
}
elseif($sy == "2018")
{
$y = 5;
}
elseif($sy == "2019")
{
$y = 6;
}
elseif($sy == "2020")
{
$y = 7;
}
elseif($sy == "2021")
{
$y = 8;
}
elseif($sy == "2022")
{
$y = 9;
}
elseif($sy == "2023")
{
$y = 10;
}
elseif($sy == "2024")
{
$y = 11;
}
elseif($sy == "2025")
{
$y = 12;
}
$mysql = mysqli_connect($server_db, $username_db, $userpass_db);
mysqli_select_db($mysql, $name_db);
$result = mysqli_query($mysql, "SELECT * FROM `account` WHERE parent_id = '$ppisid'");

foreach ($result as $row) {
$pid = $row['parent_id'];
$pname = $row['parent_name'];
$prate = $row['rate'];
$pemail = $row['email'];
$ptele = $row['telephone'];
$pmob = $row['mobile'];
$pcid = $row['c_id'];
$pcur = $row['currency_id'];
$pmode = $row['mode_id'];
$pm = $row['m_id'];
$pskype = $row['skype'];
$pgroup_id = $row['group_id'];
$pwhats_email = $row['whats_email'];
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM subscription Where parent_id = '$pid' AND status = 2 AND d = (SELECT MAX(d) FROM subscription Where parent_id = '$pid' AND status = 2)";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
header('Location: teacher-home');
}
elseif ($numberOfRows > 0)
{
while ($row = mysqli_fetch_assoc($result)){
$sub_id = $row['sub_id'];
$subP = $row['parent_id'];
$subH1 = $row['hours'];
$subD = $row['date'];
$sub_status = $row['status'];
$extra = $row['added'];
$last_add = $row['last_added'];
$actual = $row['actual'];
$arrear = $row['arrear'];
$subH = $subH1+$extra+$arrear;

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE parent_id = '$pid' AND value = 1 AND re_status != 2 AND date_admin >= '$subD' AND date_admin <= '$current' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;


list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
$decimal = $m/60;  //get minutes as decimal
$hoursAsDecimal1 = $h+$decimal;

if($hoursAsDecimal1 < $subH){
header('Location: teacher-home');
}
elseif($hoursAsDecimal1 >= $subH){
$arrearDif = $subH-$hoursAsDecimal1;

$sql = "UPDATE account SET active = '17', suspension_date = '$current' WHERE parent_id = '$pid'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "UPDATE course SET active = '17' WHERE parent_id = '$pid'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "UPDATE sched SET status = '17' WHERE parent_id = '$pid'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "UPDATE class_history SET status = '17' WHERE parent_id = '$pid' AND date_admin >= '$current' AND `monitor_id` NOT IN (9,4,6,21)";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "UPDATE class_history SET value = '2' WHERE parent_id = '$pid' AND value = '1' AND re_status != '2' AND date_admin >= '$subD' AND date_admin <= '$current'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "UPDATE subscription SET value = '2' WHERE sub_id = '$sub_id'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM sched WHERE parent_id = '$pid'";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;

list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
$decimal = $m/60;  //get minutes as decimal
$hoursAsDecimal = $h+$decimal;
$payment = $hoursAsDecimal*$prate*4;
$THours = $hoursAsDecimal*4;
$GHours = $THours-$extra+$arrearDif;
$AHours = $subH-$hoursAsDecimal1;
if ($extra == 0){
$sql = "INSERT INTO invoice (parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email)
VALUES('$pid', '$pname', '$payment', '$current', '$current', '0000-00-00', '1', '$sm', '$y', '$pemail', '$ptele', '$pmob', '$pskype', '$pcid', '$pcur', '$pmode', '$pm', '$pgroup_id', '$pwhats_email')";
if ($conn->query($sql) === TRUE) {
$id = mysqli_insert_id($conn);
}
$sql = "INSERT INTO subscription (parent_id, hours, date, status, added, py_id, last_added, actual, arrear)
VALUES('$pid','$GHours', '$current', '1', '0', '$id', '$extra', '$THours', '$AHours')";
if ($conn->query($sql) === TRUE) {
echo '';
}
}
elseif ($extra > 0){
   $sql = "SELECT * FROM invoice Where parent_id = '$pid' AND issue = (SELECT MAX(issue) FROM invoice Where parent_id = '$pid')"; 
   $result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
   $invoice_id = $row['py_id'];
   }
   }
   $sql = "INSERT INTO subscription (parent_id, hours, date, status, added, py_id, last_added, actual, arrear)
VALUES('$pid','$GHours', '$current', '1', '0', '$invoice_id', '$extra', '$THours', '$AHours')";
if ($conn->query($sql) === TRUE) {
echo '';
}
}
$sql = "SELECT * FROM currency Where currency_id = '$pcur'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$acat_id = $row['currency_id'];
$acat_name = $row['currency_name'];
$acat_abv = $row['abv'];
$acur = $acat_abv;
}
}
header('Location: teacher-home');


}
}

}

}

?>
