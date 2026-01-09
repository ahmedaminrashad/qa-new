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
$mmm =$_REQUEST['mmm'];
$yyy =$_REQUEST['yyy'];

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
$result = mysqli_query($mysql, "SELECT `invoice`.*, `currency`.`currency_name` FROM `invoice`,`currency` WHERE invoice.currency_id=currency.currency_id HAVING invoice.status = '1' AND invoice.mon_id = '$mmm' AND invoice.y_id = '$yyy'");

foreach ($result as $row) {
$feeF = $row['fee']+$row['invoice_add'];
$date1=date_create($row['due']);
$dataF = date_format($date1,"dS F, Y");
$group = $row['group_id'];
$mode = $row['mode_id'];
$pyID = $row['py_id'];
$ppname = $row['parent_name'];
$ppemail = $row['email'];
$currency = $row['currency_name'];
if ($row['whats_email'] == 'email'){
 //This iterator syntax only works in PHP 5.4+
    $mail->addAddress($row['email'], $row['parent_name']);
    $time_start = date(" g:i:A", time(true));
    $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <title><!-- #{Subject} --></title>
    <style type="text/css">  
    #outlook a {
      padding: 0;
    }
    body {
      width: 100% !important;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      margin: 0;
      padding: 0;
    }
    .ExternalClass {
      width: 100%;
    }
    .ExternalClass,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }
    .ExternalClass p {
      line-height: inherit;
    }
    #body-layout {
      margin: 0;
      padding: 0;
      width: 100% !important;
      line-height: 100% !important;
    }
    img {
      display: block;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }
    a img {
      border: none;
    }
    table td {
      border-collapse: collapse;
    }
    table {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }
    a {
      color: orange;
      outline: none;
    }
    </style>
  </head>
  <body id="body-layout" style="background: #406c8d;">
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td align="center" valign="top" style="padding: 0 15px;background: #406c8d;">
          <table align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="15" style="height: 15px; line-height:15px;"></td>
            </tr>
            <tr>
              <td width="600" align="center" valign="top" style="border-radius: 4px; overflow: hidden; box-shadow: 3px 3px 6px 0 rgba(0,0,0,0.2);background: #dde1e6;">
                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td align="center" valign="top" style="border-top-left-radius: 4px; border-top-right-radius: 4px; overflow: hidden; padding: 0 20px;background: #302f35;">
                      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td height="30" style="height: 30px; line-height:30px;"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 32px; mso-line-height-rule: exactly; line-height: 32px; font-weight: 400; letter-spacing: 1px;color: #ffffff;">Invoice Request</td>
                        </tr>
                        <tr>
                          <td height="30" style="height: 30px; line-height:30px;"></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" style="padding: 0 20px;">
                      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td height="30" style="height: 30px; line-height:30px;"></td>
                        </tr> 
                        <tr> 
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 22px; font-weight: 400;color: #302f35;">This is a request for payment from: 
<a href="https://www.'.$site_nameS.'/">'.$site_nameC.'</a>.</td> 
                        </tr>
                        <tr> 
                          <td height="20" style="height: 20px; line-height:20px;"></td>
                        </tr>
                        <tr>
                          <td align="center" valign="top">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td align="center" valign="top" style="background: #d1d5da;">
                                  <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                      <td height="1" style="height: 1px; line-height:1px;"></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" style="background: #e4e6e9;">
                                  <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                      <td height="2" style="height: 2px; line-height:2px;"></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="20" style="height: 20px; line-height:20px;"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 24px; mso-line-height-rule: exactly; line-height: 30px; font-weight: 700;color: #302f35;">
                          	Assalam-o-Aliakum '.$ppname.'!
                          </td>
                        </tr>
                        <tr>
                          <td height="20" style="height: 20px; line-height:20px;"></td>
                        </tr>
                        <tr>
                          <td align="center" valign="top">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td align="center" valign="top">
                                  <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                      <td align="left" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;">Billing Details:</td>
                                      <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;"></td> 
                                    </tr> 
                                  	<!-- #{BeginInfo} -->
                                    <tr> 
                                      <td align="left" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;">Month:</td>
                                      <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">'.$m.'-'.$y.'</td>
                                    </tr>
                                    <tr> 
                                      <td align="left" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;">Amount:</td>
                                      <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">'.$currency.' '.$feeF.'</td>
                                    </tr>
                                    <tr> 
                                      <td align="left" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;">Due Date:</td>
                                      <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">'.$dataF.'</td>
                                    </tr>
                                  	<!-- #{EndInfo} -->                                    
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td height="12" style="height: 12px; line-height:12px;"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700;"></td>
                              </tr>
                              <tr> 
                                      <td colspan="2" align="center" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;"><br><font color="blue">Kindly pay your invoice by clicking on PAY NOW button below. We have made it easy for you.</font></td>
                                    </tr>
                                    <tr> 
                                      <td colspan="2" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;"><br><a href="https://'.$site_nameC.'/members/accounts/direct-payment-link-'.$mode.'?py_id='.base64_encode($pyID).'" ><button class="button" style="vertical-align:middle"><span><b>PAY NOW</b></span></button></a></td>
                                    </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                <br>If the payment link does not work properly, please contact <strong>'.$email2.'</strong><br>
<br>Kindly Pay your invoice before/on due date. If you are unable to pay your invoice due to any reason, please inform us telling the date you will pay your invoice at <strong>'.$email2.'</strong> so that your classes remain continue without any inconvenience.<br>
We sincerely thank you for choosing us to be your online Quran Learning Institute.<br><br><font size="2" color="red">This is a software generated request. If you have already pay your invoice kindly ignore this email.</font><br><br>
<strong>'.$site_nameC.'</strong>
                                <br><br><br>'.$name.'<br>
<strong>Accounts '.$site_nameC.'</strong><br>www.'.$site_nameS.'<br>E-mail:'.$email2.'<br>'.$skype_zoom.'<br>Phone:<br>'.$phone1.''.$phone2.''.$phone3.'   
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="40" style="height: 40px; line-height:40px;"></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20" style="height: 20px; line-height:20px;"></td>
            </tr>
            <tr>
              <td width="600" align="center" valign="top">
                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 12px; mso-line-height-rule: exactly; line-height: 18px; font-weight: 400;color: #a1b4c4;">This is an automatically generated email, please do not reply.</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20" style="height: 20px; line-height:20px;"></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>';
	$mail->msgHTML($body);
    if (!$mail->send()) {
        echo "Mailer Error (" . str_replace("@", "&#64;", $ppemail) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $ppname . ' (' . str_replace("@", "&#64;", $ppemail) . ') at '.$time_start.' <a href="invoice-details">Go to Invoice Details</a><br />';
        //Mark it as sent in the DB
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
    }
if ($row['whats_email'] == 'whatsapp'){
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
}
