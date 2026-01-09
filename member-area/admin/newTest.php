<?php

require("../includes/dbconnection.php");

date_default_timezone_set($TimeZoneCustome);

function send_email($parent_email, $parent_name, $time_student_clock,$student)
{


    require 'PHPMailer-master/PHPMailerAutoload.php';
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

    $mail = new PHPMailer;

    try {
    // $mail->isSMTP();
    $mail->Host = "smtp.hostinger.com";
    // $mail->SMTPSecure = 'TLS';
    // $mail->Port = 587;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->Username = "hr@qarabic.com";
    $mail->Password = "Hadeer.1234";
    $mail->setFrom("hr@qarabic.com", "qarabic");
    $mail->addReplyTo("hr@qarabic.com", "qarabic");
    $mail->Subject = "CLASS REMINDER";
    

    //Same body for all messages, so set this before the sending loop
    //If you generate a different body for each recipient (e.g. you're using a templating system),
    //set it inside the loop

    //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

    $mail->addAddress($parent_email, $parent_name);

    $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                                <td width="600" align="center" valign="top" style="border-radius: 4px; overflow: hidden; box-shadow: 3px 3px 6px 0 rgba(0,0,0,0.2);background: #dde1e6;">
                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
        
                                        <tr>
                                            <td align="center" valign="top" style="border-top-left-radius: 4px; border-top-right-radius: 4px; overflow: hidden; padding: 0 20px;background: #0e1a34;">
                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td height="30" style="height: 30px; line-height:30px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 32px; mso-line-height-rule: exactly; line-height: 32px; font-weight: 400; letter-spacing: 1px;color: #ffffff;">
                                                            Asalam-o-Alaikum ' . $parent_name . '</td>
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
                                                        <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 22px; font-weight: 400;color: #302f35;">
                                                            CLASS REMINDER</td>
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
                                                        <td height="20" style="height: 20px; line-height:20px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                <tr>
                                                                    <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700;">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                                                        <b>CLASS REMINDER</b><br>
                                                                        <b>Student Name:</b> ' . $student . '<br>
                                                                        <b>Time:</b> ' . $time_student_clock . '<br>
                                                                        ============<br>
                                                                        Kindly be notified that you have a scheduled class in less than half an hour.<br>
                                                                        Please use the following link to log in to your account:<br>
                                                                        <a href="https://qarabic.com/member-area/accounts/">https://qarabic.com/member-area/accounts/</a><br>
                                                                        JazakaAllah<br>
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
                                            <td align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 12px; mso-line-height-rule: exactly; line-height: 18px; font-weight: 400;color: #a1b4c4;">
                                                This is an automatically generated email.</td>
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
    // $mail->msgHTML('body');
    if($mail->send()) {
        echo 'Message has been sent';    
    } else {
        echo $mail->ErrorInfo;
    }
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
$parent_email = "sayed.khaled7123@gmail.com";
$parent_name = "sayed khaled";
$time_student_clock = "10:00 AM";
$student = "ahmed";
send_email($parent_email, $parent_name, $time_student_clock,$student);
