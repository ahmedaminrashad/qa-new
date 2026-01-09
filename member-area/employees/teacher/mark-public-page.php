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
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  date_default_timezone_set($_SESSION['is']['teacher_time']);
  $today = base64_decode($_REQUEST['date']);
  $tt = $_SESSION['is']['teacher_id'];
  $datep = date('Y-m-d');
  $date_p = date('Y-m-d', strtotime('-1 day', strtotime($datep)));
  function sum($con){
			$result =  mysql_query("SELECT * FROM `course` WHERE course_id  = $con");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$skype = MYSQL_RESULT($result,$i,"Skype_ID");
			echo $skype;
				}
}
function course($con){
			if ($con == 3){echo 'hifz';}
			elseif ($con != 3){echo 'all';}
}
include("monitoring-functions.php");
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Teacher<small> Student's List</small></h1>
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Current Day Class List
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-12">
				<div class="portlet light">
				<h2><span class="label label label-success"><?php echo date('jS M-Y (D)',strtotime($today)); ?></span>
				<a href="date_definer-public?date=<?php echo date('Y-m-d', strtotime('+1 day', strtotime($today))); ?>&pteacher=<?php echo $tt; ?>"><span class="label label label-info"><?php echo date('jS M-Y (D)', strtotime('+1 day', strtotime($today))); ?></span></a>
				</h2>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
							<form action="mark-class-publich-holiday" method="POST">
								<table class="table">
								<thead>
								<tr>
								<th>
									#
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Student
								</th>
								<th>
									 Name
								</th>
								<th>
									 Course
								</th>
								<th>
									 History
								</th>
								<th>
									 Status
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php
                $tt = $_SESSION['is']['teacher_id'];
// sending query
   $result = mysql_query("SELECT * FROM `class_history` WHERE date_teacher = '$today' and teacher_id = '$tt' ORDER BY time_s_id;");
   $counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">Hurry! There is no class today...</div>';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
		{		
			if($row['monitor_id']=='2') //waiting
				{
					$bgcolor ='#F5A9A9';
				}
			else if($row['monitor_id']=='3') //running
				{
					$bgcolor ='#F2F5A9';
				}		
			else if($row['monitor_id']=='4') //absent
				{
					$bgcolor ='#F9BCBC';
				}
			else if($row['monitor_id']=='5') //leave
				{
					$bgcolor ='#C3C3FA';
				}
			else if($row['monitor_id']=='6') //declined
				{
					$bgcolor ='#CEECF5';
				}
			else if($row['monitor_id']=='7') //still pending
				{
					$bgcolor ='#F5D0A9';
				}
			else if($row['monitor_id']=='8') //taken advance
				{
					$bgcolor ='#D8D8D8';
				}
			else if($row['monitor_id']=='9') //taken
				{
					$bgcolor ='#BCF5A9';
				}
			else
				{
					$bgcolor ='#fffff'; // pending
				}
			$history_id = MYSQL_RESULT($result,$i,"history_id");
			$student_id = MYSQL_RESULT($result,$i,"course_id");
			$teacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$student_time = MYSQL_RESULT($result,$i,"stime_s_id");
			$teacher_time = MYSQL_RESULT($result,$i,"time_s_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$adept_id = MYSQL_RESULT($result,$i,"adept_id");
			$class_type = MYSQL_RESULT($result,$i,"type");// Rescheduled, Makeup, Extra or Regular
			$status = MYSQL_RESULT($result,$i,"status");// Regular, Trial, Rescheduled or Suspended
			$mnp = MYSQL_RESULT($result,$i,"monitor_id");// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$parent_id= MYSQL_RESULT($result,$i,"parent_id");
			$a_date = MYSQL_RESULT($result,$i,"date_admin");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$s_date = MYSQL_RESULT($result,$i,"date_student");
			$restatus = MYSQL_RESULT($result,$i,"re_status");
?>							
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									<?php if ($mnp == 21){echo '<i class="fa fa-check font-green"></i>';} else { echo '<input name="checkbox[]" type="checkbox" value="'.$history_id.'" checked>'; } ?>
								</td>
								<td><a href="skype:<?php sum($student_id); ?>?call"><i class="fa fa-phone"></i></a></td>
								<td>
									 <b><?php echo time1("$teacher_time"); ?></b>
								</td>
								<td>
									 <b><?php echo time1("$student_time"); ?></b>
								</td>
								<td>
									 <b><?php echo StudentName("$student_id"); ?> <?php //if ($class_type == 1){ echo ''; } elseif ($class_type == 2){ echo '<span class="label label-sm label-success">Extra</span>'; } elseif ($class_type == 3){ echo '<span class="label label-sm label-warning">Re-Scheduled</span>'; } ?></b>
								</td>
								<td>
									 <b><?php echo DeptName("$dept_id"); ?></b>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>"><b>History</b></a>
								</td>
								<td>
								<?php if ($status == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } 
								elseif ($status == 17){ echo '<span class="label label-sm label-danger">Suspended</span>'; } 
								elseif ($status == 18){ echo '<span class="label label-sm label-danger">Shifted</span>'; }
								elseif ($status == 19){ echo '<span class="label label-sm label-danger">Advance</span>'; } 
								elseif ($status == 20){ echo '<span class="label label-sm label-danger">Re-Scheduled</span>'; } 
								elseif ($status == 21){ echo '<span class="label label-sm label-warning">Extra</span>'; }
								else { echo '<span class="label label-sm label-success">Regular</span>'; } ?>
								</td>
								<td><?php if ($mnp == 1){echo "<button type='button' style='width: 75px' class='btn red btn-xs disabled'>Activate</button>";} 
								elseif ($mnp == 21){echo '<a href="valid.php?parent_id='.$history_id.'"><button type="button" class="btn yellow btn-xs">Reset</button></a>';} 
								?>								
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
</tbody>
								</table>
								<button type="submit" class="btn green">Mark Selected as Public Holiday</button>
								</form>
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