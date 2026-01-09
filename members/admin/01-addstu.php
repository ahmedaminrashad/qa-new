<?php
require ("../includes/dbconnection.php");
/*
		 	echo '<br>'.$_POST['txtcourse'];
		 	echo '<br>'.$_POST['pdept'];
		 	echo '<br>'.$_POST['aapdept'];
		 	echo '<br>'.$_POST['plan'];
		 	echo '<br>'.$_POST['txts'];
		 	echo '<br>'.$_POST['txtage'];
		 	echo '<br>'.$_POST['pgender'];
		 	echo '<br>'.$_POST['txts0'];
		 	echo '<br>'.$_POST['prate'];
		 	echo '<br>'.$_POST['pteacher'];
		 	echo '<br>'.$_POST['remarkp'];
		 	echo '<br>'.$_POST['remarkt'];
		 	echo '<br>'.$_POST['txtidp'];
		 	echo '<br>'.$_POST['trialp1'];
		 	echo '<br>'.$_POST['manp'];
		 	echo '<br>'.$_POST['ptimez'];
		 	echo '<br>'.$_POST['ptimedif'];
		 	echo '<br>'.$_POST['ptimename'];
		 	echo '<br>'.$_POST['ptimephp'];
		 	echo '<br>'.$_POST['tcsr'];
*/
		 	
		 	
		 	$course= $_POST['txtcourse'];
			$department = $_POST['pdept'];
			$aadepartment = $_POST['aapdept'];
			$langs = $_POST['plan'];
			$skype = $_POST['txts'];
			$age = $_POST['txtage'];
			$gender = $_POST['pgender'];
			$con = $_POST['txts0'];
			$nod = $_POST['prate'];
			$fee = 0;
			$teacher = $_POST['pteacher'];
			$trialp = $_POST['remarkp'];
			$trialt = $_POST['remarkt'];
			$p_id = $_POST['txtidp'];
			$strial = $_POST['trialp1'];
			$pmanp = $_POST['manp'];
			$tzp = $_POST['ptimez'];
			$tzdif = $_POST['ptimedif'];
			$tzname = $_POST['ptimename'];
			$tdate = $_POST['pdate'];
			$tzphp = $_POST['ptimephp'];
			$pcsr = $_POST['tcsr'];
			//$pcur = $_POST['tcur'];
			$abc = base64_encode($p_id);

			$sql = "INSERT INTO course(course_yrSec, dept_id, Skype_ID, Age, g_id, c_id, rate, Fee, Teacher, Trial_Class, remark_teacher, parent_id, m_id, active, tz_id, timezone, time_name,date,php_tz, lan_id, adept_id, csr_id)
					VALUES('$course','$department','$skype','$age','$gender','$con','$nod','$fee','$teacher','$trialp','$trialt','$p_id','$pmanp','$strial','$tzp','$tzdif','$tzname','$tdate','$tzphp','$langs','$aadepartment','$pcsr')";
 		if ($conn->query($sql) === TRUE) {
 		echo "<script>window.open('parent-accounts-profile?parent_id=".$abc."','_self')</script>";
 		}
 		
?>