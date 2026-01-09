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

include("../includes/main-var.php");
date_default_timezone_set($TimeZoneCustome);

$date = date('d/m/Y', time());
$er =$_REQUEST['request'];

require 'PHPMailer-master/PHPMailerAutoload.php';

$email =$_REQUEST['email'];// 'deve.ahmedramadan@gmail.com';
$name =$_REQUEST['name'];// 'ahmed ramadan';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = $email_server_sched;
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; 
$mail->SMTPSecure = 'tls';
$mail->Port = $port;
$mail->Username = $email_sched;
$mail->Password = $email_pass_sched;
$mail->setFrom($email_sched, $company_name_sched);
$mail->addReplyTo($email_sched, $company_name_sched);

$mail->Subject = $subject_sched;

$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

    $mail->addAddress($email, $name);
    $time_start = date(" g:i:A", time(true));
    $body = '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <title>
        <!-- #{Subject} -->
    </title>
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

<body id="body-layout" style="background: #ffffff;">
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center" valign="top" style="padding: 0 15px;background: #ffffff;">
                <table align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td height="15" style="height: 15px; line-height:15px;"></td>
                    </tr>
                    <tr>
                        <td width="600" align="center" valign="top"
                            style="border-radius: 4px; overflow: hidden; box-shadow: 3px 3px 6px 0 rgba(0,0,0,0.2);background: #dde1e6;">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <a style="background: #ffffff; " href="https://quransquare.com"> <img
                                        src="https://quransquare.com/resources/newassets/images/logo.png"
                                        style="height: 50%;width: 100%;background: #ffffff; " alt=""></a>
                                <tr>
                                    <td align="center" valign="top"
                                        style="border-top-left-radius: 4px; border-top-right-radius: 4px; overflow: hidden; padding: 0 20px;background: #0e1a34;">
                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td height="30" style="height: 30px; line-height:30px;"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="font-family: Arial, sans-serif; font-size: 32px; mso-line-height-rule: exactly; line-height: 32px; font-weight: 400; letter-spacing: 1px;color: #ffffff;">
                                                    Assalamualaikum '.$name.'</td>
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
                                                <td height="20" style="height: 20px; line-height:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0"
                                                        border="0">
                                                        <tr>
                                                            <td align="center" valign="top"
                                                                style="background: #d1d5da;">
                                                                <table width="100%" align="center" cellpadding="0"
                                                                    cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td height="1"
                                                                            style="height: 1px; line-height:1px;"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top"
                                                                style="background: #e4e6e9;">
                                                                <table width="100%" align="center" cellpadding="0"
                                                                    cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td height="2"
                                                                            style="height: 2px; line-height:2px;"></td>
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
                                                <td align="left" valign="top"
                                                    style="font-family: Arial, sans-serif; font-size: 24px; mso-line-height-rule: exactly; line-height: 30px; font-weight: 700;color: #302f35;">
                                                    Dear '.$name.'!
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="height: 20px; line-height:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0"
                                                        border="0">
                                                        <tr>
                                                            <td align="center" valign="top">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="12" style="height: 12px; line-height:12px;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"
                                                                style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"
                                                                style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                                                 .Hope you are fine with the grace of Allah
                                                                <br><br>This is <strong> Sheikh Mohamed </strong> From Quran Square institute<br>
                                                                Jazakum Allah Khair For Registration
                                                                <br><br>
                                                                We will Call you brother/Sister in the next 24 Hours in shaa Allah
                                                                To Organize your Free Trail Class 
                                                                <br><br>
                                                                May Allah Bless You And Your Family
                                                               <br><br><br>
                                                             <br><br>
                                                                <strong>'.$site_nameC.'</strong>
                                                            <br>
                                                                <strong>Admin
                                                                    '.$site_nameC.'</strong><br>www.'.$site_nameS.'<br>E-mail '.$email1.'<br>'.$skype_zoom.'
                                                                    <br>Phone<br>'.$phone1.''.$phone2.''.$phone3.'
                                                                    WhatsApp US<a href="https://wa.me/447418397601" id="callnowbutton"  target="_blank">
                                                                    <i class="fa   fa-5x icon-whatsapp-bootom">
                                                                        <img name="icon" class="image image-icon-whatsapp"  style="width: 50px;" src="https://quransquare.com/resources/newassets/images/whatsapp.png">
                                                                    </i>
                                                                </a>
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
                                    <td align="center" valign="top"
                                        style="font-family: Arial, sans-serif; font-size: 12px; mso-line-height-rule: exactly; line-height: 18px; font-weight: 400;color: #a1b4c4;">
                                        www.'.$site_nameS.'</td>
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
    header("Location: https://quransquare.com/RegisterDone.html");
       // echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
      //  break; //Abandon sending
    } else {
    header("Location: https://quransquare.com/RegisterDone.html");
       // echo "Message sent to :" . $name . ' (' . str_replace("@", "&#64;", $email) . ') at '.$time_start.' <a href="list-of-new-request">Go Back</a><br />';
        //Mark it as sent in the DB
        //mysql_query( "UPDATE new_request SET sent = '2' where request_id = '$er'") or die(mysql_error()); 
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
