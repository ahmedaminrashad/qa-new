<?
require ("../includes/dbconnection.php");
$leave=$_GET['leave'];
$status=$_GET['status'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Mark Leave as <?php if ($status == 2) {echo 'Recommended';} elseif ($status == 6) {echo 'Rejected';} ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="mark-leave-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Add Remarks for <?php if ($status == 2) {echo 'Recommendation';} elseif ($status == 6) {echo 'Rejection';} ?></strong></label>
															<div class="col-md-7">
															<textarea required name="remarks" id="remarks" class="form-control" placeholder="Add Remarks"></textarea>															</div>
												</div>
												<input type="hidden" value="<?php echo $leave; ?>" name="leave_id" id="leave_id" class="form-control"></input>
												<input type="hidden" value="<?php echo $status; ?>" name="status_id" id="status_id" class="form-control"></input>
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