<?php
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/email_details.php");
  include("header.php");
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
  
date_default_timezone_set($TimeZoneCustome);
$time_start = date(" g:i:A", time(true));
$time_start1 = date('Y-m-d H:i:s');
  $dept =$_REQUEST['dept'];
  $lesson =$_REQUEST['lesson'];
  $description =$_REQUEST['description'];
  $homework =$_REQUEST['homework'];
  $adept =$_REQUEST['adept'];
  $alesson =$_REQUEST['alesson'];
  $adescription =$_REQUEST['adescription'];
  $note =$_REQUEST['note'];
  $Pid =$_REQUEST['parent_id'];
  $Sid =$_REQUEST['student'];
  $remarks =$_REQUEST['remarks'];
$sql = "SELECT * FROM remaks Where remk_id = '$remarks'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$rem = $row['remak'];
}
			}
$sql = "SELECT * FROM dept Where dept_id = '$dept'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$main_dept = $row['department'];
}
			}

$sql = "SELECT * FROM dept Where dept_id = '$adept'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$add_dept = $row['department'];
}
			}

$sql = "SELECT * FROM lesson_pages Where lesson_id = '$lesson'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$main_lesson = $row['lesson_name'];
}
			}

$sql = "SELECT * FROM lesson_pages Where lesson_id = '$alesson'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$add_lesson = $row['lesson_name'];
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
$sql = "SELECT * FROM course Where course_id = '$Sid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
	$nameSS = $row['course_yrSec'];
	}
			}
?>
<?php
if ($whats_email == 'email'){
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
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 24px; mso-line-height-rule: exactly; line-height: 30px; font-weight: 700;color: #302f35;">
                          	                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 24px; mso-line-height-rule: exactly; line-height: 30px; font-weight: 700;color: #302f35;">
                          	Todays Class Lesson Details!
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
                                <td align="left" valign="top" style="padding: 0 10px 0 0;font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;font-weight: 700; width: 208px;"><br><font color="blue">Student Name: '.$nameSS.'<br>Course: '.$main_dept.'<br>Lesson: '.$main_lesson.'<br>Lesson Discription: '.$description.'<br>HomeWork Details: '.$homework.'</font></td>
                              </tr>
                                    <tr> 
                                      <td align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;"><br></td>
                                    </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 14px; mso-line-height-rule: exactly; line-height: 20px; font-weight: 400;color: #302f35;">
                                <br><font size="2" color="red">This is a software generated request. Please do not reply.</font><br><br>
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
        echo "<script>window.open('01-check-sub?parent_id=".$Pid."','_self')</script>";
       // break; //Abandon sending
    } else {
        echo "<script>window.open('01-check-sub?parent_id=".$Pid."','_self')</script>";
        //Mark it as sent in the DB
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}
elseif ($whats_email == 'whatsapp'){
include("../includes/01-var.php");
$INSTANCE_ID = $INS_ID;  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = $CL_ID;  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = $SEC;   // TODO: Replace it with your Forever Green client secret here
$msg = "*TODAY'S CLASS LESSON DETAILS*\r\n\r\n*Student Name:* ".$nameSS."\r\n*Course: ".$main_dept."*\r\n*Lesson:* ".$main_lesson."\r\n*Lesson Discription:* ".$description."\r\n*HomeWork Details:* ".$homework."\r\n
*Additional Course:* ".$add_dept."\r\n*Additional Lesson:* ".$add_lesson."\r\n*Additional Lesson Discription:* ".$adescription."\r\n*Remarks by Teacher:* ".$rem."\r\n*Note by Teacher:* ".$note."\r\n";
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
//header("Location: teacher-home");
echo "<script>window.open('01-check-sub?parent_id=".$Pid."','_self')</script>";
curl_close($ch);
}
?>