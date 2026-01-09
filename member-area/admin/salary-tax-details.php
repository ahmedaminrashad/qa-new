<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famTax=$_GET['famTax'];
$famAmu=$_GET['famAmu'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Tax On Amount <?php echo $famAmu; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="salary-tax-details-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Enter Tax Amount</strong></label>
															<div class="col-md-7">
															<input type="text" value="<?php echo $famTax; ?>" name="tax" id="tax" class="form-control"></input>															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="sal_id" id="sal_id" class="form-control"></input>
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