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

error_reporting(E_STRICT | E_ALL);
include("../includes/dbconnection.php");
include("../includes/email_details.php");
include("../includes/01-var.php");

date_default_timezone_set("Africa/Cairo");
$date = date('Y-m-d', time());
$time_start = date("H:i:s", time(true));


$mysql = mysqli_connect($server_db, $username_db, $userpass_db);
mysqli_select_db($mysql, $name_db);
$result = mysqli_query($mysql, "SELECT * FROM class_history WHERE date_admin = '$date' AND start_time_A <= '$time_start' AND end_time_A >= '$time_start' AND monitor_id = '2' AND re_status != 2 AND whatsapp < '3'");

foreach ($result as $row) {
    $Sid = $row['course_id'];
    $Pid = $row['parent_id'];
    $Tid = $row['teacher_id'];
    $Hid = $row['history_id'];
    $result1 = mysql_query("SELECT * FROM course Where course_id = '$Sid'");
if (!$result1) 
	{
    die("Query to show");
	}
$student = MYSQL_RESULT($result1,$i,"course_yrSec");
$result2 = mysql_query("SELECT * FROM profile Where teacher_id = '$Tid'");
if (!$result2) 
	{
    die("Query to show fields from table failed");
	}
$teacher = MYSQL_RESULT($result2,$i,"teacher_name");
$link = MYSQL_RESULT($result2,$i,"link");

$result3 = mysql_query("SELECT * FROM account Where parent_id = '$Pid'");
if (!$result3) 
	{
    die("Query to show fields from table failed");
	}
$group = MYSQL_RESULT($result3,$i,"group_id");
mysql_query("UPDATE class_history SET whatsapp = '3' WHERE history_id = '$Hid1'") or die(mysql_error());
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*CLASS REMINDER*\r\n\r\n*Teacher Name:* ".$teacher."\r\n*Student Name:* ".$student."\r\n*https://www.quranspirit.com//member-area/accounts/your-class.php?s=".base64_encode($Hid)."&t=".base64_encode($Tid)."*\r\nTeacher is waiting for the student in the class room. Please Join the class ASAP or inform us if you are not coming for class. JazakaAllah
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
?>
