<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
<?php
  include("../includes/session.php");
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
   include("header.php");
   $link =$_REQUEST['link'];
   $Course_ID =$_REQUEST['Course_ID'];
		$result =  mysql_query("SELECT * FROM course WHERE course_id  = '$Course_ID'");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course = MYSQL_RESULT($result,$i,"course_yrSec");
			$department = MYSQL_RESULT($result,$i,"dept_id");
			$skype = MYSQL_RESULT($result,$i,"Skype_ID");
			$con = MYSQL_RESULT($result,$i,"c_id");
			$age = MYSQL_RESULT($result,$i,"Age");
			$gender = MYSQL_RESULT($result,$i,"g_id");
			$status = MYSQL_RESULT($result,$i,"Status");
			$nod = MYSQL_RESULT($result,$i,"Number_of_Days");
			$fee = MYSQL_RESULT($result,$i,"Fee");
			$teacher = MYSQL_RESULT($result,$i,"Teacher");
			$prk = MYSQL_RESULT($result,$i,"Trial_Class");
			$trk = MYSQL_RESULT($result,$i,"remark_teacher");
			$lan = MYSQL_RESULT($result,$i,"lan_id");
			$parent = MYSQL_RESULT($result,$i,"nature");
			$manid = MYSQL_RESULT($result,$i,"m_id");
			$stut = MYSQL_RESULT($result,$i,"active");
			$jod = MYSQL_RESULT($result,$i,"date");
			$rod = MYSQL_RESULT($result,$i,"regular_date");
			$ppt_id = MYSQL_RESULT($result,$i,"parent_id");

				}
?>
<?php 
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$course_a= $_POST['txtcourse'];
			$department_a = $_POST['pdept'];
			$skype_a = $_POST['txts'];
			$age_a = $_POST['txtage'];
			$gender_a = $_POST['pgender'];
			$nod_a = $_POST['txtnod'];
			$fee_a = $_POST['txtfee'];
			$teacher_a = $_POST['pteacher'];
			$trialp = $_POST['remarkp'];
			$trialt = $_POST['remarkt'];
			$tdate = $_POST['pdate'];
			$tman = $_POST['pmanager'];
			$tsu = $_POST['pstatus'];
			$trod = $_POST['txtrod'];
			$tlan = $_POST['plan'];
			$tcid = $_POST['ccid'];
			$link2 = $_POST['link1'];
			$abc = base64_encode($p_id);
			mysql_query ("UPDATE course SET course_yrSec = '$course_a', dept_id = '$department_a', Skype_ID = '$skype_a', Age = '$age_a', g_id = '$gender_a', Number_of_Days = '$nod_a', Fee = '$fee_a', Teacher = '$teacher_a', Trial_Class = '$trialp', remark_teacher = '$trialt', Teacher = '$teacher_a', m_id = '$tman', active = '$tsu', date = '$tdate', regular_date = '$trod', lan_id = '$tlan' WHERE course_id = '$tcid'") or die(mysql_error());
		header("Location: update-course?cid=$tcid&did=$department_a&link=$link2");
				}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Edit<small> Student Profile</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">
							Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="list-of-active-students">List of Students</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Edit Parent Account
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Edit 
											Student Details
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section"><font color="#44B6AE">Person Bio Data</font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Student Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $course; ?>" name="txtcourse" id="txtcourse">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Age</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $age; ?>" name="txtage" id="txtage">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Skype ID</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $skype; ?>" name="txts" id="txts">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gender</label>
																<div class="col-md-9">
															<select class="form-control" name="pgender"  id="pgender" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM Gender ORDER BY g_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['g_id'];?>"><?php echo $row['gender'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Language</label>
																<div class="col-md-9">
															<select class="form-control" name="plan"  id="plan" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM lan ORDER BY lan_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['lan_id'];?>"><?php echo $row['lan_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Data</label>
															<div class="col-md-9">
																<input type="text" value="<?php echo $jod; ?>" class="form-control" name="pdate" id="pdate">
															</div>
														</div>
													</div>
												<!--/span-->
												</div>
												<h3 class="form-section"><font color="#44B6AE">Course Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Number of Days</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $nod; ?>" name="txtnod" id="txtnod">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Fee</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $fee; ?>" name="txtfee" id="txtfee">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Suggested Course</label>
															<div class="col-md-9">
																<select class="form-control" name="pdept"  id="pdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM dept ORDER BY dept_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Teacher</label>
															<div class="col-md-9">
																<select class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE active = 1 and schedule_status = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Trial Class Remarks</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks for Parent</label>
															<div class="col-md-9">
																<textarea class="form-control" name="remarkp" id="remarkp"><?php echo $prk; ?></textarea>
															</div>
														</div>
													</div>
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks for Teacher</label>
															<div class="col-md-9">
																<textarea class="form-control" name="remarkt" id="remarkt"><?php echo $trk; ?></textarea>
															</div>
														</div>
													</div>
												</div>
												<h3 class="form-section"><font color="#44B6AE">Other Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Manager Name</label>
															<div class="col-md-9">
																<select required class="form-control" name="pmanager"  id="pmanager" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 5 or super_rights = 1) and active = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Status</label>
															<div class="col-md-9">
																<select class="form-control" name="pstatus"  id="pstatus" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM status ORDER BY status_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['status_id'];?>"><?php echo $row['status_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Regular Date</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $rod; ?>" name="txtrod" id="txtrod">
															</div>
														</div>
													</div>
													<input type="hidden" class="form-control" value="<?php echo $Course_ID; ?>" name="ccid" id="ccid">
													<input type="hidden" class="form-control" value="<?php echo $link; ?>#tab_1_22" name="link1" id="link1">
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" name="cmdSubmit" class="btn green">Submit</button>
																<button type="button" class="btn default">Cancel</button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>										<!-- END FORM-->
									</div>
								</div>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pgender.value = ("<?php echo $gender; ?>");
	form.plan.value = ("<?php echo $lan; ?>");
	form.pdept.value = ("<?php echo $department; ?>");
	form.pteacher.value = ("<?php echo $teacher; ?>");
	form.pmanager.value = ("<?php echo $manid; ?>");
	form.pstatus.value = ("<?php echo $stut; ?>");
	//alert (form.pCityM.value);				
</script>