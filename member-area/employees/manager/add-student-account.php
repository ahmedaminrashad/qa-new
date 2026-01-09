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
$g =$_REQUEST['par_id'];
$cv =$_REQUEST['con_id'];
$mang =$_REQUEST['man_id'];
$trial =$_REQUEST['trial_id'];
$tz11 =$_REQUEST['time_id'];
$tz_name =$_REQUEST['time_name'];
$tz_dif =$_REQUEST['time_dif'];
$tz_php =$_REQUEST['time_php'];
$csr_id =$_REQUEST['csr'];
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `country`.`c_a`, `time_zone`.* FROM `account`,`currency`, `country`, `time_zone` where account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING parent_id = '$g'");
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
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$puskype = MYSQL_RESULT($result,$i,"skype");
			$pdate = MYSQL_RESULT($result,$i,"date");
			}
   if (isset($_POST['cmdSubmit'])) 
{
		 	$course= $_POST['txtcourse'];
			$department = $_POST['pdept'];
			$aadepartment = $_POST['aapdept'];
			$langs = $_POST['plan'];
			$skype = $_POST['txts'];
			$age = $_POST['txtage'];
			$gender = $_POST['pgender'];
			$con = $_POST['txts0'];
			$status = $_POST['txtst'];
			$nod = $_POST['txtnod'];
			$fee = $_POST['txtfee'];
			$teacher = $_POST['pteacher'];
			$trialp = $_POST['remarkp'];
			$trialt = $_POST['remarkt'];
			$p_id = $_POST['txtidp'];
			$strial = $_POST['trialp'];
			$pmanp = $_POST['manp'];
			$tzp = $_POST['ptimez'];
			$tzdif = $_POST['ptimedif'];
			$tzname = $_POST['ptimename'];
			$tdate = $_POST['pdate'];
			$tzphp = $_POST['ptimephp'];
			$pcsr = $_POST['tcsr'];
			$abc = base64_encode($p_id);

			mysql_query ("INSERT INTO course(course_yrSec, dept_id, Skype_ID, Age, g_id, c_id, Status, Number_of_Days, Fee, Teacher, Trial_Class, remark_teacher, parent_id, m_id, active, tz_id, timezone, time_name,date,php_tz, lan_id, adept_id, csr_id)
					VALUES('$course','$department','$skype','$age','$gender','$con','$status','$nod','$fee','$teacher','$trialp','$trialt','$p_id','$pmanp','$strial','$tzp','$tzdif','$tzname','$tdate','$tzphp','$langs','$aadepartment','$pcsr')") or die(mysql_error()); 					
 		header(
			 	"Location: parent-accounts-profile?parent_id=$abc");
				}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add <small>New Student</small></h1>
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
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add Student in <?php 
			echo $pname;
?> Account
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
											<i class="fa fa-plus"></i>Add Student Details for <?php 
echo $pname;	
?>
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
															<label class="control-label col-md-3">Student Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Full Name" name="txtcourse" id="txtcourse" maxlength="14" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Age*</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="Add Age" name="txtage" id="txtage" required>
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
																<input type="text" value="<?php echo $puskype; ?>" class="form-control" placeholder="Add Skype ID" name="txts" id="txts">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gender*</label>
																<div class="col-md-9">
															<select required class="form-control" name="pgender"  id="pgender" onchange="javascript: return optionList43_SelectedIndex()">
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
															<label class="control-label col-md-3">Language*</label>
																<div class="col-md-9">
															<select required class="form-control" name="plan"  id="plan" onchange="javascript: return optionList43_SelectedIndex()">
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
																<input type="text" value="<?php echo $pdate; ?>" class="form-control" placeholder="dd-mm-yy" name="pdate" id="pdate">
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
															<label class="control-label col-md-3">Number of Days*</label>
															<div class="col-md-9">
																<input required type="number" class="form-control" placeholder="Number of Classes" name="txtnod" id="txtnod">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Fee*</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="Enter Fee" name="txtfee" id="txtfee" required>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Regular Course*</label>
															<div class="col-md-9">
																<select required class="form-control" name="pdept"  id="pdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM dept WHERE type_id = 1 ORDER BY dept_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Teacher*</label>
															<div class="col-md-9">
																<select required class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 and schedule_status = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Additional Course</label>
															<div class="col-md-9">
																<select class="form-control" name="aapdept"  id="aapdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM dept WHERE type_id = 3 ORDER BY dept_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
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
															<label class="control-label col-md-3">Remarks for Parent*</label>
															<div class="col-md-9">
																<textarea required class="form-control" placeholder="Enter Remarks for Parent" name="remarkp" id="remarkp"></textarea>
															</div>
														</div>
													</div>
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks for Teacher*</label>
															<div class="col-md-9">
																<textarea required class="form-control" placeholder="Enter Remarks for Teacher" name="remarkt" id="remarkt"></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $g; ?>" class="form-control" placeholder="Number of Classes" name="txtidp" id="txtidp">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $cv; ?>" class="form-control" placeholder="Enter Fee" name="txts0" id="txts0">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $mang; ?>" class="form-control" placeholder="Number of Classes" name="manp" id="manp">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $trial; ?>" class="form-control" placeholder="Enter Fee" name="trialp" id="trialp">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $tz11; ?>" class="form-control" placeholder="Number of Classes" name="ptimez" id="ptimez">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $tz_dif; ?>" class="form-control" placeholder="Number of Classes" name="ptimedif" id="ptimedif">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $tz_name; ?>" class="form-control" placeholder="Enter Fee" name="ptimename" id="ptimename">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-9">
																<input type="hidden" value="<?php echo $tz_php; ?>" class="form-control" placeholder="Number of Classes" name="ptimephp" id="ptimephp">
															</div>
														</div>
													</div>
												</div>
												<input type="hidden" value="<?php echo $ID; ?>" class="form-control" placeholder="Number of Classes" name="tcsr" id="tcsr">
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
												</div>
											</div>
										</form>
										<!-- END FORM-->
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