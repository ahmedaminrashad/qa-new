<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("header.php");
$Sid =$_REQUEST['Sid'];
  $Tid =$_REQUEST['Tid'];
  $Pid =$_REQUEST['Pid'];
$sql = "SELECT * FROM course Where course_id = '$Sid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$student = $row['course_yrSec'];
}}

$sql = "SELECT * FROM profile Where teacher_id = '$Tid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$teacher = $row['teacher_name'];
}}

$sql = "SELECT * FROM account Where parent_id = '$Pid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$group = $row['group_id'];
}}

include("../includes/01-var.php");
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*Teacher Name:* ".$teacher."\r\n*Student Name:* ".$student."\r\nTeacher is waiting for the student in the class room.\r\nPlease login to your account and click on Meeting Room to Join the meeting with the teacher.
\r\n*This is an auto generated message by the system, please do not reply on this number.*";
$postData = array(
  'group_admin' => $admin,  // TODO: Specify the WhatsApp number of the group creator, including the country code
  'group_name' => $group,    // TODO: Specify the name of the group
  'message' => $msg
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = $site;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
header('Location: ' . $_SERVER['HTTP_REFERER']);
curl_close($ch);
?>