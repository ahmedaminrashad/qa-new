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
  include("header.php");
  $user_id= $_SESSION['is']['user_id'];
?>
<?php
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$teacherid= $_POST['pteacher'];
			$student_name= $_POST['pstudent'];
			$student_time = $_POST['pstime'];
			$hidden_proom = 1;
			$sday1 = $_POST['checkbox1'];
			$sday2 = $_POST['checkbox2'];
			$sday3 = $_POST['checkbox3'];
			$sday4 = $_POST['checkbox4'];
			$sday5 = $_POST['checkbox5'];
			$sday6 = $_POST['checkbox6'];
			$sday7 = $_POST['checkbox7'];

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
$x = $student_time-$tz;		
if ($x < 0){
		$teacher_time = $z+$x;
		$a = -1;
		}
elseif ($x == 0){
		$teacher_time = $z;
		$a = -1;
	}
elseif ($x > 0 and $x < $z){
		$teacher_time = $x;
		$a = 0;
		}
elseif ($x == $z){
		$teacher_time = $x;
		$a = 0;
	}
elseif ($x > $z){
		$teacher_time = $x-$z;
		$a = 1;
	}

$teacher_day1 = $sday1+$a;
			if ($teacher_day1 == 0){ $tday1 = 7; }
			if ($teacher_day1 == 8){ $tday1 = 1; }
			else { $tday1 = $teacher_day1; }
$teacher_day2 = $sday2+$a;
			if ($teacher_day2 == 0){ $tday2 = 7; }
			if ($teacher_day2 == 8){ $tday2 = 1; }
			else { $tday2 = $teacher_day2; }
$teacher_day3 = $sday3+$a;
			if ($teacher_day3 == 0){ $tday3 = 7; }
			if ($teacher_day3 == 8){ $tday3 = 1; }
			else { $tday3 = $teacher_day3; }
$teacher_day4 = $sday4+$a;
			if ($teacher_day4 == 0){ $tday4 = 7; }
			if ($teacher_day4 == 8){ $tday4 = 1; }
			else { $tday4 = $teacher_day4; }
$teacher_day5 = $sday5+$a;
			if ($teacher_day5 == 0){ $tday5 = 7; }
			if ($teacher_day5 == 8){ $tday5 = 1; }
			else { $tday5 = $teacher_day5; }
$teacher_day6 = $sday6+$a;
			if ($teacher_day6 == 0){ $tday6 = 7; }
			if ($teacher_day6 == 8){ $tday6 = 1; }
			else { $tday6 = $teacher_day6; }
$teacher_day7 = $sday7+$a;
			if ($teacher_day7 == 0){ $tday7 = 7; }
			if ($teacher_day7 == 8){ $tday7 = 1; }
			else { $tday7 = $teacher_day7; }

$result = mysql_query ("SELECT * FROM sched")or die(mysql_error());
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
			if ((( $teacher == $teacher_name or $course == $student_name) && (($day == $tday1 or $day == $tday2 or $day == $tday3 or $day == $tday4 or $day == $tday5 or $day == $tday6 or $day == $tday7) and  $stime == $teacher_time))){
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
			"Location: save-schedule.php?teacher=$teacher_name&student=$student_name&s_time=$student_time&t_time=$teacher_time&td1=$tday1&td2=$tday2&td3=$tday3&td4=$tday4&td5=$tday5&td6=$tday6&td7=$tday7&sd1=$sday1&sd2=$sday2&sd3=$sday3&sd4=$sday4&sd5=$sday5&sd6=$sday6&sd7=$sday7&dept_id=$dept&adept_id=$adept&parent_id=$parent&time_php=$tzyphp&active=$stu_status");
		}
	}
?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and inout_id = 1 and schedule_status = 1 and training = 1";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['teacher_id'], "val" => $row['teacher_name']);
  }

  $query = "SELECT * FROM course";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['Teacher']][] = array("id" => $row['course_id'], "val" => $row['course_yrSec']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
date_default_timezone_set("Africa/Cairo");
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
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
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
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var Teacher = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[Teacher].length; i++){
          subcatSelect.options[i] = new Option(subcats[Teacher][i].val,subcats[Teacher][i].id);
        }
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
<body onload='loadCategories()'>
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
															<select class="form-control" name="pteacher" id="categoriesSelect"></select>
															</div>
												</div>
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student</strong></label>
															<div class="col-md-9">
															<select class="form-control" name="pstudent" id="subcatsSelect"></select>
															</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student Time</strong></label>
															<div class="col-md-9">
															<select class="form-control" name="pstime"  id="pstime" onchange="javascript: return optionList9_SelectedIndex()">
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
									<label class="control-label col-md-3">
												<strong>Student Day</strong></label>
									<div class="md-checkbox-inline">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox1" value="1" id="checkbox1" class="md-check">
											<label for="checkbox1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Mon </label>
											<select class="form-control" name="pstime7"  id="pstime7" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    </select>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox2" value="2" id="checkbox2" class="md-check">
											<label for="checkbox2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Tue </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox3" value="3" id="checkbox3" class="md-check">
											<label for="checkbox3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Wed </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox4" value="4" id="checkbox4" class="md-check">
											<label for="checkbox4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Thu </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox5" value="5" id="checkbox5" class="md-check">
											<label for="checkbox5">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Fri </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox6" value="6" id="checkbox6" class="md-check">
											<label for="checkbox6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Sat </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox7" value="7" id="checkbox7" class="md-check">
											<label for="checkbox7">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Sun </label>
										</div>
									</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>
											<input type="hidden" name="pteacher" size="20" value="<?php echo $pT; ?>">
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