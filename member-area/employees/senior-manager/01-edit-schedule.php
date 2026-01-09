<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING sched_id = '$famID'
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
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");

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
											Edit Schedule of <?php echo $hidden_pcourse; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="update-schedule-one" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3"><strong>Student Name</strong></label>
															<div class="col-md-5">
																<input type="text" class="form-control" value="<?php echo $hidden_pcourse; ?>" name="wn2" id="wn2" disabled>
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Teacher Name</strong></label>
															<div class="col-md-5">
																<input type="text" class="form-control" value="<?php echo $hidden_pt; ?>" name="wn2" id="wn2" disabled>
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time Start</strong></label>
															<div class="col-md-5">
																<input type="time" class="form-control" value="<?php echo $tt1; ?>" name="STime" id="STime">
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time End</strong></label>
															<div class="col-md-5">
																<input type="time" class="form-control" value="<?php echo $tt2; ?>" name="ETime" id="ETime">
															</div>
														</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Day</strong></label>
															<div class="col-md-5">
															<select required class="form-control" name="day"  id="day">
                      <option value="1" <?php if($hidden_pday == 1) { echo 'selected';} ?>>Monday </option>
                      <option value="2" <?php if($hidden_pday == 2) { echo 'selected';} ?>>Tuesday </option>
                      <option value="3" <?php if($hidden_pday == 3) { echo 'selected';} ?>>Wednesday </option>
                      <option value="4" <?php if($hidden_pday == 4) { echo 'selected';} ?>>Thursday </option>
                      <option value="5" <?php if($hidden_pday == 5) { echo 'selected';} ?>>Friday </option>
                      <option value="6" <?php if($hidden_pday == 6) { echo 'selected';} ?>>Saturday </option>
                      <option value="7" <?php if($hidden_pday == 7) { echo 'selected';} ?>>Sunday </option>
               </select>
															</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $stud_id; ?>" name="studentID" id="studentID" class="form-control">
												<input type="hidden" value="<?php echo $tech_id; ?>" name="teacherID" id="teacherID" class="form-control">
												<input type="hidden" value="<?php echo $famID; ?>" name="famID" id="famID" class="form-control">
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
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<a href="sched_c_del?sched_id=<?php echo $famID; ?>&t=<?php echo time(); ?>"><span class="btn red">
														Delet This Class</span></a>
														<a href="student-del-all-s.php?Course_ID=<?php echo $stud_id; ?>&t=<?php echo time(); ?>"><span class="btn red">
														Delete All Classes of <?php echo $hidden_pcourse; ?></span></a>
													</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>