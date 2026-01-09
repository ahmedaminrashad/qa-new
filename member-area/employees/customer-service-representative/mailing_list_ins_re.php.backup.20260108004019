<?php

error_reporting(E_STRICT | E_ALL);
require ("../includes/dbconnection.php");
include("../includes/email_details.php");

date_default_timezone_set("Africa/Cairo");

$date = date('d/m/Y', time());
$m =$_REQUEST['month'];
$due =$_REQUEST['due'];
$y =$_REQUEST['year'];
$link =$_REQUEST['link'];

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = $email_server_accounts;
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
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
$result = mysqli_query($mysql, "SELECT * FROM account WHERE parent_id = '1018'");

foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
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
<a href="https://www.saioi.co.uk/">saioi.co.uk</a></td> 
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
                          	Assalam-o-Aliakum '.$row['parent_name'].'!
                          </td>
                        </tr>
                        <tr>
                          <td height="20" style="height: 20px; line-height:20px;"></td>
                        </tr>
                        <tr>
                          <td align="center" valign="top">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td height="12" style="height: 12px; line-height:12px;"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700;"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                Below is the Recurring billing link. Just click on the link below to make your monthly invoice auto.<br>
								<br /><a href="https://www.2checkout.com/2co/buyer/purchase?sid=102583147&mode=2CO&li_1_price='.$row['fee'].'&li_1_name=Recurring%20payment&li_1_type=product&li_1_recurrence=1%20Month&li_1_duration=Forever&merchant_order_id='.$row['parent_id'].'"><button> PAY NOW Amount '.$row['fee'].'</button></a>
								<br />
								<br>Your secure order will be processed by 2Checkout.com, Inc.
<br>You will have the option to pay in the currency of your choice during checkout.<br>If the payment link does not work properly, please contact <strong>accounts@saioi.co.uk</strong><br>
<br>Kindly Pay your invoice before/on due date. If you are unable to pay your invoice due to any reason, please inform us telling the date you will pay your invoice at <strong>accounts@saioi.co.uk</strong> so that your classes remain continue without any inconvenience.<br>
We sincerely thank you for choosing us to be your online Quran Learning Institute.<br><br><font size="2" color="red">This is a software generated request. If you have already pay your invoice kindly ignore this email.</font><br><br>
<strong>SAIOI Accounts</strong><br>www.SAIOI.co.uk<br>E-mail:accounts@saioi.co.uk<br>WhatApps<br>+923063339999<br><br>Phone:<br>UK: +44 (20) 8144 4409<br>Aus: +61 (2) 8003 5454<br>USA: +1 (310) 933-3319<br>   
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
        echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $row['parent_name'] . ' (' . str_replace("@", "&#64;", $row['email']) . ') at '.$time_start.' <a href="'.$link.'">Go Back</a> <a href="invoice-details">Go to Invoice Details</a><br />';
        //Mark it as sent in the DB
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}
