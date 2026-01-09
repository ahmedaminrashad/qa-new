<?php
error_reporting(E_STRICT | E_ALL);
include("../includes/email_details.php");

include("../includes/main-var.php");
date_default_timezone_set($TimeZoneCustome);
$time_start = date(" g:i:A", time(true));
$date = date('d/m/Y', time());
$m =$_REQUEST['month'];
$due =$_REQUEST['due'];
$y =$_REQUEST['year'];
$payID=$_REQUEST['payID'];

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = $email_server_accounts;
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->SMTPSecure = 'tls';
$mail->Port = $port;
$mail->Username = $email_accounts;
$mail->Password = $email_pass_accounts;
$mail->setFrom($email_accounts, $company_name_accounts);
$mail->addReplyTo($email_accounts, $company_name_accounts);

$mail->Subject = $subject_accounts;
//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop

//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
$mysql = mysqli_connect($server_db, $username_db, $userpass_db);
mysqli_select_db($mysql, $name_db);
$result = mysqli_query($mysql, "SELECT `invoice`.*, `currency`.`currency_name` FROM `invoice`,`currency` WHERE invoice.currency_id=currency.currency_id HAVING invoice.py_id = '$payID'");

foreach ($result as $row) {
$feeF = $row['fee']+$row['invoice_add'];
$group = $row['group_id'];
$date1=date_create($row['due']);
$dateF = date_format($date1,"dS F, Y");
$mode = $row['mode_id'];
$pyID = $row['py_id'];
$ppname = $row['parent_name'];
$ppemail = $row['email'];
$currency = $row['currency_name'];
include("../includes/01-var.php");
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*Monthly Payment Request:*\r\n\r\n*Assalam-o-Aliakum ".$ppname."!* \r\n\r\n*Invoice Direct Payment Link*\r\n\r\n*Blilling Details:*\r\n\r\n*Month:* ".$m."-".$y."\r\n*Amount:* ".$currency." ".$feeF."\r\n*Due Date:* ".$dateF."\r\nKindly pay your invoice by clicking on the link below. We have made it easy for you.\r\n\r\nPayment Link: https://".$site_nameS."/members/accounts/direct-payment-link-".$mode."?py_id=".base64_encode($pyID)."\r\n\r\n You will have the option to pay in the currency of your choice during checkout.";
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
echo "Message sent to : ".$ppname." On WhatsApp Group: ".$group." <a href='invoice-details'>Go to Invoice Details</a><br />";
curl_close($ch);
}
