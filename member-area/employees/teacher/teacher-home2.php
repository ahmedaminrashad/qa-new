<?php if (empty($session)) {
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
	session_start();
}
?>
<?php
include("../includes/session.php");
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");
include("header.php");
$link = $_SERVER['REQUEST_URI'];
$isSendWM = $_SERVER['Send'];
$timeValue = $_SESSION['is']['teacher_time'];
date_default_timezone_set($_SESSION['is']['teacher_time']);
$today = date("Y-m-d", time(true));
$datep = date('Y-m-d');
$date_p = date('Y-m-d', strtotime('-1 day', strtotime($datep)));

$tt = $_SESSION['is']['teacher_id'];
$result = mysql_query("SELECT * FROM profile Where teacher_id = '$tt' AND csr_rights = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$row = mysql_fetch_array($result);
$teacherName =$row['teacher_name'];
$zoomLink =$row['link'];
}
	
function class_monitor($var)
{
	$d1 = $datep = date('Y-m-01');
	$d2 = $datep = date('Y-m-d');
	$tt = $_SESSION['is']['teacher_id'];
	$result1 = mysql_query("SELECT * FROM sched WHERE teacher_id = '$tt' AND course_id = '$var'");
	if (!$result1) {
		die("Query to ");
	}
	$numberOfRows1 = MYSQL_NUMROWS($result1);
	if ($numberOfRows1 == 0) {
		$class = 0;
	} else if ($numberOfRows1 > 0) {
		$cl = $numberOfRows1;
		if ($cl <= 8) {
			$class = 1;
		} else {
			$class = 2;
		}
	}
	$result = mysql_query("SELECT history_id FROM class_history WHERE teacher_id = '$tt' AND monitor_id = '1' AND course_id = '$var' AND date_teacher >= '$d1' AND date_teacher <= '$d2'");
	if (!$result) {
		die("Query to show");
	}
	$numberOfRows = MYSQL_NUMROWS($result);
	if ($numberOfRows < $class) {
		echo '<span class="label label-sm label-success" title="Missed Classes/Allowed to Miss">' . $numberOfRows . '/' . $class . '</span>';
	} else if ($numberOfRows > 0) {
		echo '<span class="label label-sm label-danger" title="Missed Classes/Allowed to Miss">' . $numberOfRows . '/' . $class . '</span>';
	}
}
function course($con)
{
	if ($con == 3) {
		echo 'hifz';
	} elseif ($con != 3) {
		echo 'all';
	}
}
include("monitoring-functions.php");
function ttm($t1, $t2)
{
	$startTime = new DateTime($t1);
	$endTime = new DateTime($t2);
	$duration = $startTime->diff($endTime); //$duration is a DateInterval object
	echo $duration->format("%H:%I");
}
?>
<?php echo $main_header; ?>

<head>
	<script>
		setTimeout(function() {
			window.location.reload(1);
		}, 600000);
	</script>
</head>
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
						<form action="date_definer" method="post" class="form-horizontal form-row-seperated">
							<div class="form-group col-md-7">
								<label class="control-label col-md-3">
									<strong>List of Classes on: </strong></label>
								<div class="col-md-4">
									<input type="date" name="date" id="date" value="<?php echo $today; ?>" class="form-control" onchange="this.form.submit()"></div>
							</div>
							<input type="hidden" name="pteacher" id="pteacher" value="<?php echo $tt; ?>" class="form-control" required>
						</form>
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table">
								<!--	<thead style="background: #195586; color: #ffffff;">
										<tr>
											<th>
												#
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
										</tr>-->
									</thead>
									<tbody>
										<?php
										$tt = $_SESSION['is']['teacher_id'];
										// sending query
								
										for($index=0; $index<=5; $index++){
                                       
										$day =  date('Y-m-d', strtotime($today. " + $index days"));
										
										$nameOfDay = date('D', strtotime($day));
                                    $result = mysql_query("SELECT `class_history`.*,`account`.* FROM `class_history`,`account` WHERE class_history.date_teacher = '$day' and class_history.teacher_id = '$tt' and account.parent_id = class_history.parent_id ORDER BY time_start");
                                    	
										$counter = 0;
										$i=0;
										if (!$result) {
											die("Query to show fields from table failed home");
										}
										$numberOfRows = MYSQL_NUMROWS($result);
										if ($numberOfRows == 0) {
									   // echo $nameOfDay.'<br> >>>>>>>>>>>>>>>>>>>>>>>>';//	echo '';
										} else if ($numberOfRows > 0) {
										   $d=  date('d', strtotime($day));
										   $m =  date('m', strtotime($day));
								echo "<thead style='background: #195586; color: #ffffff;'>
										<tr>
											<th style='color: #fdd200;'>
											$nameOfDay  $d/$m
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
									</thead>";
											while ($row = mysql_fetch_array($result)) {
												if ($row['monitor_id'] == '2') //waiting
												{
													$bgcolor = '#F5A9A9';
												} else if ($row['monitor_id'] == '3') //running
												{
													$bgcolor = '#F2F5A9';
												} else if ($row['monitor_id'] == '4') //absent
												{
													$bgcolor = '#F9BCBC';
												} else if ($row['monitor_id'] == '5') //leave
												{
													$bgcolor = '#C3C3FA';
												} else if ($row['monitor_id'] == '6') //declined
												{
													$bgcolor = '#CEECF5';
												} else if ($row['monitor_id'] == '7') //still pending
												{
													$bgcolor = '#F5D0A9';
												} else if ($row['monitor_id'] == '8') //taken advance
												{
													$bgcolor = '#D8D8D8';
												} else if ($row['monitor_id'] == '9') //taken
												{
													$bgcolor = '#BCF5A9';
												} else {
													$bgcolor = '#fffff'; // pending
												}
												$history_id = MYSQL_RESULT($result, $i, "history_id");
												$student_id = MYSQL_RESULT($result, $i, "course_id");
												$teacher_id = MYSQL_RESULT($result, $i, "teacher_id");
												$admin_timeS = MYSQL_RESULT($result, $i, "start_time_A");
												$admin_timeE = MYSQL_RESULT($result, $i, "end_time_A");
												$student_timeS = MYSQL_RESULT($result, $i, "start_time_S");
												$student_timeE = MYSQL_RESULT($result, $i, "end_time_S");
												$teacher_timeS = MYSQL_RESULT($result, $i, "time_start");
												$teacher_timeE = MYSQL_RESULT($result, $i, "time_end");
												$duration = MYSQL_RESULT($result, $i, "duration");
												$dept_id = MYSQL_RESULT($result, $i, "dept_id");
												$adept_id = MYSQL_RESULT($result, $i, "adept_id");
												$class_type = MYSQL_RESULT($result, $i, "type"); // Rescheduled, Makeup, Extra or Regular
												$status = MYSQL_RESULT($result, $i, "status"); // Regular, Trial, Rescheduled or Suspended
												$mnp = MYSQL_RESULT($result, $i, "monitor_id"); // pending, taken, absent, leave, taken advance, running, waiting or still pending
												$parent_id = MYSQL_RESULT($result, $i, "parent_id");
												$mobile = MYSQL_RESULT($result, $i, "mobile");
												$isSendNotification = MYSQL_RESULT($result, $i, "notification");
												$date_teacher = MYSQL_RESULT($result, $i, "date_teacher");
												$active_msg = MYSQL_RESULT($result, $i, "active_msg");
												?>
												<tr bgcolor="<?php echo $bgcolor; ?>">
													<td>
														<?php echo $history_id;//++$counter; ?>
													</td>
													<td>
														<b><?php echo date("g:i a", strtotime($teacher_timeS));//." ".$date_teacher; ?> - <?php echo date("g:i a", strtotime($teacher_timeE)); ?></b>
													</td>
													<td>
														<b><?php echo date("g:i a", strtotime($student_timeS)); ?> (<?php echo ttm($teacher_timeS, $teacher_timeE); ?>)</b>
													</td>
													<td>
														<b><?php echo StudentName("$student_id"); ?> <?php //if ($class_type == 1){ echo ''; } elseif ($class_type == 2){ echo '<span class="label label-sm label-success">Extra</span>'; } elseif ($class_type == 3){ echo '<span class="label label-sm label-warning">Re-Scheduled</span>'; } 
																												?></b>
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
								<td>
								<?php if ($mnp == 2 OR $mnp == 3) {echo "<a target='_blank' href='classroom'><button type='button' style='text-transform: none;'  class='btn blue btn-xs' title='Want to join meeting again with the this student?'>Class Room</button></a>";} ?>
								
								<?php if ($mnp == 3 && $active_msg != 1) {echo "<a href='notification_new?Mid=1?&history_id=$history_id&Sid=".$student_id."&Tid=".$teacher_id."&Pid=".$parent_id."&y=".time()."'><button type='button' style='text-transform: none;   background: #359dd2; ' class='btn  btn-xs' title='Send a notice to the student, telling him to enter the room.'>Notification</button></a>";} ?>
								<?php if ($mnp == 3 && $active_msg == 1 && $isSendNotification != 1) {echo "<a href='notification_new?Mid=2?&history_id=$history_id&Sid=".$student_id."&Tid=".$teacher_id."&Pid=".$parent_id."&y=".time()."'><button type='button' style ='text-transform: none;  background: #006780; '  class='btn  btn-xs' title='If Student not there in the class click to send notification to student.'>Reminder</button></a>";} ?>
								<?php
								if ($mnp == 1 && $status != 17 &&$today ==$day ){
								    echo "<a href='file-activate?history_id=$history_id'><button type='button' style='width: 75px;text-transform: none;' class='btn red btn-xs' title='Click to start meeting with student, if you do not click on this button and start meeting student will not be able to join you also.'>Start</button></a> 
								         <a href='time-check-leave?history_id=".$history_id."&time_id=".$teacher_time."&timezone=".$timeValue."'><button type='button' style='width: 75px;text-transform: none;' class='btn blue btn-xs'>Leave</button></a>";
							      // echo "<a target='_blank' href='notification?Mid=1?&history_id=$history_id&Sid=".$student_id."&Tid=".$teacher_id."&Pid=".$parent_id."&y=".time()."'><button type='button' style='width: 75px' class='btn red btn-xs' title='Click to start meeting with student, if you do not click on this button and start meeting student will not be able to join you also.'>Activate</button></a> 
								    //     <a href='time-check-leave?history_id=".$history_id."&time_id=".$teacher_time."&timezone=".$timeValue."'><button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button></a>";
								} 
								elseif ($mnp == 9) { echo '<button type="button" style="width: 75px" class="btn green btn-xs disabled">Taken</button>'; } 
								elseif ($mnp == 4) { echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Absent</button>'; } 
								elseif ($mnp == 5) { echo '<button type="button" style="width: 75px" class="btn blue btn-xs disabled">On Leave</button>'; }
								elseif ($mnp == 6){echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Declined</button>';}
								elseif ($mnp == 7){echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Pending</button>';}
								elseif ($mnp == 8){echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Advance</button>';}
								elseif ($mnp == 3 ) {echo "<a href='attendence-all-new?history_id=".$history_id."&dept_id=".$dept_id."&adept_id=".$adept_id."&Sid=".$student_id."&Tid=".$teacher_id."&Pid=".$parent_id."'><button type='button' style='width: 75px;text-transform: none;' class='btn btn-danger btn-xs'>End</button></a>";} 
							//	elseif ($mnp == 3 && $dept_id == 3) {echo "<a href='attendence-hifz?history_id=".$history_id."&dept_id=".$dept_id."&adept_id=".$adept_id."'><button type='button' style='width: 75px;' class='btn btn-danger btn-xs' title='If you have taken the class and given the lesson to student, please click on END button to put class history.'>End</button></a>";} ?>
								<?php //if (($mnp == 4 OR $mnp == 5 OR $mnp == 6) && $restatus != 2) {echo '<a href="re-schedule-class-teacher?adateid='.$a_date.'&tdateid='.$t_date.'&sdateid='.$s_date.'&Course_ID='.$student_id.'&tech='.$teacher_id.'&studentName='.$student.'&link='.base64_encode($link).'&history_id='.$history_id.'&dept_id='.$dept_id.'&adept_id='.$adept_id.'&mp_id='.$mnp.'"><button type="button" style="width: 90px; font-size: 1.2vh;" class="btn blue btn-xs">Re-schedule</button></a>'; } 
								      //elseif ($mnp == 5 && $restatus == 2) {echo '<button type="button" style="width: 90px" class="btn red btn-xs disabled">Re-scheduled</button>'; } ?>
							
								<?php if ($mnp == 3) {echo "<a href='notification_new?Mid=4?&history_id=$history_id&Sid=".$student_id."&Tid=".$teacher_id."&Pid=".$parent_id."&y=".time()."'><button type='button' style='width: 75px;text-transform: none;' class='btn red btn-xs' title='If you waited for the whole class time and student did not join the meetig room, mark him Absent.'>Absent</button></a>";} else {echo "";} ?>
							
								<?php// if ($mnp == 2) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=4'><button type='button' style='width: 75px' class='btn red btn-xs' title='If you waited for the whole class time and student did not join the meetig room, mark him Absent.'>Absent</button></a>";} else {echo "";} ?>
								
								<?php if ($mnp == 3) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=6'><button type='button' style ='text-transform: none; background: #e6b907;' class='btn  btn-xs' title='This student refused to take classes today at class time.'>Declined</button></a>";} ?> 
								</td><?php ?></td>

												</tr>
										<?php
												$i++;
												
											}
										}
									
}
										
									
										?>
										<tr>
											<td colspan="9">

											</td>
										</tr>
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				<rr/div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">


					</div>
				</div>
			</div>
			<div class="modal fade" id="note" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">About Class Activation</h4>
						</div>
						<div class="modal-body">
							From Now, you are not allowed to activate class other then class time. For example, if class time is 02:00 PM, you can <button type='button' style='width: 75px' class='btn red btn-xs'>Activate</button> class
							during your class time, means you can ACTIVATE class between 02:00 and 02:30 only else you have to contact admin to activate the class. You may face thi
							issue if the class is not scheduled correctly. Please make sure that the scheduled time should be correct. Please contact Admin QuranSheikh in this regard.
						</div>
						<div class="modal-footer">
							<a onclick="goBack()"><button type="button" class="btn default">Close</button></a>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div class="modal fade" id="leave1" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">About Class Leave</h4>
						</div>
						<div class="modal-body">
							Its too late to mark this class on leave. You are not allowed to mark any class on leave after class time.
						</div>
						<div class="modal-footer">
							<a onclick="goBack()"><button type="button" class="btn default">Close</button></a>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php
$errorID = $_REQUEST['error_id'];
if ($errorID == 1) {
	echo "<script type='text/javascript'>
    $(window).on('load',function(){
        $('#note').modal('show');
    });
</script>";
}
if ($errorID == 2) {
	echo "<script type='text/javascript'>
    $(window).on('load',function(){
        $('#leave1').modal('show');
    });
</script>";
} else {
	echo '';
}
?>
<script>
	function goBack() {
		window.history.back();
	}
</script>
<?php echo $fot; ?>
<script>
	$('.allocation1').click(function() {
		var famID = $(this).attr('data-id');

		$.ajax({
			url: "re-schedule-class-teacher.php?famID=" + famID,
			cache: false,
			success: function(result) {
				$(".modal-content").html(result);
			}
		});
	});
</script>
