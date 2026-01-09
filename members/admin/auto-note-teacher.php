<?php
  error_reporting(E_STRICT | E_ALL);
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
include("../includes/email_details.php");
include("../includes/01-var.php");

$date = date('Y-m-d', time());
$time_start = date("H:i:s", time());

$sql = "SELECT * FROM class_history WHERE date_admin = '$date' AND start_time_A <= '$time_start' AND end_time_A >= '$time_start' AND monitor_id = '1' AND re_status != 2 AND whatsapp = '1'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
    $Hid1 = $row['history_id'];
    $Sid = $row['course_id'];
    $Pid = $row['parent_id'];
    $Tid = $row['teacher_id'];
    $sql = "SELECT * FROM course Where course_id = '$Sid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
$student = $row['course_yrSec'];
$sql = "SELECT * FROM profile Where teacher_id = '$Tid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$teacher = $row['teacher_name'];
$link = $row['link'];
$group = $row['group_id'];
$sql = "UPDATE class_history SET whatsapp = '2' WHERE history_id = '$Hid1'";
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*CLASS REMINDER*\r\n\r\n*Teacher Name:* ".$teacher."\r\n*Student Name:* ".$student."\r\n============\r\nIt is to inform you that you have a class and you did not click on activate button.\r\n*You are 3 minutes late now.*\r\nKindly use the following link to login your account:\r\nhttps://www.quransheikh.com/member-area/employees/\r\nJazakaAllah
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
//header("Location: " . $_SERVER['HTTP_REFERER']);
curl_close($ch);
}
}
?>
