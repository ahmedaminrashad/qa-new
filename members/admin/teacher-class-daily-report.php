<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  function abc($er)
{require ("../includes/dbconnection.php");
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
}
  function today($var1, $var2, $var3)
{require ("../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE date_admin = '$var1' and monitor_id = '$var2' and teacher_id = '$var3' and re_status = '1'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows;
}
function today1($var1, $var3)
{require ("../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE date_admin = '$var1' and teacher_id = '$var3'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
}
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
								<thead>
								<tr>
								<th colspan="2">
									 Teacher Name
								</th>
								<th>
									 Total
								</th>
								<th>
									 Taken
								</th>
								<th>
									 Absent
								</th>
								<th>
									 Leave
								</th>
								<th>
									 Declined
								</th>
								<th>
									 Total Payable
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM `profile` WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
				$profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];
			$aimage = $row['ima'];

?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td class="fit">
										<img class="user-pic" src="../uploads/thumb/<?php echo $aimage; ?>">
									</td>
								<td>
									 <b><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><?php echo $tname; ?></a></b> 
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs"><?php echo abc("$profile_no"); ?></button></a> 
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button type="button" class="btn green btn-xs">Schedule</button></a>
								</td>
								<td>
									<button type="button" class="btn btn-sm"><?php echo today1("$sy","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn green btn-sm"><?php echo today("$sy","9","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn red btn-sm"><?php echo today("$sy","4","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn blue btn-sm"><?php echo today("$sy","5","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn yellow btn-sm"><?php echo today("$sy","6","$profile_no"); ?></button>
								</td>
								<td>
									
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								</tbody>
								</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="teacher-student-list-search">
				<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />
                                <div class="form-group">
<label>Month</label>
<div>
<select required class="form-control" name="month_id"  id="month_id">

<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM month ORDER BY month_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<label>Year</label>
<div>
<select required class="form-control" name="year_id"  id="year_id">
<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM school_yr ORDER BY year_id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
<?php } ?>
</select>
</div>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->












								</table>
							</div>
						</div>
						<!-- full width -->
							<div id="full-width" class="modal container fade" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								</div>
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-chevron-right"></i>Search For Previous Month Records
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="teacher-student-list-search" method="GET" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section">Please Select Desired Month and Year</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Month</label>
															<div class="col-md-9">
																<select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM month ORDER BY month_id ");			  	
				do {  ?>
  <option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
																<span class="help-block">
																Please Select Month. </span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Year</label>
															<div class="col-md-9">
															<select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<span class="help-block">
																Please Select Year. </span>

<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />

															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
				</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>