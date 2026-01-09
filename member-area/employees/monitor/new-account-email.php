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
require ("../includes/dbconnection.php");
include("../includes/email_details.php");

date_default_timezone_set("Africa/Cairo");

$date = date('d/m/Y', time());

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = $email_server_info;
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username = $email_info;
$mail->Password = $email_pass_info;
$mail->setFrom($email_info, $company_name_info);
$mail->addReplyTo($email_info, $company_name_info);

$mail->Subject = $subject_info;

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop

//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
    $pname =$_REQUEST['name'];
$pemail =$_REQUEST['email'];
$puser =$_REQUEST['user'];
$ppass =$_REQUEST['pass'];
$mail->addAddress($pemail, $pname);
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
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 32px; mso-line-height-rule: exactly; line-height: 32px; font-weight: 400; letter-spacing: 1px;color: #ffffff;">Assalamualaikum Wr Wb</td>
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
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 22px; font-weight: 400;color: #302f35;">Welcome to SAIOI.net.</td> 
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
                          	Respected '.$pname.'!
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
                                </td>
                              </tr>
                              <tr>
                                <td height="12" style="height: 12px; line-height:12px;"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700;"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                It is our honor and pleasure to have you in our online web-portal. To know your Schedule, Course, Class History, Lesson, Learning Recourse and Lesson Pages, just login by using following credentials:<br><br><strong>Login Link: </strong>https://www.saioi.net/member-area/accounts
                                <br><strong>User Name: </strong>'.$puser.'<br><strong>User Pass: </strong>'.$ppass.'<br><br>
                                Kindly visit the link below to read terms of services.<br>
                                https://saioi.net/student-policies<br><br>
                                We have a 24/7 help desk that you can call in case you need any support.<br>
                                Our staff will be more than willing to assist you with your needs. Here at www.saioi.net, your support and convenience is always our top most priority.<br><br>
                                Once again, we sincerely thank you for choosing us to be your online Quran Learning Institute.<br><br>
                                <strong>SAIOI</strong>
                                <br><br><br>Regards<br><br>Mohamed Elseidy<br>
<strong>Admin SAIOI</strong><br>www.saioi.net<br>E-mail:info@saioi.net<br>Skype ID: saioi.1<br>Phone:<br>EGY: +201095538744<br>   
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
                    <td align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 12px; mso-line-height-rule: exactly; line-height: 18px; font-weight: 400;color: #a1b4c4;">www.saioi.net</td>
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
        echo "Mailer Error ";
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $pname . "<a href='parent-accounts'>Go Back to Accounts</a><br />";
        //Mark it as sent in the DB
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
