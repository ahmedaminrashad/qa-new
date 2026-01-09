<?
require ("../includes/dbconnection.php");
$TeacherID=$_GET['TeacherID'];
$TimeID=$_GET['TimeID'];
$DayID=$_GET['DayID'];
$secs = strtotime("00:30:00")-strtotime("00:00:00");
            $end_time = date("H:i:s",strtotime($TimeID)+$secs);

?>

<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											Add New CLass
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add-schedule-one" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3"><strong>Student Name</strong></label>
															<div class="col-md-5">
															    <select required class="form-control" name="studentID"  id="studentID" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM course WHERE Teacher = $TeacherID");			  	
				do {  ?>
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_yrSec'];?></option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
                  </div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time Start</strong></label>
															<div class="col-md-5">
																<input required type="time" class="form-control" value="<?php echo $TimeID; ?>" name="STime" id="STime">
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time End</strong></label>
															<div class="col-md-5">
																<input required type="time" class="form-control" value="<?php echo $end_time; ?>" name="ETime" id="ETime">
															</div>
														</div>
												<div class="form-group">
									<label class="control-label col-md-3">
												<strong>Teacher Day</strong></label>
									<div class="md-checkbox-inline">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox1" value="1" id="checkbox1" class="md-check" <?php if ($DayID == 1) { echo 'checked'; } ?>>
											<label for="checkbox1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Mon </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox2" value="2" id="checkbox2" class="md-check" <?php if ($DayID == 2) { echo 'checked'; } ?>>
											<label for="checkbox2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Tue </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox3" value="3" id="checkbox3" class="md-check" <?php if ($DayID == 3) { echo 'checked'; } ?>>
											<label for="checkbox3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Wed </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox4" value="4" id="checkbox4" class="md-check" <?php if ($DayID == 4) { echo 'checked'; } ?>>
											<label for="checkbox4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Thu </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox5" value="5" id="checkbox5" class="md-check" <?php if ($DayID == 5) { echo 'checked'; } ?>>
											<label for="checkbox5">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Fri </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox6" value="6" id="checkbox6" class="md-check" <?php if ($DayID == 6) { echo 'checked'; } ?>>
											<label for="checkbox6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Sat </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox7" value="7" id="checkbox7" class="md-check" <?php if ($DayID == 7) { echo 'checked'; } ?>>
											<label for="checkbox7">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Sun </label>
										</div>
									</div>
												</div>
												<input type="hidden" value="<?php echo $TeacherID; ?>" name="teacherID" id="teacherID" class="form-control">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
														Cancel</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>