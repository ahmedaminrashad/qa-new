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
  $pT =$_REQUEST['pT'];
  function abc($d, $t)
  {
  $pT =$_REQUEST['pT'];
			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`profile`.`teacher_name`,`Stime`.`stime_s` FROM `sched`,`room`,`course`,`profile`,`Stime`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id and sched.stime_s_id=Stime.stime_s_id
 HAVING teacher_id='$pT'
  			");
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
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
					$trial = MYSQL_RESULT($result,$i,"status");
			 if ($hidden_pday == $d && $hidden_pstime == $t){	
			  		echo ''.$hidden_pcourse.'';
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
$pT =$_REQUEST['pT'];
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
$pT =$_REQUEST['pT'];
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
function blocked($d){
$pT =$_REQUEST['pT'];
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
			  		echo "<h4><font color='#EE1B1B'> <b>Schedule Blocked</b></font><h4>";
						}
			
	$i++;	 
			}
			}
	}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: www.tarteeltechnologies.com/
Contact: info@tarteeltechnologies.com
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>FemaleQuranTeachers | Online Learning Portal</title>
<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta https-equiv="Content-type" content="text/html; charset=utf-8">
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
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../assets/admin/pages/css/todo.css"/>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../new/header.js"></script>
		<script type="text/javascript" src="../new/redips-drag-min.js"></script>
		<script type="text/javascript" src="../new/script.js"></script>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
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
				<h1>Admin Home<small>Today's Classes</small></h1>
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
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					 <a href="list-of-teachers">List of Teachers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Schedule of Teacher <?php 
$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$pT'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$teacher = MYSQL_RESULT($result1,$i,"teacher_name");
				}			
		echo $teacher; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<?php echo blocked('$pT'); ?>
					<h4><a href="teacher-schedule-time?pT=<?php echo $pT; ?>"><?php 
$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$pT'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$teacher = MYSQL_RESULT($result1,$i,"teacher_name");
			$sss = MYSQL_RESULT($result1,$i,"schedule_status");
				}			
		echo "Teacher Name: <font color='#44B6AE'> <b>$teacher</b></font>"; ?></a> <?php
			$result = mysql_query("SELECT `sched`.*,`room`.`room_name`,`course`.`course_yrSec`,`profile`.`teacher_name`,`timestart`.`time_s`,`day`.`day_name`,`sday`.`sday_name`,`Stime`.`stime_s`,`dept`.`department` FROM `sched`,`room`,`course`,`profile`,`timestart`,`day`,`Stime`,`sday`,`dept` WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id and sched.stime_s_id=Stime.stime_s_id and sched.sday_id=sday.sday_id and sched.dept_id=dept.dept_id
 HAVING teacher_id='$pT'
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
echo "Classes in a Week: <font color='#44B6AE'> <b>$numberOfRows</b></font>";
?></h4>
						<div class="portlet-body">
							<div class="table-responsive">
							<div id="redips-drag">
								<table id="table1" class="table table-striped table-bordered">
								<thead>
								<tr>
									<th><a href="teacher-schedule-print?pT=<?php echo $pT; ?>">Night AM</a></th>
									<th>MONDAY</th>
									<th>TUESDAY</th>
									<th>WEDNESDAY</th>
									<th>THURSDAY</th>
									<th>FRIDAY</th>
									<th>SATURDAY</th>
									<th>SUNDAY</th>
								</tr>
								</thead>
<tbody><tr>
<td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','1'); ?><?php echo color2('1','1'); ?>"></td>
<td bgcolor="<?php echo color('2','1'); ?><?php echo color2('2','1'); ?>"><div id="d1" class="redips-drag t1"><font color="#FFFFFF">Ali</font></div></td>
<td bgcolor="<?php echo color('3','1'); ?><?php echo color2('3','1'); ?>"><div id="d2" class="redips-drag t1"><font color="#FFFFFF">Ali</font></div></td>
<td bgcolor="<?php echo color('4','1'); ?><?php echo color2('4','1'); ?>"><div id="d3" class="redips-drag t1"><font color="#FFFFFF">Ali</font></div></td>
<td bgcolor="<?php echo color('5','1'); ?><?php echo color2('5','1'); ?>"><div id="d4" class="redips-drag t1"><font color="#FFFFFF">Ali</font></div></td>
<td bgcolor="<?php echo color('6','1'); ?><?php echo color2('6','1'); ?>"><div id="d5" class="redips-drag t1"><font color="#FFFFFF">Ali</font></div></td>
<td bgcolor="<?php echo color('7','1'); ?><?php echo color2('7','1'); ?>"></td>
</tr><tr>
<td>12:30</td>
<td bgcolor="<?php echo color('1','2'); ?><?php echo color2('1','2'); ?>"></td>
<td bgcolor="<?php echo color('2','2'); ?><?php echo color2('2','2'); ?>"></td>
<td bgcolor="<?php echo color('3','2'); ?><?php echo color2('3','2'); ?>"></td>
<td bgcolor="<?php echo color('4','2'); ?><?php echo color2('4','2'); ?>"></td>
<td bgcolor="<?php echo color('5','2'); ?><?php echo color2('5','2'); ?>"></td>
<td bgcolor="<?php echo color('6','2'); ?><?php echo color2('6','2'); ?>"></td>
<td bgcolor="<?php echo color('7','2'); ?><?php echo color2('7','2'); ?>"></td>
</tr></tbody>
							</table>
							<div><input type="button" value="Save1" class="button" onclick="save('plain')" title="Send content to the server (it will only show accepted parameters)"/><span class="message_line">Save content of the first table (plain query string)</span></div>
			<div><input type="button" value="Save2" class="button" onclick="save('json')" title="Send content to the server (it will only show accepted parameters)"/><span class="message_line">Save content of the first table (JSON format)</span></div>
			<div><input type="radio" name="drop_option" class="checkbox" onclick="setMode(this)" value="multiple" title="Enabled dropping to already taken table cells" checked="true"/><span class="message_line">Enable dropping to already taken table cells</span></div>
			<div><input type="radio" name="drop_option" class="checkbox" onclick="setMode(this)" value="single" title="Disabled dropping to already taken table cells"/><span class="message_line">Disable dropping to already taken table cells</span></div>
			<div><input type="radio" name="drop_option" class="checkbox" onclick="setMode(this)" value="switch" title="Switch content"/><span class="message_line">Switch content</span></div>
			<div><input type="radio" name="drop_option" class="checkbox" onclick="setMode(this)" value="switching" title="Switching content continuously"/><span class="message_line">Switching content continuously</span></div>
			<div><input type="radio" name="drop_option" class="checkbox" onclick="setMode(this)" value="overwrite" title="Overwrite content"/><span class="message_line">Overwrite content</span></div>
			<div><input type="checkbox" class="checkbox" onclick="toggleDeleteCloned(this)" title="Remove cloned object if dragged outside of any table" checked="true"/><span class="message_line">Remove cloned element if dragged outside of any table</span></div>
			<div><input type="checkbox" class="checkbox" onclick="toggleConfirm(this)" title="Confirm delete"/><span class="message_line">Confirm delete</span></div>
			<div><input type="checkbox" class="checkbox" onclick="toggleDragging(this)" title="Enable dragging" checked="true"/><span class="message_line">Enable dragging</span></div>
			</div>
			</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>