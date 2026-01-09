<?
require ("../includes/dbconnection.php");
$famAdd=$_GET['famAdd'];
$famNote=$_GET['famNote'];
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
<div class="portlet-body">
<div class="timeline">
						<div class="timeline-item">
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
								<div class="timeline-body-content">
									<span class="font-grey-cascade">
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Amount: <b><?php echo $famAdd; ?></b></td>
								</tr>
								<tr>
								<td>Note: <b><?php echo $famNote; ?></b></td>
							</tr>
</tbody>
								</table>
								</div>
								</span>
								</div>
							</div>
						</div>
										</div></div>
