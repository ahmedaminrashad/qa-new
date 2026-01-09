<?php

error_reporting(E_STRICT | E_ALL);
include("../includes/email_details.php");

$date = date('d/m/Y', time());
$prid1 =$_REQUEST['parent'];
$m =$_REQUEST['month'];
$y =$_REQUEST['year'];
$in_id =$_REQUEST['invoice_no'];
$account =$_REQUEST['account'];
$cur_name =$_REQUEST['cur'];
$fee =$_REQUEST['amount'];
$link =$_REQUEST['link'];

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
$mysql = mysqli_connect($server_db, $username_db, $userpass_db);
mysqli_select_db($mysql, $name_db);
$result = mysqli_query($mysql, "SELECT * FROM `invoice` WHERE py_id = '$in_id'");

foreach ($result as $row) {
    include("../includes/01-var.php");
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*Monthly Payment Request:*\r\n\r\n*Assalam-o-Aliakum ".$row['parent_name']."!* \r\n\r\n*Invoice Direct Payment Link*\r\n\r\n*Blilling Details:*\r\n\r\n*Month:* ".$m."-".$y."\r\n*Amount:* ".$cur_name." ".$fee."\r\n*Due Date:* ".$row['due']."\r\nKindly pay your invoice by clicking on the link below. We have made it easy for you.\r\n\r\nPayment Link: https://quraneschool.com/member-area/accounts/direct-payment-link?py_id=".base64_encode($in_id)."\r\n\r\n You will have the option to pay in the currency of your choice during checkout.";
$postData = array(
'group_admin' => $admin,  // TODO: Specify the WhatsApp number of the group creator, including the country code
'group_name' => $row['group_id'],    // TODO: Specify the name of the group
'message' => $msg
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
header("Location: ".$link."");
curl_close($ch);
}
?>