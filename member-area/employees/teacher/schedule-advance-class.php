<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$result = mysql_query("SELECT `class_history`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `class_history`,`course`,`profile` WHERE class_history.course_id=course.course_id and class_history.teacher_id=profile.teacher_id
 HAVING history_id = '$famID'
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
			$teacher_date = MYSQL_RESULT($result,$i,"date_teacher");
			$student_name = MYSQL_RESULT($result,$i,"course_yrSec");
			$teacher_name = MYSQL_RESULT($result,$i,"teacher_name");
			$a_date = MYSQL_RESULT($result,$i,"date_admin");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$s_date = MYSQL_RESULT($result,$i,"date_student");

	$i++;	 
			}
			}
?>

<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											Edit Class of <?php echo $student_name; ?> - <?php echo $teacher_name; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="save-advance-schedule-class" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3"><strong>Student Name</strong></label>
															<div class="col-md-5">
																<input type="text" class="form-control" value="<?php echo $student_name; ?>" name="wn2" id="wn2" disabled>
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Teacher Name</strong></label>
															<div class="col-md-5">
																<input type="text" class="form-control" value="<?php echo $teacher_name; ?>" name="wn2" id="wn2" disabled>
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time Start</strong></label>
															<div class="col-md-5">
																<input type="time" class="form-control" value="<?php echo $teacher_timeS; ?>" name="STime" id="STime">
															</div>
														</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Day</strong></label>
															<div class="col-md-5">
															<input type="date" class="form-control" value="<?php echo $teacher_date; ?>" name="date" id="date">
															</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $student_id; ?>" name="studentID" id="studentID" class="form-control">
												<input type="hidden" value="<?php echo $teacher_id; ?>" name="teacherID" id="teacherID" class="form-control">
												<input type="hidden" value="<?php echo $famID; ?>" name="famID" id="famID" class="form-control">
												<input type="hidden" value="<?php echo $duration; ?>" name="duration" id="duration" class="form-control">
												<input type="hidden" value="<?php echo $a_date; ?>" name="ADtate" id="ADtate" class="form-control">
												<input type="hidden" value="<?php echo $t_date; ?>" name="TDtate" id="TDtate" class="form-control">
												<input type="hidden" value="<?php echo $s_date; ?>" name="SDtate" id="SDtate" class="form-control">
												<input type="hidden" value="<?php echo $monitor; ?>" name="MONI" id="MONI" class="form-control">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Edit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
														Cancel</button>
													</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>