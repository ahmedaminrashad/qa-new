<?
require ("../includes/dbconnection.php");
$famAdd=$_GET['famAdd'];
$famNote=$_GET['famNote'];
$famDate=$_GET['famDate'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i> Mark this Invoice as Paid
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="mark-paid" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Order number / Paymant Mode etc</strong></label>
															<div class="col-md-5">
															<input type="text" value="<?php echo $famNote; ?>" name="note" id="note" class="form-control input-circle" required>															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Payment Date</strong></label>
															<div class="col-md-5">
														<input type="date" value="<?php echo $famDate; ?>" name="date" id="date" class="form-control input-circle" required>
												</div>
												</div>
												<input type="hidden" value="<?php echo $famAdd; ?>" name="py_id" id="py_id" class="form-control">
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