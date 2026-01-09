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
  include("../includes/session.php");
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");
?>
<?php
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$teacherid= $_POST['pteacher'];
			$studentid= $_POST['pstudent'];
			$teacher_time = $_POST['pstime1'];
			$teacher_date = $_POST['checkbox1'];
			$link = $_POST['link'];
			$dept = $_POST['dep'];
			$adept = $_POST['adep'];

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$studentid'")or die(mysql_error());
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
					$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzyphp = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"timezone_dif");
		
	$i++;	 
			}

$z = 48;
$tzt = $tzy_tech+$tzy_tech;
$tzs = $tzy_stud+$tzy_stud;
$x = $teacher_time+$tzs-$tzt;
if ($x < 0){
		$student_time = $z+$x;
		$a = -1;
		}
elseif ($x == 0){
		$student_time = $z;
		$a = -1;
	}
elseif ($x > 0 and $x < $z){
		$student_time = $x;
		$a = 0;
		}
elseif ($x == $z){
		$student_time = $x;
		$a = 0;
	}
elseif ($x > $z){
		$student_time = $x-$z;
		$a = 1;
	}
$y = $teacher_time+$tzt;		
if ($y < 0){
		$admin_time = $z+$y;
		$b = -1;
		}
elseif ($y == 0){
		$admin_time = $z;
		$b = -1;
	}
elseif ($y > 0 and $y < $z){
		$admin_time = $y;
		$b = 0;
		}
elseif ($y == $z){
		$admin_time = $y;
		$b = 0;
	}
elseif ($y > $z){
		$admin_time = $y-$z;
		$b = 1;
	}
$date = $teacher_date;
$date1 = str_replace('-', '/', $date);
$student_date = date('Y-m-d',strtotime("".$date1." ".$a." days"));
$admin_date = date('Y-m-d',strtotime("".$date1." ".$b." days"));

			header(
			"Location: save-re-add-schedule-class.php?teacher=".$teacherid."&student=".$studentid."&t_date=".$teacher_date."&s_date=".$student_date."&a_date=".$admin_date."&t_time=".$teacher_time."&s_time=".$student_time."&a_time=".$admin_time."&link=".$link."&dept=".$dept."&a_dept=".$adept."&parent_id=".$parent."");
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
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
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
				<a href="index.html"><img src="../../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
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
															<input type="date" name="checkbox1"  id="checkbox1" class="form-control">
															</div>
														<div class="col-md-3">
															<select class="form-control" name="pstime1"  id="pstime1" onchange="javascript: return optionList9_SelectedIndex()">
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
											<input type="hidden" name="link" size="20" value="<?php echo $_REQUEST['link']; ?>">
											<input type="hidden" name="dep" size="20" value="<?php echo $_REQUEST['dept_id']; ?>">
											<input type="hidden" name="adep" size="20" value="<?php echo $_REQUEST['adept_id']; ?>">
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