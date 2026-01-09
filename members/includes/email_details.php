<?php
include("dbconnection.php");
include("main-var.php");
date_default_timezone_set($TimeZoneCustome);
$sql = "SELECT * FROM settings_email WHERE id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched = $row['id'];
					$sever1= $row['sever1'];
					$email1= $row['email1'];
					$email2= $row['email2'];
					$email3= $row['email3'];
					$pass1= $row['pass1'];
					$pass2= $row['pass2'];
					$pass3= $row['pass3'];
					$port= $row['port'];
			}
			}
$port = $port;
//Create info email account varaibles for SMTP mail server
$email_server_info=$sever1;
$email_info=$email1;
$email_pass_info=$pass1;
$company_name_info='Admin '.$site_nameC.'';
$subject_info='Account Login Details at www.'.$site_nameC.'';

//Create accounts email account varaibles for SMTP mail server
$email_server_accounts=$sever1;
$email_accounts=$email2;
$email_pass_accounts=$pass2;
$company_name_accounts='Accounts at '.$site_nameC.'';
$subject_accounts='Invoice Request';

//Create info email account varaibles for SMTP mail server
$email_server_sched=$sever1;
$email_sched=$email3;
$email_pass_sched=$pass3;
$company_name_sched='Admin '.$site_nameC.'';
$subject_sched='Online Arabic Classes';
?>