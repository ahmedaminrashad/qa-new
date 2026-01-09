<?
require ("../includes/dbconnection.php");
$famSID=$_GET['famSID'];
$famTID=$_GET['famTID'];
$famTtime=$_GET['famTtime'];
$famStime=$_GET['famStime'];
$famSname=$_GET['famSname'];
$famLink=$_GET['famLink'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Allocate CSR to <?php echo $famSname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="change-schedule-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher Time</strong></label>
															<div class="col-md-7">
															<select required class="form-control" name="timeid"  id="timeid" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart");			  	
				do {  ?>
                      <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student Time</strong></label>
															<div class="col-md-7">
															<select required class="form-control" name="studentid"  id="studentid" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM Stime");			  	
				do {  ?>
                      <option value="<?php echo $row['stime_s_id'];?>"><?php echo $row['stime_s'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher</strong></label>
															<div class="col-md-7">
															<select required class="form-control" name="teacherid"  id="teacherid" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
												</div>
												<input type="hidden" value="<?php echo $famSID; ?>" name="s_id" id="s_id" class="form-control"></input>
												<input type="hidden" value="<?php echo $famLink; ?>" name="link" id="link" class="form-control"></input>
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
							<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.timeid.value = ("<?php echo $famTtime; ?>");
	form.studentid.value = ("<?php echo $famStime; ?>");
	form.teacherid.value = ("<?php echo $famTID; ?>");
	form.adminid.value = ("<?php echo $famAtime; ?>");
	//alert (form.pCityM.value);				
</script>