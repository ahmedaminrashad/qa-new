<?php session_start(); ?>
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
<?php
  include("../includes/session1.php");
   require ("../includes/dbconnection.php");
  include("header.php");
  $user_id= $_SESSION['is']['user_id'];
  function abc($d, $t)
  {
			$pT =$_REQUEST['tech'];
			$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`Stime`.`stime_s` FROM `sched`,`course`,`Stime`  WHERE sched.course_id=course.course_id and sched.stime_s_id=Stime.stime_s_id HAVING teacher_id='$pT'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
					$trial = MYSQL_RESULT($result,$i,"status");
			 if ($hidden_pday == $d && $hidden_pstime == $t){	
			  		echo $hidden_pcourse;
						}
			 if ($hidden_pday == $d && $hidden_pstime == $t && $trial == 11){	
			  		echo "*";
						}
			 if ($hidden_pday == $d && $hidden_pstime == $t && $trial == 17){	
			  		echo "#";
						}			
	$i++;	 
			}
			}
	}
function color($d, $t){
$pT =$_REQUEST['tech'];
			$result = mysql_query("SELECT * FROM sched HAVING teacher_id = $pT and day_id = $d and time_s_id = $t
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '#CECE0F';
			}
		else if ($numberOfRows > 0) 
			{
			echo '#989800';
			 }
		}
function color2($d, $t){
$pT =$_REQUEST['tech'];
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$schedule_iti = MYSQL_RESULT($result,$i,"schedule_status");
			 if ($schedule_iti == 1){	
			  		echo '';
						}
			 elseif ($schedule_iti == 2){	
			  		echo '#000000';
						}
			
	$i++;	 
			}
			}
	}
?>
<?php
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$teacherid= $_POST['pteacher'];
			$student_name= $_POST['pstudent'];
			$teacher_time1 = $_POST['pstime1'];
			$teacher_time2 = $_POST['pstime2'];
			$teacher_time3 = $_POST['pstime3'];
			$teacher_time4 = $_POST['pstime4'];
			$teacher_time5 = $_POST['pstime5'];
			$teacher_time6 = $_POST['pstime6'];
			$teacher_time7 = $_POST['pstime7'];
			$hidden_proom = 1;
			$tday1 = $_POST['checkbox1'];
			$tday2 = $_POST['checkbox2'];
			$tday3 = $_POST['checkbox3'];
			$tday4 = $_POST['checkbox4'];
			$tday5 = $_POST['checkbox5'];
			$tday6 = $_POST['checkbox6'];
			$tday7 = $_POST['checkbox7'];

$result = mysql_query ("SELECT * FROM course WHERE course_id = $student_name")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$parent = MYSQL_RESULT($result,$i,"parent_id");
					$tzy = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzyphp = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$z = 48;
$tz = $tzy+$tzy;
$x1 = $teacher_time1+$tz;		
if ($x1 < 0){
		$student_time1 = $z+$x1;
		$a1 = -1;
		}
elseif ($x1 == 0){
		$student_time1 = $z;
		$a1 = -1;
	}
elseif ($x1 > 0 and $x1 < $z){
		$student_time1 = $x1;
		$a1 = 0;
		}
elseif ($x1 == $z){
		$student_time1 = $x1;
		$a1 = 0;
	}
elseif ($x1 > $z){
		$student_time1 = $x1-$z;
		$a1 = 1;
	}

$x2 = $teacher_time2+$tz;		
if ($x2 < 0){
		$student_time2 = $z+$x2;
		$a2 = -1;
		}
elseif ($x2 == 0){
		$student_time2 = $z;
		$a2 = -1;
	}
elseif ($x2 > 0 and $x2 < $z){
		$student_time2 = $x2;
		$a2 = 0;
		}
elseif ($x2 == $z){
		$student_time = $x2;
		$a2 = 0;
	}
elseif ($x2 > $z){
		$student_time = $x2-$z;
		$a2 = 1;
	}
	
$x3 = $teacher_time3+$tz;		
if ($x3 < 0){
		$student_time3 = $z+$x3;
		$a3 = -1;
		}
elseif ($x3 == 0){
		$student_time3 = $z;
		$a3 = -1;
	}
elseif ($x3 > 0 and $x3 < $z){
		$student_time3 = $x3;
		$a3 = 0;
		}
elseif ($x3 == $z){
		$student_time3 = $x3;
		$a3 = 0;
	}
elseif ($x3 > $z){
		$student_time3 = $x3-$z;
		$a3 = 1;
	}
	
$x4= $teacher_time4+$tz;		
if ($x4 < 0){
		$student_time4 = $z+$x4;
		$a4 = -1;
		}
elseif ($x4 == 0){
		$student_time4 = $z;
		$a4 = -1;
	}
elseif ($x4 > 0 and $x4 < $z){
		$student_time4 = $x4;
		$a4 = 0;
		}
elseif ($x4 == $z){
		$student_time4 = $x4;
		$a4 = 0;
	}
elseif ($x4 > $z){
		$student_time4 = $x4-$z;
		$a4 = 1;
	}
	
$x5 = $teacher_time5+$tz;		
if ($x5 < 0){
		$student_time5 = $z+$x5;
		$a5 = -1;
		}
elseif ($x5 == 0){
		$student_time5 = $z;
		$a5 = -1;
	}
elseif ($x5 > 0 and $x5 < $z){
		$student_time5 = $x5;
		$a5 = 0;
		}
elseif ($x5 == $z){
		$student_time5 = $x5;
		$a5 = 0;
	}
elseif ($x5 > $z){
		$student_time5 = $x5-$z;
		$a5 = 1;
	}
	
$x6 = $teacher_time6+$tz;		
if ($x6 < 0){
		$student_time6 = $z+$x6;
		$a6 = -1;
		}
elseif ($x6 == 0){
		$student_time6 = $z;
		$a6 = -1;
	}
elseif ($x6 > 0 and $x6 < $z){
		$student_time6 = $x6;
		$a6 = 0;
		}
elseif ($x6 == $z){
		$student_time = $x6;
		$a6 = 0;
	}
elseif ($x6 > $z){
		$student_time6 = $x6-$z;
		$a6 = 1;
	}
	
$x7 = $teacher_time7+$tz;		
if ($x7 < 0){
		$student_time7 = $z+$x7;
		$a7 = -1;
		}
elseif ($x7 == 0){
		$student_time7 = $z;
		$a7 = -1;
	}
elseif ($x7 > 0 and $x7 < $z){
		$student_time7 = $x7;
		$a7 = 0;
		}
elseif ($x7== $z){
		$student_time7 = $x7;
		$a7 = 0;
	}
elseif ($x7 > $z){
		$student_time7 = $x7-$z;
		$a7 = 1;
	}
	
$student_day1 = $tday1+$a1;
			if ($student_day1 == 0){ $sday1 = 7; }
			elseif ($student_day1 == 8){ $sday1 = 1; }
			else { $sday1 = $student_day1; }
$student_day2 = $tday2+$a2;
			if ($student_day2 == 0){ $sday2 = 7; }
			elseif ($student_day2 == 8){ $sday2 = 1; }
			else { $sday2 = $student_day2; }
$student_day3 = $tday3+$a3;
			if ($student_day3 == 0){ $sday3 = 7; }
			elseif ($student_day3 == 8){ $sday3 = 1; }
			else { $sday3 = $student_day3; }
$student_day4 = $tday4+$a4;
			if ($student_day4 == 0){ $sday4 = 7; }
			elseif ($student_day4 == 8){ $sday4 = 1; }
			else { $sday4 = $student_day4; }
$student_day5 = $tday5+$a5;
			if ($student_day5 == 0){ $sday5 = 7; }
			elseif ($student_day5 == 8){ $sday5 = 1; }
			else { $sday5 = $student_day5; }
$student_day6 = $tday6+$a6;
			if ($student_day6 == 0){ $sday6 = 7; }
			elseif ($student_day6 == 8){ $sday6 = 1; }
			else { $sday6 = $student_day6; }
$student_day7 = $tday7+$a7;
			if ($student_day7 == 0){ $sday7 = 7; }
			elseif ($student_day7 == 8){ $sday7 = 1; }
			else { $sday7 = $student_day7; }
$result = mysql_query ("SELECT * FROM sched") or die(mysql_error());
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$course = MYSQL_RESULT($result,$i,"course_id");
			$teacher = MYSQL_RESULT($result,$i,"teacher_id");
			$room = MYSQL_RESULT($result,$i,"room_id");
			$day = MYSQL_RESULT($result,$i,"day_id");
			$stime = MYSQL_RESULT($result,$i,"time_s_id");
			$sday = MYSQL_RESULT($result,$i,"sday_id");
			$sstime = MYSQL_RESULT($result,$i,"stime_s_id");
			if (($teacher == $teacher_name && $course == $student_name && $day == $tday1 && $stime == $teacher_time1) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday2 && $stime == $teacher_time2) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday3 && $stime == $teacher_time3) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday4 && $stime == $teacher_time4) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday5 && $stime == $teacher_time5) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday6 && $stime == $teacher_time6) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday7 && $stime == $teacher_time7)){
			   $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `sday`.`sday_name`, `Stime`.`stime_s`,
 `profile`.`teacher_name` FROM `sched`,`room`,`course`,`profile`,`timestart` ,`day`,`Stime`,`sday` WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id and sched.stime_s_id=Stime.stime_s_id and sched.sday_id=sday.sday_id 
 having sched_id = '$sched_id'
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$acourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$ateacher = MYSQL_RESULT($result,$i,"teacher_name");
			$aroom = MYSQL_RESULT($result,$i,"room_name");
			$aday = MYSQL_RESULT($result,$i,"day_name");
			$astime = MYSQL_RESULT($result,$i,"time_s");
			$asday = MYSQL_RESULT($result,$i,"day_name");
			$asstime = MYSQL_RESULT($result,$i,"time_s");
	$i++;	 
			}
			}
			$note = '<div class="alert alert-danger">* There is a conflict with the schedule of <b>' . $ateacher. '</b> with <b>' . $acourse. '</b> at <b>' . $astime.'</b></div>';
			$conflict = true;
			end;
			}
	$i++;	 
			}
			}
if ($conflict != true){
			header(
			"Location: save-schedule-local.php?teacher=$teacher_name&student=$student_name&s_time1=$student_time1&t_time1=$teacher_time1&s_time2=$student_time2&t_time2=$teacher_time2&s_time3=$student_time3&t_time3=$teacher_time3&s_time4=$student_time4&t_time4=$teacher_time4&s_time5=$student_time5&t_time5=$teacher_time5&s_time6=$student_time6&t_time6=$teacher_time6&s_time7=$student_time7&t_time7=$teacher_time7&td1=$tday1&td2=$tday2&td3=$tday3&td4=$tday4&td5=$tday5&td6=$tday6&td7=$tday7&sd1=$sday1&sd2=$sday2&sd3=$sday3&sd4=$sday4&sd5=$sday5&sd6=$sday6&sd7=$sday7&dept_id=$dept&adept_id=$adept&parent_id=$parent&time_php=$tzyphp&active=$stu_status");
		}
	}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $head_title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>

<style type="text/css">
.auto-style1 {
	color: #B70E0E;
}
.auto-style2 {
	color: #115911;
}
.auto-style3 {
	color: #0A0A87;
}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html"><img src="../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
 <?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add <small>New Schedule</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
								<?php echo $note; ?>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are adding a schedule
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add Schedule
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher</strong></label>
															<div class="col-md-9">
															<input type="hidden" class="form-control" value="<?php echo $_REQUEST['tech']; ?>" name="pteacher" id="pteacher">
															<input readonly type="text" class="form-control" value="<?php $tyt = $_REQUEST['tech']; $result = mysql_query("SELECT * FROM profile Where teacher_id = $tyt");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"teacher_id");
	
			  		echo $hidden_pt;
	$i++;	 
			}
			} ?>">
															</div>
												</div>
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student</strong></label>
															<div class="col-md-9">
															<input type="hidden" class="form-control" value="<?php echo $_REQUEST['Course_ID']; ?>" name="pstudent" id="pstudent">
															<input readonly type="text" class="form-control" value="<?php echo $_REQUEST['studentName']; ?>">
															</div>
												</div>
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher Day/Time</strong></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox1"  id="checkbox1" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sched_day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime1"  id="pstime1" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php 
								$pT =$_REQUEST['tech'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = '$pT'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option value="<?php echo $tr;?>"><?php echo $time;?> (<?php echo abc('2','1'); ?>)</option>
<?php }
	$i++;	 
			}
			} 
			 ?>
                  </select>
															</div>
												</div>
											<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox2"  id="checkbox2" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sched_day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime2"  id="pstime2" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox3"  id="checkbox3" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
			 <?php $pT =$_REQUEST['pT'];
								$time = "12:00-12:30";
								$tr = "1";
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
			{				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<option style="background:<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>" value="<?php echo $time;?>"><?php echo $time;?> </option>
<?php }
	$i++;	 
			}
			} 
			 ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime3"  id="pstime3" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox4"  id="checkbox4" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sched_day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime4"  id="pstime4" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox5"  id="checkbox5" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sched_day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime5"  id="pstime5" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox6"  id="checkbox6" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sched_day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime6"  id="pstime6" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-3">
															<select class="form-control" name="checkbox7"  id="checkbox7" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sched_day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime7"  id="pstime7" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
															</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<a href="<?php echo $_REQUEST['link']; ?>"></a><button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>
											<input type="hidden" name="pteacher" size="20" value="<?php echo $pT; ?>">
											<input type="hidden" name="link" size="20" value="<?php echo $_REQUEST['link']; ?>">
										</form>
										<!-- END FORM-->
									</div>
								</div>
							<!-- END PAGE CONTENT INNER -->
			
	<!-- BEGIN SAMPLE TABLE PORTLET-->
	<!-- END PAGE CONTENT -->
<!-- END PAGE CONTAINER -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo $fot; ?>