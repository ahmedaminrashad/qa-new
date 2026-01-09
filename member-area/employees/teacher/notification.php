<?php
require("../includes/dbconnection.php");
include("../includes/01-var.php");
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
$group = "Demo";
$message = $genderS.' *' . $student . '*
            
We are really Sorry about that
But your class has been recorded as an *absent !*

Jazakom Allah Khair
*Quran Square Family*';
$INSTANCE_ID = '43';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "qarabicacademy@gmail.com";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "5d4aac71c6af4c8c80cbd57d4e38f45d";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
  'group_admin' => "+201003875047",//"+447418397601" // TODO: Specify the WhatsApp number of the group creator, including the country code
  'group_name' => $group,    // TODO: Specify the name of the group
  'message' => $message,  // TODO: Specify the content of your message
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/group/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);
echo "Response: ".$group.' - '.$response;
curl_close($ch);




