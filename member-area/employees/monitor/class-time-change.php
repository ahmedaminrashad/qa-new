<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$teacherID=$_GET['teacherID'];
$studentID=$_GET['studentID'];
$teacherTime=$_GET['teacherTime'];
$studentName=$_GET['studentName'];
$teacherDate=$_GET['teacherDate'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Class of <?php echo $studentName; ?> (Current Time: <?php echo $teacherTime; ?>)
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="class-time-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Select Time</strong></label>
															<div class="col-md-7">
															<select required class="form-control" name="pstime1"  id="pstime1" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart");			  	
				do {  ?>
                      <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="his" id="his" class="form-control">
												<input type="hidden" value="<?php echo $teacherID; ?>" name="pteacher" id="pteacher" class="form-control">
												<input type="hidden" value="<?php echo $studentID; ?>" name="pstudent" id="pstudent" class="form-control">
												<input type="hidden" value="<?php echo $teacherDate; ?>" name="checkbox1" id="checkbox1" class="form-control">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>