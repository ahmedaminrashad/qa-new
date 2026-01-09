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
$zone =$_REQUEST['timezone'];
date_default_timezone_set($zone);
$time_start = date("H:i:s", time(true));
$TTS =$_REQUEST['TTS'];
$TTE =$_REQUEST['TTE'];
$mobile = $_REQUEST['mobile'];
$teacherName = $_REQUEST['teacherName'];
$zoomLink = $_REQUEST['zoomLink'];
$message = 
'Assalamu alikum warahmatullah wa barakatuh

Your teacher '.$teacherName.' is waiting for you 
Class Room : '.$zoomLink.'

Jazakom Allah Khair
Quran Square Team';
$INSTANCE_ID = '43';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "qarabicacademy@gmail.com";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "5d4aac71c6af4c8c80cbd57d4e38f45d";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
  'number' => $mobile,////  // TODO: Specify the recipient's number here. NOT the gateway number
  'message' => $message,
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
//echo "Response: ".$response;
curl_close($ch);



$history =$_REQUEST['history_id'];
//if ($time_start >= $TTS && $time_start <= $TTE )
if ( 1 == 1){
$history =$_REQUEST['history_id'];
$time =$_REQUEST['time_id'];
$Sid =$_REQUEST['Sid'];
  $Tid =$_REQUEST['Tid'];
  $Pid =$_REQUEST['Pid'];
header("Location: file-activate?history_id=".$history."&zoom=".$zoom_link."&Sid=".$Sid."&Tid=".$Tid."&Pid=".$Pid."");
}
else {
header("Location: teacher-home?error_id=1");
}		
?>