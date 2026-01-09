<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
$famValue=$_GET['famValue'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											Name: <?php echo $famName; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="update-complaint" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Complaint</strong></label>
															<div class="col-md-7">
															<textarea required class="form-control" readonly><?php echo $famValue; ?></textarea>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Responce</strong></label>
															<div class="col-md-7">
															<textarea required class="form-control" placeholder="Enter Remarks for Parent" name="feed" id="feed"></textarea>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="class_id" id="class_id" class="form-control"></input>
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