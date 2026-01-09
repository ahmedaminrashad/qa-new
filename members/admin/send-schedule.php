<?php

error_reporting(E_STRICT | E_ALL);
include("../includes/dbconnection.php");
include("../includes/email_details.php");
include("../includes/01-var.php");
$reqid= $_REQUEST['reqid'];
$StudentName= $_REQUEST['StudentName'];
$TeacherGroup= $_REQUEST['TeacherGroup'];
$STime= $_REQUEST['STime'];
$ETime= $_REQUEST['ETime'];
$checkbox1= $_REQUEST['checkbox1'];
$checkbox2= $_REQUEST['checkbox2'];
$checkbox3= $_REQUEST['checkbox3'];
$checkbox4= $_REQUEST['checkbox4'];
$checkbox5= $_REQUEST['checkbox5'];
$checkbox6= $_REQUEST['checkbox6'];
$checkbox7= $_REQUEST['checkbox7'];
if ($checkbox1 == 1) { $day1 = 'Monday'; }
if ($checkbox2 == 2) { $day2 = 'Tuesday'; }
if ($checkbox3 == 3) { $day3 = 'Wednesday'; }
if ($checkbox4 == 4) { $day4 = 'Thursday'; }
if ($checkbox5 == 5) { $day5 = 'Friday'; }
if ($checkbox6 == 6) { $day6 = 'Saturday'; }
if ($checkbox7 == 7) { $day7 = 'Sunday'; }
$time1 = date("h:i a", strtotime($STime));
$time2 = date("h:i a", strtotime($ETime));
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*SCHEDULE NOTIFICATION*

*We have added schedule as follow:*

*Student Name:* ".$StudentName."
*Time:* ".$time1." to ".$time2."
*Days:* ".$day1." ".$day2." ".$day3." ".$day4." ".$day5." ".$day6." ".$day7."

Please be on time for the class. JazakAllah.";
$postData = array(
'group_admin' => $admin,  // TODO: Specify the WhatsApp number of the group creator, including the country code
'group_name' => $TeacherGroup,    // TODO: Specify the name of the group
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
header('Location: delete-requested?req='.$_REQUEST["reqid"].'');
curl_close($ch);
?>