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
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
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
				<h1>History<small> Details</small></h1>
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
				<li class="active">
					 History Detail of <?php echo $student; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<?php
					$ccc =$_REQUEST['cour'];
					$ddd =$_REQUEST['adate'];
$result = mysql_query("SELECT `History1`.*,`course`.`course_yrSec`,`attend`.`mark`,`day`.`day_name`,`month`.`month_name`,`school_yr`.`school_year`,`remaks`.`remak`,`profile`.`teacher_name` FROM `History1`,`course`,`attend`,`day`,`month`,`school_yr`,`remaks`,`profile` WHERE History1.course_id=course.course_id and History1.a_id=attend.a_id and History1.admin_day=day.day_id and History1.admin_month=month.month_id and History1.admin_year=school_yr.year_id and History1.teacher_remarks=remaks.remk_id and History1.teacher_id=profile.teacher_id HAVING course_id = '$ccc' AND admin_date = '$ddd'") or die(mysql_error());;
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
		if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}
			$hid = MYSQL_RESULT($result,$i,"history1_id");
			$student = MYSQL_RESULT($result,$i,"course_yrSec");
			$attendnce = MYSQL_RESULT($result,$i,"mark");
			$day = MYSQL_RESULT($result,$i,"day_name");
			$year = MYSQL_RESULT($result,$i,"school_year");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$remarkst = MYSQL_RESULT($result,$i,"remak");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$a_date = MYSQL_RESULT($result,$i,"admin_date");
			$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
			$year_name = MYSQL_RESULT($result,$i,"school_year");
			$mon_name = MYSQL_RESULT($result,$i,"month_name");
			$stur_course_id = MYSQL_RESULT($result,$i,"course_id");
			$s_date = MYSQL_RESULT($result,$i,"admin_date");
			$st = MYSQL_RESULT($result,$i,"start_time");
			$et = MYSQL_RESULT($result,$i,"end_time");
			$sabuq = MYSQL_RESULT($result,$i,"sabaq");
			$sabuqi = MYSQL_RESULT($result,$i,"sabaqi");
			$manz = MYSQL_RESULT($result,$i,"manzil");
			$r_course_id = MYSQL_RESULT($result,$i,"dept_id");
			$r_lesson_id = MYSQL_RESULT($result,$i,"lesson_id");
			$r_lesson_des = MYSQL_RESULT($result,$i,"lesson_discription");
			$a_course_id = MYSQL_RESULT($result,$i,"additional_dept");
			$a_lesson_id = MYSQL_RESULT($result,$i,"additional_lesson");
			$a_lesson_des = MYSQL_RESULT($result,$i,"additional_des");
			$fff = MYSQL_RESULT($result,$i,"a_id");
			$redate = MYSQL_RESULT($result,$i,"reschedule");
?>
									<div class="row">
					<div class="col-md-6">
					<div class="portlet light">
									<h4>
									<font color="#44B6AE"> <b>Class Details: <a href="history-delete?history_id=<?php echo $hid; ?>"><button type="button" class="btn red btn-xs">Delete</button></a> 
			<a href="add-schedule-local-profile-re?Course_ID=<?php echo $stur_course_id; ?>&tech=<?php echo $tech_id; ?>&studentName=<?php echo $student; ?>&link=<?php echo base64_encode($link); ?>&history_id=<?php echo $hid; ?>"><button type="button" class="btn blue btn-xs" title="Add Schedule">Re-Schedule</button></a></b></font>
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
								<td> <b><?php echo $a_date; ?></b></td>
								</tr>
								<tr>
								<td>Start:</td>
								<td> <b><?php $date1=date_create("$st"); echo date_format($date1,"h:i:s a"); ?></b></td>
								</tr>
								<tr>
								<td>End:</td>
								<td> <b><?php $date1=date_create("$et"); echo date_format($date1,"h:i:s a"); ?></b></td>
								</tr>
								<tr>
								<td>Duration:</td>
								<td> <b><?php $start_date = new DateTime("$st");
    $end_date = new DateTime("$et");
    $interval = $start_date->diff($end_date);
    echo "" . $interval->h. " hours, " . $interval->i." mins, ".$interval->s." sec "; ?></b></td>
								</tr>
								<tr>
								<td>Status:</td>
								<td> <b><?php if ($fff == 9){
				echo '<span class="label label-sm label-danger">Still Pending</span>';
				}
			elseif ($fff == 10){
				echo '<span class="label label-sm label-warning">Re-Scheduled on '.$redate.'</span>';
				}
			elseif ($fff >= 1 && $fff <= 8){
			echo '<span class="label label-sm label-success">'.$attendnce.'</span>';
			} ?></b></td>
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
								<?php if ($r_course_id == 1 OR $r_course_id == 2 OR $r_course_id == 4 OR $r_course_id == 5 OR $r_course_id == 6 OR $r_course_id == 7){ echo '<b>'.$r_lesson_des.'</b>'; } elseif ($r_course_id == 3){ echo 'Sabaq:  <b>'.$sabuq.'</b><br> Sabaqi:  <b>'.$sabuqi.'</b><br>Manzil:   <b>'.$manz.'</b>'; }?>
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