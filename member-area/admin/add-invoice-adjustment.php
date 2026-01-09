<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famAdd=$_GET['famAdd'];
$famNote=$_GET['famNote'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Invoice Adjustemnt for <?php echo $famName; ?></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add Invoice Adjustemnt for <?php echo $famName; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="invoice-adjustment-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Amount</strong></label>
															<div class="col-md-5">
															<input type="text" value="<?php echo $famAdd; ?>" name="amu" id="amu" class="form-control input-circle" required>															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Note</strong></label>
															<div class="col-md-5">
														<textarea required class="form-control input-circle" placeholder="Enter Your Note" name="note" id="note"><?php echo $famNote; ?></textarea>
												</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="py_id" id="py_id" class="form-control">
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