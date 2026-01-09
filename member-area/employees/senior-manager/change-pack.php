<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famPack=$_GET['famPack'];
$famCur=$_GET['famCur'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i> Current Package: <?php $result = mysql_query("SELECT * FROM fee_package Where package_id = '$famPack'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$packid = MYSQL_RESULT($result,$i,"package_id");
					$packname = MYSQL_RESULT($result,$i,"package_name");
	
			  		echo $packname;
	$i++;	 
			}
			} ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="update-change-pack" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Select Pack</strong></label>
															<div class="col-md-5">
															<select required class="form-control" name="txtnod"  id="txtnod">
                      <optgroup label="Regular">
                      <option value="2" selected>Plan A (2 Days)</option>
                      <option value="3">Plan B (3 Days)</option>
                      <option value="4">Plan C (4 Days)</option>
                      <option value="5">Plan D (5 Days)</option>
                      <option value="6">Plan E (6 Days)</option>
                      </optgroup>
                      <optgroup label="Exceptional">
                      <option value="1">Plan One Day </option>
                      <option value="7">Plan 7 Days</option>
                      </optgroup>
                      <optgroup label="Regular One Hour">
                      <option value="4">Plan A (2 Days)</option>
                      <option value="6">Plan B (3 Days)</option>
                      <option value="8">Plan C (4 Days)</option>
                      <option value="10">Plan D (5 Days)</option>
                      <option value="12">Plan E (6 Days)</option>
                      </optgroup>
                      <optgroup label="Exceptiona One Hour">
                      <option value="2">Plan One Day </option>
                      <option value="14">Plan 7 Days</option>
                      </optgroup>
               </select>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="courseID" id="courseID" class="form-control">
												<input type="hidden" value="<?php echo $famCur; ?>" name="cur" id="cur" class="form-control">
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