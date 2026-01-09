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

   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		if (trim($_POST['txtcourse']) == ""){ $txtcourse = 'Required';}	
if (($flagfaculty_name == ""))
{
			$teacher_name = $_POST['teach_name'];
			$father_name = $_POST['fname'];
			$teacher_cnic = $_POST['t_cnic'];
			$address = $_POST['taddress'];
			$teacher_phone = $_POST['ttnumber'];
			$teacher_mobile = $_POST['tmnumber'];
			$ateacher_phone = $_POST['attnumber'];
			$ateacher_mobile = $_POST['atmnumber'];
			$teacher_email = $_POST['temail'];
			$teacher_age = $_POST['tage'];
			$teacher_gender = $_POST['tgender'];
			$teacher_marital = $_POST['tmarital'];
			$teacher_q1 = $_POST['tq1'];
			$teacher_q2 = $_POST['tq2'];
			$teacher_q3 = $_POST['tq3'];
			$teacher_exe = $_POST['texpi'];
			$teacher_designation = $_POST['designation'];
			$teacher_skype = $_POST['skype'];
			$teacher_spass = $_POST['skype_pass'];
			$teacher_tzdiff = $_POST['tzdiff'];
			$teacher_live = $_POST['local_id'];
			$teacher_nation = $_POST['pnational'];
			$teacher_timezone = $_POST['timez'];
			$teacher_salary = $_POST['salary'];
			$st1 = $_POST['st1'];
			$et1 = $_POST['et1'];
			$st2 = $_POST['st2'];
			$et2 = $_POST['et2'];
			$st3 = $_POST['st3'];
			$et3 = $_POST['et3'];
			$teacher_user = $_POST['tuser'];
			$teacher_pass = $_POST['tpass'];
			$csr = $_POST['checkbox1'];
			$manager = $_POST['checkbox2'];
			$supper_manager = $_POST['checkbox3'];
			$teacher = $_POST['checkbox4'];
			$accounts = $_POST['checkbox5'];
			$billing = $_POST['checkbox6'];
			$witness_name1 = $_POST['wn1'];
			$witness_cnic1 = $_POST['wcnic1'];
			$witness_r1 = $_POST['wr1'];
			$witness_m1 = $_POST['wm1'];
			$witness_a1 = $_POST['wa1'];
			$witness_year1 = $_POST['wy1'];
			$witness_add1 = $_POST['wadd1'];
			$witness_name2 = $_POST['wn2'];
			$witness_cnic2 = $_POST['wcnic2'];
			$witness_r2 = $_POST['wr2'];
			$witness_m2 = $_POST['wm2'];
			$witness_a2 = $_POST['wa2'];
			$witness_year2 = $_POST['wy2'];
			$witness_add2 = $_POST['wadd2'];
			$teacher_date = $_POST['jdate'];
			mysql_query ("INSERT INTO profile(teacher_name, Father_name, CNIC, Address, Email, Mobile, Telephone, Age, g_id, ms_id, Nationality, Qualification1, Qualification2, Qualification3, Experience, Salary, Skype, cat_id, username, userpass, witness_1, cnic_1, relation_1, phone_1, aphone_1, years_1, address_1, witness_2, cnic_2, relation_2, phone_2, aphone_2, years_2, address_2, st1, et1, st2, et2, st3, et3, s_pass, shift_id, inout_id, time, timezone_dif, joining_date, alt_phone, alt_moblie, bank, branch_code, account_no, salary_amount, residence_all, tax, account_title, csr_rights, super_rights, s_supper_rights, teacher_rights, accounts, billing_rights)
			VALUES('$teacher_name','$father_name','$teacher_cnic', '$address', '$teacher_email', '$teacher_mobile', '$teacher_phone', '$teacher_age', '$teacher_gender', '$teacher_marital', '$teacher_nation', '$teacher_q1', '$teacher_q2', '$teacher_q3', '$teacher_exe', '$teacher_salary', '$teacher_skype', '$teacher_designation', '$teacher_user', '$teacher_pass', '$witness_name1', '$witness_cnic1', '$witness_r1', '$witness_m1', '$witness_a1', '$witness_year1', '$witness_add1', '$witness_name2', '$witness_cnic2', '$witness_r2', '$witness_m2', '$witness_a2', '$witness_year2', '$witness_add2', '$st1', '$et1', '$st2', '$et2', '$st3', '$et3', '$teacher_spass', '1', '$teacher_live', '$teacher_timezone', '$teacher_tzdiff', '$teacher_date', '$ateacher_phone', '$ateacher_mobile', '0', '0', '0', '0', '0', '0', '$teacher_name', '$csr', '$manager', '$supper_manager', '$teacher', '$accounts', '$billing')") or die(mysql_error()); 
									 header(
			 	"Location: list-of-teachers");
}
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
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
				<h1>Add <small>New Teacher</small></h1>
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
					<a href="#">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add Teacher Login Account
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
											<i class="fa fa-plus"></i>Add Teacher Details
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
															<label class="control-label col-md-3"><span class="label label-danger">Teacher Name*</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Add Full Name" name="teach_name" id="teach_name">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Father Name*</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Add Father Name" name="fname" id="fname">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">CNIC*</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Add CNIC No." name="t_cnic" id="t_cnic">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Address" name="taddress" id="taddress">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telephone</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Land-Line Number" name="ttnumber" id="ttnumber">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Mobile</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Add Cell Number" name="tmnumber" id="tmnumber">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alt-Telephone</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Alternative Land-Line Number" name="attnumber" id="attnumber">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alt-Mobile</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Alternative Cell Number" name="atmnumber" id="atmnumber">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">E-mail*</span></label>
															<div class="col-md-9">
																<input type="email" class="form-control" placeholder="Add Email" name="temail" id="temail" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Age</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="Add Age" name="tage" id="tage">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Gender*</span></label>
															<div class="col-md-9">
															<select required class="form-control" name="tgender"  id="tgender" onchange="javascript: return optionList43_SelectedIndex()">
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
													<div class="col-md-6">
													<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Marital Status*</span></label>
															<div class="col-md-9">
															<select required class="form-control" name="tmarital"  id="tmarital" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM marital ORDER BY ms_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['ms_id'];?>"><?php echo $row['marital_s'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Qualification 1</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="First Qualification" name="tq1" id="tq1">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Qualification 2</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Second Qualification" name="tq2" id="tq2">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Qualification 3</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Third Qualification" name="tq3" id="tq3">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Experience</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Experience" name="texpi" id="texpi">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Official Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Designation*</span></label>
															<div class="col-md-9">
																<select required class="form-control" name="designation"  id="designation" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM employee_catagory ORDER BY cat_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label required class="control-label col-md-3"><span class="label label-danger">Salary Package*</span></label>
															<div class="col-md-9">
																<select required class="form-control" name="salary"  id="salary" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM salary_package ORDER BY salary_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['salary_id'];?>"><?php echo $row['salary_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Skype ID</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Skype ID" name="skype" id="skype">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Password</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Skype Password" name="skype_pass" id="skype_pass">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label required class="control-label col-md-3"><span class="label label-danger">Tz-Difference*</span></label>
															<div class="col-md-9">
															<input required type="text" class="form-control" placeholder="Add Nationality" name="tzdiff" id="tzdiff">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
													<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Local/Foregin*</span></label>
															<div class="col-md-9">
															<select required class="form-control" name="local_id"  id="local_id" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM hello ORDER BY inout_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['inout_id'];?>"><?php echo $row['inout_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nationality</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Nationality" name="pnational" id="pnational">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">TimeZone*</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Add PHPTimeZone" name="timez" id="timez">															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Joining Date*</span></label>
															<div class="col-md-9">
																<input required type="date" class="form-control" placeholder="Add Nationality" name="jdate" id="jdate">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Schedule Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Start Time 1*</label>
															<div class="col-md-9">
																<select required class="form-control" name="st1"  id="st1" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID ");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">End Time 1*</label>
															<div class="col-md-9">
																<select required class="form-control" name="et1"  id="et1" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID ");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
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
															<label class="control-label col-md-3">Start Time 2*</label>
															<div class="col-md-9">
																<select required class="form-control" name="st2"  id="st2" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID ");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">End Time 2*</label>
															<div class="col-md-9">
																<select required class="form-control" name="et2"  id="et2" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID ");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
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
															<label class="control-label col-md-3">Start Time 3*</label>
															<div class="col-md-9">
																<select required class="form-control" name="st3"  id="st3" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID ");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">End Time 3*</label>
															<div class="col-md-9">
																<select required class="form-control" name="et3"  id="et3" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID ");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Asign Rights</font></h3>
												<!--/row-->
												<div class="row">
													<div class="form-group">
									<label class="control-label col-md-3"><span class="label label-danger">Select Access</span></label>
									<div class="md-checkbox-inline">
										<div class="md-checkbox">
											<input type="hidden" name="checkbox1" value="2">
											<input type="checkbox" name="checkbox1" value="1" id="checkbox1" class="md-check">
											<label for="checkbox1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											CSR </label>
										</div>
										<div class="md-checkbox">
											<input type="hidden" name="checkbox2" value="2">
											<input type="checkbox" name="checkbox2" value="1" id="checkbox2" class="md-check">
											<label for="checkbox2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Manager </label>
										</div>
										<div class="md-checkbox">
											<input type="hidden" name="checkbox3" value="2">
											<input type="checkbox" name="checkbox3" value="1" id="checkbox3" class="md-check">
											<label for="checkbox3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											S-Manager </label>
										</div>
										<div class="md-checkbox">
											<input type="hidden" name="checkbox4" value="2">
											<input type="checkbox" name="checkbox4" value="1" id="checkbox4" class="md-check">
											<label for="checkbox4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Teacher </label>
										</div>
										<div class="md-checkbox">
											<input type="hidden" name="checkbox5" value="2">
											<input type="checkbox" name="checkbox5" value="1" id="checkbox5" class="md-check">
											<label for="checkbox5">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Accounts </label>
										</div>
										<div class="md-checkbox">
											<input type="hidden" name="checkbox6" value="2">
											<input type="checkbox" name="checkbox6" value="1" id="checkbox6" class="md-check">
											<label for="checkbox6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Billing </label>
										</div>
									</div>
												</div>
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Login Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Username*</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Login Name" name="tuser" id="tuser">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><span class="label label-danger">Userpass*</span></label>
															<div class="col-md-9">
																<input required type="text" class="form-control" placeholder="Login Password" name="tpass" id="tpass">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">First Witness Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Witness Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Witness Name" name="wn1" id="wn1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">CNIC</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add CNIC" name="wcnic1" id="wcnic1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Relation</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Relationship" name="wr1" id="wr1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No.</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Mobile Number" name="wm1" id="wm1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alt-Contact</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Alternative Contact" name="wa1" id="wa1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Years</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="Number of Years" name="wy1" id="wy1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Address" name="wadd1" id="wadd1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Second  Witness Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Witness Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Witness Name" name="wn2" id="wn2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">CNIC</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add CNIC" name="wcnic2" id="wcnic2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Relation</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Relationship" name="wr2" id="wr2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No.</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Mobile Number" name="wm2" id="wm2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alt-Contact</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Alternative Contact" name="wa2" id="wa2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Years</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="Number of Years" name="wy2" id="wy2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Address" name="wadd2" id="wadd2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.st1.value = ("49");
	form.st2.value = ("49");
	form.st3.value = ("49");
	form.et1.value = ("49");
	form.et2.value = ("49");
	form.et3.value = ("49");
	form.tgender.value = ("1");
	form.tmarital.value = ("1");
	form.designation.value = ("8");
	form.salary.value = ("2");
	form.local_id.value = ("1");
	//alert (form.pCityM.value);				
</script>