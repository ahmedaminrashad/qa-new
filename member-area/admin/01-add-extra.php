<?
require ("../includes/dbconnection.php");
$TeacherID=$_GET['TeacherID'];
$StudentID=$_GET['StudentID'];
$Name=$_GET['Name'];
?>

<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											Add Extra Class
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="save-extra-class" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3"><strong>Student Name</strong></label>
															<div class="col-md-5">
															    <input disabled type="text" class="form-control" value="<?php echo $Name; ?>" name="name" id="name">
                  </div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time Start</strong></label>
															<div class="col-md-5">
																<input required type="time" class="form-control" value="" name="STime" id="STime">
															</div>
														</div>
												<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3"><strong>Time End</strong></label>
															<div class="col-md-5">
																<input required type="time" class="form-control" value="" name="ETime" id="ETime">
															</div>
														</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Date</strong></label>
															<div class="col-md-5">
															<input required type="date" class="form-control" value="" name="date" id="date">
															</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $TeacherID; ?>" name="teacherID" id="teacherID" class="form-control">
												<input type="hidden" value="<?php echo $StudentID; ?>" name="studentID" id="studentID" class="form-control">
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