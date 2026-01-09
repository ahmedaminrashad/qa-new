<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$sql = "SELECT `class_history`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `class_history`,`course`,`profile` WHERE class_history.course_id=course.course_id and class_history.teacher_id=profile.teacher_id HAVING history_id = '$famID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
			$sched_id = $row['history_id'];
			$admin_timeS = $row['start_time_A'];
			$admin_timeE = $row['end_time_A'];
			$student_timeS = $row['start_time_S'];
			$student_timeE = $row['end_time_S'];
			$teacher_timeS = $row['time_start'];
			$teacher_timeE = $row['time_end'];
			$duration = $row['duration'];
			$teacher_id = $row['teacher_id'];
			$student_id = $row['course_id'];
			$parent_id = $row['parent_id'];
			$monitor = $row['monitor_id'];// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = $row['dept_id'];
			$pstr = $row['time_s_id'];
			$wa = $row['activation'];
			$status = $row['status'];// Regular, Trial, Rescheduled or Suspended
			$re_status = $row['re_status'];
			$his_date = $row['date_admin'];
			$teacher_date = $row['date_teacher'];
			$student_name = $row['course_yrSec'];
			$teacher_name = $row['teacher_name'];
			}
			}
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Class of <?php echo $student_name; ?> - <?php echo $teacher_name; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="class-time-update">
				<input type="hidden" value="<?php echo $student_id; ?>" name="studentID" id="studentID" class="form-control">
												<input type="hidden" value="<?php echo $teacher_id; ?>" name="teacherID" id="teacherID" class="form-control">
												<input type="hidden" value="<?php echo $famID; ?>" name="famID" id="famID" class="form-control">
												<input type="hidden" value="<?php echo $duration; ?>" name="duration" id="duration" class="form-control">
                                <div class="form-group">
															<label>Student Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $student_name; ?>" name="wn2" id="wn2" disabled>
															</div>
														</div>
												<div class="form-group">
															<label>Teacher Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $teacher_name; ?>" name="wn2" id="wn2" disabled>
															</div>
														</div>
												<div class="form-group">
															<label>Time Start</label>
															<div>
																<input type="time" class="form-control" value="<?php echo $teacher_timeS; ?>" name="STime" id="STime">
															</div>
														</div>
												<div class="form-group">
															<label>Day</label>
															<div>
															<input type="date" class="form-control" value="<?php echo $teacher_date; ?>" name="date" id="date">
															</div>
												</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>