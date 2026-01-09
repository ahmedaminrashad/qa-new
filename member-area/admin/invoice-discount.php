<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famDis=$_GET['famDis'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i> Current Discount: <?php echo $famDis; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="invoice-discount-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Discount</strong></label>
															<div class="col-md-5">
															<select required class="form-control" name="dis"  id="dis">
                      <option value="0" selected>0%</option>
                      <option value="1">1%</option>
                      <option value="2">2%</option>
                      <option value="3">3%</option>
                      <option value="4">4%</option>
                      <option value="5">5%</option>
                      <option value="6">6%</option>
                      <option value="7">7%</option>
                      <option value="8">8%</option>
                      <option value="9">9%</option>
                      <option value="10">10%</option>
                      <option value="11">11%</option>
                      <option value="12">12%</option>
                      <option value="13">13%</option>
                      <option value="14">14%</option>
                      <option value="15">15%</option>
                      <option value="16">16%</option>
                      <option value="17">17%</option>
                      <option value="18">18%</option>
                      <option value="19">19%</option>
                      <option value="20">20%</option>
                      <option value="21">21%</option>
                      <option value="22">22%</option>
                      <option value="23">23%</option>
                      <option value="24">24%</option>
                      <option value="25">25%</option>
                      <option value="26">26%</option>
                      <option value="27">27%</option>
                      <option value="28">28%</option>
                      <option value="29">29%</option>
                      <option value="30">30%</option>
                      <option value="31">31%</option>
                      <option value="32">32%</option>
                      <option value="33">33%</option>
                      <option value="34">34%</option>
                      <option value="35">35%</option>
                      <option value="36">36%</option>
                      <option value="37">37%</option>
                      <option value="38">38%</option>
                      <option value="39">39%</option>
                      <option value="40">40%</option>
                      <option value="41">41%</option>
                      <option value="42">42%</option>
                      <option value="43">43%</option>
                      <option value="44">44%</option>
                      <option value="45">45%</option>
                      <option value="46">46%</option>
                      <option value="47">47%</option>
                      <option value="48">48%</option>
                      <option value="49">49%</option>
                      <option value="50">50%</option>
               </select>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="parentID" id="parentID" class="form-control">
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