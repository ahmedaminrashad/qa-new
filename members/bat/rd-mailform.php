<?php

$recipients = 'info@ayainstitute.com';
//$recipients = '#';

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
            ["Email:", $_POST['email']],
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
    $mail->FromName = $_POST['name'];

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

    header("Location: https://ayainstitute.com/thank-you");
} catch (phpmailerException $e) {
    die('MF254');
} catch (Exception $e) {
    die('MF255');
}
require ("../includes/dbconnection.php");
include("../includes/email_details.php");
include("../includes/01-var.php");
$sy11 = date('Y-m-d');
$date11 = date('h:i A', time());
$new_name =$_REQUEST['name'];
$new_email =$_REQUEST['email'];
$new_phone =$_REQUEST['phone'];
$new_age =$_REQUEST['age'];
$new_gender =$_REQUEST['gender'];
$new_course =$_REQUEST['course'];
$new_country =$_REQUEST['country'];
$new_city =$_REQUEST['city'];
$new_message =$_REQUEST['message'];
$new_website =$_REQUEST['website'];
$sql = "INSERT INTO new_request (name, email, phone, skype, country, city, message, date, time, site_id, age, gender, course)
					VALUES('" . mysqli_real_escape_string($conn, $new_name) . "','$new_email','" . mysqli_real_escape_string($conn, $new_phone) . "','" . mysqli_real_escape_string($conn, $new_skype) . "','" . mysqli_real_escape_string($conn, $new_country) . "','" . mysqli_real_escape_string($conn, $new_city) . "','" . mysqli_real_escape_string($conn, $new_message) . "','$sy11','$date11','$new_website','$new_age','$new_gender','$new_course')";
if ($conn->query($sql) === TRUE) {
echo '';
}
?>