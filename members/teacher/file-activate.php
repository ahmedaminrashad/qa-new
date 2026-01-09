<?php
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/email_details.php");
date_default_timezone_set($TimeZoneCustome);

$date = date('d/m/Y', time());

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = $email_server_info;
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->SMTPSecure = 'tls';
$mail->Port = $port;
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

date_default_timezone_set($TimeZoneCustome);
$time_start = date(" g:i:A", time(true));
$time_start1 = date('Y-m-d H:i:s');
$Sid =$_REQUEST['Sid'];
  $Tid =$_REQUEST['Tid'];
  $Pid =$_REQUEST['Pid'];
  $history =$_REQUEST['history_id'];
  $Sid =$_REQUEST['Sid'];
  $Tid =$_REQUEST['Tid'];
  $Pid =$_REQUEST['Pid'];
  $history =$_REQUEST['history_id'];
$sql = "SELECT * FROM course Where course_id = '$Sid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$student = $row['course_yrSec'];
					}
					}
$sql = "SELECT * FROM profile Where teacher_id = '$Tid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$teacher = $row['teacher_name'];
					$link = $row['link'];
}
}
$sql = "SELECT * FROM account Where parent_id = '$Pid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$group = $row['group_id'];
					$whats_email = $row['whats_email'];
					$zoomaction = $row['zoomaction'];
					$email = $row['email'];
					$parent_name = $row['parent_name'];
					}
					}
?>
<?php
	$history =$_REQUEST['history_id'];
	$sql = "UPDATE class_history SET monitor_id = '2', activation = '$time_start', start_time = '$time_start1', end_time = '$time_start1' WHERE history_id = '$history'";  
	if ($conn->query($sql) === TRUE) {
echo '';
}
if ($zoomaction == 1){ header("Location: teacher-home"); }
elseif ($zoomaction == 2){
if ($whats_email == 'email'){
include("../includes/main-var.php");
$mail->addAddress($email, $parent_name);
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
    .auto-style1 {
		font-family: Arial, sans-serif;
		font-size: 32px;
		color: #FFFFFF;
		letter-spacing: 1px;
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
                          <td align="left" valign="top" style="mso-line-height-rule: exactly; line-height: 32px; " class="auto-style1">
						  Class Notification</td>
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
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 22px; font-weight: 400;color: #302f35;">This is a request 
						  to join class at: 
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
                          	Assalam-o-Aliakum '.$row['parent_name'].'!
                          </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                	<td align="center" valign="top">
                                    &nbsp;</td>
                              </tr>
                              <tr>
                                <td height="12" style="height: 12px; line-height:12px;"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700;"></td>
                              </tr>
                              <tr> 
                                      <td align="center" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;"><br><font color="blue">Teacher '.$teacher.' is waiting for the student in the class room. Please Join the meeting through the link Below</font></td>
                                    </tr>
                                    <tr> 
                                      <td align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;"><br><a href="https://www.'.$site_nameS.'/members/accounts/your-class?s='.base64_encode($history).'&t='.base64_encode($Tid).'" ><button class="button" style="vertical-align:middle"><span><b>Join Class</b></span></button></a></td>
                                    </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                <br>If the class link does not work properly, please contact <strong>'.$email3.'</strong><br>
<br><br><font size="2" color="red">This is a software generated request. Please do not reply.</font><br><br>
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
        header("Location: ".$link."");
       // break; //Abandon sending
    } else {
        header("Location: ".$link."");
        //Mark it as sent in the DB
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}
elseif ($whats_email == 'whatsapp'){
include("../includes/main-var.php");
include("../includes/01-var.php");
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*CLASS NOTIFICATION*\r\n\r\n*Teacher Name:* ".$teacher."\r\n*Student Name:* ".$student."\r\nTeacher is waiting for the student in the class room. Please Join the meeting through\r\n*Meeting Link:* https://www.".$site_nameS."/members/accounts/your-class?s=".base64_encode($history)."&t=".base64_encode($Tid)."\r\n\r\n*This is an auto generated message by the system, please do not reply on this number.*";
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
header("Location: ".$link."");
curl_close($ch);
}
}
?>