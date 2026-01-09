<?php
require("../includes/dbconnection.php");
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
date_default_timezone_set($TimeZoneCustome);

 $date = date('Y-m-d', time());

// Get the current time
$current_time = date("H:i:00",time());

// Convert current time to seconds
$current_time_seconds = strtotime($current_time);

// Add 30 minutes (1800 seconds) to the current time
$future_time_seconds = $current_time_seconds + 1800;

// Convert future time back to H:i:s format
 $future_time = date("H:i:00", $future_time_seconds);


$sql = "SELECT * FROM class_history WHERE date_admin = '$date' AND TIME(start_time_A) = '$future_time'";
// $sql = "SELECT * FROM class_history WHERE date_admin = '2023-05-28' AND TIME(start_time_A) = '20:20:00'";

$result = mysql_query($sql);
$numberOfRows = MYSQL_NUMROWS($result);


if ($numberOfRows == 0) {
  echo "no lesson";
} elseif ($numberOfRows > 0) {
  while ($row = mysql_fetch_assoc($result)) {
    $Hid1 = $row['history_id'];
    $Sid = $row['course_id'];
    $Pid = $row['parent_id'];
    $Tid = $row['teacher_id'];
    $timeS = $row['start_time_S'];
    $timeA = $row['start_time_A'];
    $time_student_clock = date('h:i A', strtotime($timeS));

    $sql = "SELECT * FROM course Where course_id = '$Sid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $student = $row['course_yrSec'];

    $sql2 = "SELECT group_id,send_status,email,parent_name FROM account Where parent_id = '$Pid'";
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_assoc($result2);
    $group = $row2['group_id'];
    $send_status = $row2['send_status'];
    $parent_email = $row2['email'];
    $parent_name = $row2['parent_name'];

    

    $sql3 = "SELECT status FROM public_setting Where id = '1'";
    $result3 = mysql_query($sql3);
    $row3 = mysql_fetch_assoc($result3);
    $status = $row3['status'];
   
    
    if ($status == '2') {
        // send email
        send_email($parent_email, $parent_name, $time_student_clock,$student);
    } else if ($status == '3') {
        //send whatsapp
        send_whatsapp($group,$student,$time_student_clock);
    } else if ($status == '1') {
        // as parent 
        if ($send_status == '1') {
            send_email($parent_email, $parent_name, $time_student_clock,$student);
        } else {
           send_whatsapp($group,$student,$time_student_clock); 
        }
    } else {
        
    }


  }
}


function send_whatsapp($group,$student,$time_student_clock) {
    $message = "*CLASS REMINDER*\r\n\r\n*Student Name:* " . $student . "\r\n*Time:* " . $time_student_clock . "\r\n============\r\nKindly be notified that you have a scheduled class in less than half an hour\r\nPlease use the following link to log in to your account:\r\nhttps://qarabic.com/member-area/accounts/\r\nJazakom Allah Khairan\r\nQarabic Academy";

    //$group ='Qarabic Ahmed Family';
    $INSTANCE_ID = '43';  // TODO: Replace it with your gateway instance ID here
    $CLIENT_ID = "qarabicacademy@gmail.com";  // TODO: Replace it with your Forever Green client ID here
    $CLIENT_SECRET = "5d4aac71c6af4c8c80cbd57d4e38f45d";   // TODO: Replace it with your Forever Green client secret heree
    $postData = array(
        'group_admin' => "+201003875047", //"+447418397601" // TODO: Specify the WhatsApp number of the group creator, including the country code
        'group_name' => $group,    // TODO: Specify the name of the group
        'message' => $message,  // TODO: Specify the content of your message
    );
    $headers = array(
        'Content-Type: application/json',
        'X-WM-CLIENT-ID: ' . $CLIENT_ID,
        'X-WM-CLIENT-SECRET: ' . $CLIENT_SECRET
    );
    $url = 'http://api.whatsmate.net/v3/whatsapp/group/text/message/' . $INSTANCE_ID;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    $response = curl_exec($ch);
    curl_close($ch);
}

    function send_email($parent_email, $parent_name, $time_student_clock,$student) {

        require 'PHPMailer-master/PHPMailerAutoload.php';

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
                                                                                JazakAllah Khairan<br>
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
        $mail->send();
        
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
