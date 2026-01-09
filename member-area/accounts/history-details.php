<?php if (empty($session)) { session_start(); } 
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
?>
<?php
  include("../includes/session.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
function lesson($er)
{
// sending query
   $result = mysql_query("SELECT * FROM lesson_pages Where lesson_id = $er");
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
					$l_name = MYSQL_RESULT($result,$i,"lesson_name");
			  		echo $l_name;
	$i++;	 
			}
			}
	}
	
function course($er)
{
// sending query
   $result = mysql_query("SELECT * FROM dept Where dept_id = $er");
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
					$c_name = MYSQL_RESULT($result,$i,"department");
			  		echo $c_name;
	$i++;	 
			}
			}
	}
  
?>
<?php echo $main_header; ?>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id ='$tt'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
 ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id ='$tt'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot1 = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '0';
	}
else if ($numberOfRowsot1 > 0) 
	{
	echo $numberOfRowsot1;
	}
 ?> Invoice(s)</strong> unpaid</h3>
								<a href="ind_details">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/user-alt-128.png">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['parent']; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Student<small> Class Report</small></h1>
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
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Student Class Report
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<?php
					$ccc =$_REQUEST['cour'];
					$ddd =$_REQUEST['adate'];
$result = mysql_query("SELECT `class_history`.*,`course`.`course_yrSec`,`monitor`.`mnt_name`,`remaks`.`remak`,`profile`.`teacher_name` FROM `class_history`,`course`,`monitor`,`remaks`,`profile` WHERE class_history.course_id=course.course_id and class_history.monitor_id=monitor.mnt_id and class_history.teacher_remarks=remaks.remk_id and class_history.teacher_id=profile.teacher_id HAVING course_id = '$ccc' AND date_admin = '$ddd'") or die(mysql_error());
	if (!$result) 
		{
		die("Query to etyeriled");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$hid = MYSQL_RESULT($result,$i,"history_id");
			$student = MYSQL_RESULT($result,$i,"course_yrSec");
			$remarkst = MYSQL_RESULT($result,$i,"remak");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$a_date = MYSQL_RESULT($result,$i,"date_admin");
			$re_a_date = MYSQL_RESULT($result,$i,"re_date_admin");
			$le_a_date = MYSQL_RESULT($result,$i,"le_date_admin");
			$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
			$stur_course_id = MYSQL_RESULT($result,$i,"course_id");
			$st = MYSQL_RESULT($result,$i,"start_time");
			$et = MYSQL_RESULT($result,$i,"end_time");
			$sabuq = MYSQL_RESULT($result,$i,"sabaq");
			$sabuqi = MYSQL_RESULT($result,$i,"sabaqi");
			$manz = MYSQL_RESULT($result,$i,"manzil");
			$r_course_id = MYSQL_RESULT($result,$i,"dept_id");
			$r_lesson_id = MYSQL_RESULT($result,$i,"lesson_id");
			$r_lesson_des = MYSQL_RESULT($result,$i,"lesson_discription");
			$a_course_id = MYSQL_RESULT($result,$i,"adept_id");
			$a_lesson_id = MYSQL_RESULT($result,$i,"alesson_id");
			$a_lesson_des = MYSQL_RESULT($result,$i,"additional_des");
			$monitor = MYSQL_RESULT($result,$i,"mnt_name");
			$restatus = MYSQL_RESULT($result,$i,"re_status");
			$typid = MYSQL_RESULT($result,$i,"type_id");
			$status = MYSQL_RESULT($result,$i,"status");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$s_date = MYSQL_RESULT($result,$i,"date_student");
			$mnp_id = MYSQL_RESULT($result,$i,"monitor_id");
			
?>
									<div class="row">
					<div class="col-md-6">
					<div class="portlet light">
									<h4>
									<font color="#44B6AE"> <b>Class Details:</b> </font>
									</h4>
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Student:</td>
								<td> <b><?php echo $student; ?></b></td>
								</tr>
								<tr>
								<td>Teacher:</td>
								<td> <b><?php echo $teacher; ?></b></td>
								</tr>
								<tr>
								<td>Date:</td>
								<td> <b><?php echo $s_date; ?></b></td>
								</tr>
								<tr>
								<td>Duration:</td>
								<td> <b><?php $start_date = new DateTime("$st");
    $end_date = new DateTime("$et");
    $interval = $start_date->diff($end_date);
    echo "" . $interval->h. " hours, " . $interval->i." mins, ".$interval->s." sec "; ?></b></td>
								</tr>
								<tr>
								<td>Class Status:</td>
								<td><b><?php if ($status == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } 
								elseif ($status == 17){ echo '<span class="label label-sm label-danger">Suspended</span>'; } 
								elseif ($status == 18){ echo '<span class="label label-sm label-danger">Shifted</span>'; }
								elseif ($status == 19){ echo '<span class="label label-sm label-danger">Advance for ('.$le_a_date.')</span>'; } 
								elseif ($status == 20){ echo '<span class="label label-sm label-danger">Re-Scheduled for ('.$le_a_date.')</span>'; } 
								else { echo '<span class="label label-sm label-success">Regular</span>'; } ?> 
								<span class="label label-sm label-success"><?php if ($mnp_id != 8){ echo $monitor; } else { echo '{Taken Advanced on ('.$re_a_date.')}';} ?></span> 
								<span class="label label-sm label-danger"><?php if ($restatus == 2){echo '{Re-Scheduled on ('.$re_a_date.')}';} else {echo '';} ?></span>
								</b> </td>
								</tr>
								<tr>
								</tr>
								<tr>
								<td>Remarks:</td>
								<td> <b><?php echo $remarkst; ?></b></td>
								</tr>
								</tbody>
								</table>
								<h4>
									<font color="#44B6AE"> <b>Regular Lesson Details:</b></font>
									</h4>
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Course:</td>
								<td><b><?php echo course("$r_course_id"); ?></b></td>
								</tr>
								<tr>
								<td>Lesson Page:</td>
								<td><b><?php echo lesson("$r_lesson_id"); ?></b>&nbsp;&nbsp;<a href="lesson-page?c_id=<?php echo $r_lesson_id; ?>&did=<?php echo $r_course_id; ?>"><?php if ($r_lesson_id == 100){echo '';} else{ echo '<button type="button" class="btn green btn-xs">See Lesson</button>'; } ?></a></td>
								</tr>
								<tr>
								<td>Discription:</td>
								<td>
								<?php if ($r_course_id != 3){ echo '<b>'.$r_lesson_des.'</b>'; } elseif ($r_course_id == 3){ echo 'Sabaq:  <b>'.$sabuq.'</b><br> Sabaqi:  <b>'.$sabuqi.'</b><br>Manzil:   <b>'.$manz.'</b>'; }?>
								</td>
								</tr>
								</tbody>
								</table>
								<h4>
									<font color="#44B6AE"> <b>Additional Lesson Details:</b></font>
									</h4>
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Course:</td>
								<td><b><?php echo course("$a_course_id"); ?></b></td>
								</tr>
								<tr>
								<td>Lesson Page:</td>
								<td><b><?php echo lesson("$a_lesson_id"); ?></b>&nbsp;&nbsp;<a href="lesson-page?c_id=<?php echo $a_lesson_id; ?>&did=<?php echo $a_course_id; ?>"><?php if ($a_lesson_id == 100 OR $a_lesson_id == 0){echo '';} else{ echo '<button type="button" class="btn green btn-xs">See Lesson</button>'; } ?></a></td>
								</tr>
								<tr>
								<td>Discription:</td>
								<td>
								<b><?php echo $a_lesson_des; ?></b>
								</td>
								</tr>
								</tbody>
								</table>
								</div>
					<!-- END SAMPLE TABLE PORTLET-->
			</div>
			</div>
				<?php 	
		$i++;		
		}
	}	
?>
</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>