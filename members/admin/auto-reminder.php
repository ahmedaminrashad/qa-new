<?php
  error_reporting(E_STRICT | E_ALL);
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
include("../includes/01-var.php");

$date = date('Y-m-d', time());
$time_start = date("H:i:s", time());


$sql = "SELECT * FROM class_history WHERE date_admin = '$date' AND start_time_A <= '$time_start' AND end_time_A >= '$time_start' AND monitor_id = '2' AND re_status != 2 AND whatsapp < '3'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
    $Sid = $row['course_id'];
    $Pid = $row['parent_id'];
    $Tid = $row['teacher_id'];
    $Hid = $row['history_id'];
     $sql = "SELECT * FROM course Where course_id = '$Sid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
$student = $row['course_yrSec'];
$sql = "SELECT * FROM profile Where teacher_id = '$Tid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$teacher = $row['teacher_name'];
$link = $row['link'];

$sql = "SELECT * FROM account Where parent_id = '$Pid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$group = $row['group_id'];
$sql = "UPDATE class_history SET whatsapp = '3' WHERE history_id = '$Hid1'";
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*CLASS REMINDER*\r\n\r\n*Teacher Name:* ".$teacher."\r\n*Student Name:* ".$student."\r\n*https://www.quransheikh.com/member-area/accounts/your-class.php?s=".base64_encode($Hid)."&t=".base64_encode($Tid)."*\r\nTeacher is waiting for the student in the class room. Please Join the class ASAP or inform us if you are not coming for class. JazakaAllah
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
