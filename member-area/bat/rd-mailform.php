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

$recipients = 'info@qarabic.com';
try {
    require './phpmailer/PHPMailerAutoload.php';

    preg_match_all("/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)/", $recipients, $addresses, PREG_OFFSET_CAPTURE);

    if (!count($addresses[0])) {
        die('MF001');
    }

    if (preg_match('/^(127\.|192\.168\.)/', $_SERVER['REMOTE_ADDR'])) {
        die('MF002');
    }

    $template = file_get_contents('rd-mailform.tpl');

    if (isset($_POST['form-type'])) {
        switch ($_POST['form-type']){
            case 'contact':
                $subject = $_POST['email'];
                break;
            case 'subscribe':
                $subject = $_POST['email'];
                break;
            case 'order':
                $subject = $_POST['email'];
                break;
            default:
                $subject = $_POST['email'];
                break;
        }
    }else{
        die('MF004');
    }

    if (isset($_POST['email'])) {
        $template = str_replace(
            ["<!-- #{FromState} -->", "<!-- #{FromEmail} -->"],
            ["Email:",$_POST['email']],
            $template);
    }else{
        die('MF003');
    }

    if (isset($_POST['message'])) {
        $template = str_replace(
            ["<!-- #{MessageState} -->", "<!-- #{MessageDescription} -->"],
            ["Message:", $_POST['message']],
            $template);
    }
    
    preg_match("/(<!-- #{BeginInfo} -->)(.|\n)+(<!-- #{EndInfo} -->)/", $template, $tmp, PREG_OFFSET_CAPTURE);
    foreach ($_POST as $key => $value) {
        if ($key != "email" && $key != "message" && $key != "form-type" && !empty($value)){
            $info = str_replace(
                ["<!-- #{BeginInfo} -->", "<!-- #{InfoState} -->", "<!-- #{InfoDescription} -->"],
                ["", ucfirst($key) . ':', $value],
                $tmp[0][0]);

            $template = str_replace("<!-- #{EndInfo} -->", $info, $template);
        }
    }

    $template = str_replace(
        ["<!-- #{Subject} -->", "<!-- #{SiteName} -->"],
        [$subject, $_SERVER['SERVER_NAME']],
        $template);

    $mail = new PHPMailer();
    $mail->From = $_POST['email'];
    $mail->FromName = "Student ".$_POST['name'];

    foreach ($addresses[0] as $key => $value) {
        $mail->addAddress($value[0]);
    }

    $mail->CharSet = 'utf-8';
    $mail->Subject = $subject;
    $mail->MsgHTML($template);

    if (isset($_FILES['attachment'])) {
        foreach ($_FILES['attachment']['error'] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $mail->AddAttachment($_FILES['attachment']['tmp_name'][$key], $_FILES['Attachment']['name'][$key]);
            }
        }
    }

    $mail->send();
   
// $INSTANCE_ID = '26';  // TODO: Replace it with your gateway instance ID here
// $CLIENT_ID = "eng.mohamedramadan00@gmail.com";  // TODO: Replace it with your Forever Green client ID here
// $CLIENT_SECRET = "ec7e64ff0da34fa4ab476c055478f8c4";   // TODO: Replace it with your Forever Green client secret here
// $postData = array(
//   'group_admin' => "+447418397601",//'+201012230774',//'+201112292690',  // TODO: Specify the WhatsApp number of the group creator, including the country code
//   'group_name' => "New Family Registration",//"New Family Registration",    // TODO: Specify the name of the group
//   'message' => "*New Student Request*
// *Name:*"." ".$_REQUEST['name']."
// *Email:*"." ".$_REQUEST['email']."
// *Phone:*"." ".$_REQUEST['phone']."
// *Country:*"." ".$_REQUEST['country']."
// *StudentAge:*"." ".$_REQUEST['studentAge']."
// *StudentGender:*"." ".$_REQUEST['StudentGender']."
// *Courses:*"." ".$_REQUEST['courses']."
// *Notes:*"." ".$_REQUEST['Notes'],
// );
// $headers = array(
//   'Content-Type: application/json',
//   'X-WM-CLIENT-ID: '.$CLIENT_ID,
//   'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
// );
// $url = 'http://api.whatsmate.net/v3/whatsapp/group/text/message/' . $INSTANCE_ID;
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
// $response = curl_exec($ch);
// curl_close($ch);
// //echo "Response: Test whatsapp msg ".$response;
   
   
   header("Location: https://qarabic.com/confirm/");
} catch (phpmailerException $e) {
    die('MF254');
} catch (Exception $e) {
    die('MF255');
}
require ("../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$date11 = date('h:i A', time());
$new_name =$_REQUEST['name'];
$new_email =$_REQUEST['email'];
$new_phone =$_REQUEST['phone'];
$new_skype =$_REQUEST['studentAge'];
$new_country =$_REQUEST['StudentGender'];
$new_city =$_REQUEST['courses'];
$new_message ="Country : ".$_REQUEST['country']."<br> Message :".$_REQUEST['Notes'];
$new_website =1;
mysql_query ("INSERT INTO new_request (name, email, phone, skype, country, city, message, date, time, site_id)
					VALUES('" . mysql_real_escape_string($new_name) . "','$new_email','" . mysql_real_escape_string($new_phone) . "','" . mysql_real_escape_string($new_skype) . "','" . mysql_real_escape_string($new_country) . "','" . mysql_real_escape_string($new_city) . "','" . mysql_real_escape_string($new_message) . "','$sy11','$date11','$new_website')");

?>