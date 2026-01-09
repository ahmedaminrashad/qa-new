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
  $link = $_SERVER['REQUEST_URI'];
  $teacher =$_REQUEST['teacher'];
  $c =$_REQUEST['date'];
  $check =$_REQUEST['check'];
date_default_timezone_set("Africa/Cairo");
$date = date('d/m/Y', time());
include("monitoring-functions.php");
function ttm($t1, $t2){
$startTime = new DateTime($t1);
$endTime = new DateTime($t2);
$duration = $startTime->diff($endTime); //$duration is a DateInterval object
echo $duration->format("%H:%I");
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
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
				<h1>Admin Home<small> Today's Classes</small></h1>
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
					 Teacher class search
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-body">
						<h2><?php $old_date_timestamp = strtotime($c);
$new_date = date('l jS F-Y', $old_date_timestamp); echo '<span class="label label label-success">'.$new_date.'</span>'; ?></h2>
						<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 A-Time
								</th>
								<th>
									 T-Time
								</th>
								<th>
									 S-Time
								</th>
								<th>
									 Online Time
								</th>
								<th>
									 Student
								</th>
								<th>
									 History
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Status
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php
// sending query
   $result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$c' AND teacher_id = '$teacher' ORDER BY start_time_A");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">Sorry, no record found!</div>';
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
					$bgcolor ='#FE642E';
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
			$sched_id = MYSQL_RESULT($result,$i,"history_id");
			$admin_timeS = MYSQL_RESULT($result,$i,"start_time_A");
			$admin_timeE = MYSQL_RESULT($result,$i,"end_time_A");
			$student_timeS = MYSQL_RESULT($result,$i,"start_time_S");
			$student_timeE = MYSQL_RESULT($result,$i,"end_time_S");
			$teacher_timeS = MYSQL_RESULT($result,$i,"time_start");
			$teacher_timeE = MYSQL_RESULT($result,$i,"time_end");
			$duration = MYSQL_RESULT($result,$i,"duration");
			$teacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$student_id = MYSQL_RESULT($result,$i,"course_id");
			$parent_id = MYSQL_RESULT($result,$i,"parent_id");
			$monitor = MYSQL_RESULT($result,$i,"monitor_id");// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$pstr = MYSQL_RESULT($result,$i,"time_s_id");
			$wa = MYSQL_RESULT($result,$i,"activation");
			$status = MYSQL_RESULT($result,$i,"status");// Regular, Trial, Rescheduled or Suspended
			$re_status = MYSQL_RESULT($result,$i,"re_status");
			$his_date = MYSQL_RESULT($result,$i,"date_admin");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td> 
									 <?php echo date("g:i a", strtotime($admin_timeS)); ?> (<?php echo ttm($teacher_timeS, $teacher_timeE); ?>)
								</td>
								<td>
									 <?php echo date("g:i a", strtotime($teacher_timeS)); ?> - <?php echo date("g:i a", strtotime($teacher_timeE)); ?>
								</td>
								<td>
									 <?php echo date("g:i a", strtotime($student_timeS)); ?>
								</td>
								<td>
									 <?php echo $wa; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo StudentName("$student_id"); ?></a>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>">History</a>
								</td>
								<td>
									 <a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($teacher_id); ?>"><?php echo TeacherName("$teacher_id"); ?></a>
								</td>
								<td>
									 <?php if ($re_status == 2){
				$set_icon= '<i class="fa fa-clock-o"></i>';
				} else {$set_icon= '';}?>
								</td>
								<td>
								<?php if ($status == 11){ echo '<span class="label label-sm label-warning">'.$set_icon.' On Trial ('.$monitor.')</span>'; } 
								elseif ($status == 17){ echo '<span class="label label-sm label-danger">'.$set_icon.' Suspended ('.$monitor.')</span>'; } 
								elseif ($status == 19){ echo '<span class="label label-sm label-info">'.$set_icon.' Advance ('.$monitor.')</span>'; } 
								elseif ($status == 20){ echo '<span class="label label-sm label-warning">'.$set_icon.' Re-Scheduled ('.$monitor.')</span>'; } 
								else { echo '<span class="label label-sm label-success">'.$set_icon.' Regular ('.$monitor.')</span>'; } ?></td>
								<td><?php if ($monitor == 1) { echo '<a class="allocation1" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="'.$sched_id.'"><button type="button" class="btn blue btn-xs" title="Add Schedule">Advance</button></a>';}
								elseif ($monitor != 8) { echo '<a href="valid.php?parent_id='.$sched_id.'"><button type="button" class="btn yellow btn-xs"><i class="fa fa-history"></i></button></a>';} ?></td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>

						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
$('.allocation1').click(function(){
    var famID=$(this).attr('data-id');
    
    $.ajax({url:"schedule-advance-class.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>