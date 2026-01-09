<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
	$pro =$_REQUEST['profile_no'];
		$sql = "SELECT * FROM profile Where teacher_id = $pro";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$this_profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];
			$fname = $row['Father_name'];
			$cnic = $row['CNIC'];
			$add = $row['Address'];
			$tphone = $row['Telephone'];
			$mphone = $row['Mobile'];
			$email = $row['Email'];
			$age = $row['Age'];
			$nat = $row['Nationality'];
			$gender = $row['g_id'];
			$mat = $row['ms_id'];
			$q1 = $row['Qualification1'];
			$q2 = $row['Qualification2'];
			$q3 = $row['Qualification3'];
			$exe = $row['Experience'];
			$em_id = $row['cat_id'];
			$skype = $row['Skype'];
			$sal = $row['Salary'];
			$user = $row['username'];
			$pass = $row['userpass'];
			$i_remk = $row['i_remk'];
			$wn1 = $row['witness_1'];
			$cnic1 = $row['cnic_1'];
			$rel1 = $row['relation_1'];
			$mnum1 = $row['phone_1'];
			$anum1 = $row['aphone_1'];
			$year1 = $row['years_1'];
			$add1 = $row['address_1'];
			$wn2 = $row['witness_2'];
			$cnic2 = $row['cnic_2'];
			$rel2 = $row['relation_2'];
			$mnum2 = $row['phone_2'];
			$anum2 = $row['aphone_2'];
			$year2 = $row['years_2'];
			$add2 = $row['address_2'];
			$doj = $row['joining_date'];
			$tz_time = $row['time'];
			$tz_diff = $row['timezone_dif'];
			$skype_p = $row['s_pass'];
			$st1 = $row['st1'];
			$st2 = $row['st2'];
			$st3 = $row['st3'];
			$et1 = $row['et1'];
			$et2 = $row['et2'];
			$et3 = $row['et3'];
			$shift = $row['shift_id'];
			$live = $row['inout_id'];
			$atphone = $row['alt_phone'];
			$amphone = $row['alt_moblie'];
			$bank = $row['bank'];
			$b_code = $row['branch_code'];
			$acc_no = $row['account_no'];
			$t_salary = $row['salary_amount'];
			$t_rent = $row['residence_all'];
			$t_tax = $row['tax'];
			$t_title = $row['account_title'];
				}
				}
				?>
<?php 
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
  	require ("../includes/dbconnection.php");
  	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
			$teacher_bank = $_POST['abank'];
			$teacher_bcode = $_POST['acode'];
			$teacher_acc = $_POST['aacc'];
			$pppiiiddd = $_POST['proiidd'];
			$salary_amu = $_POST['tsalary'];
			$rent_amu = $_POST['trent'];
			$tax_amu = $_POST['ttax'];
			$sql = "UPDATE profile SET teacher_name = '$teacher_name', Father_name = '$father_name', CNIC = '$teacher_cnic', Address = '$address', Email = '$teacher_email', Mobile = '$teacher_mobile', Telephone = '$teacher_phone', Age = '$teacher_age', g_id = '$teacher_gender', ms_id = '$teacher_marital', Nationality = '$teacher_nation', Qualification1 = '$teacher_q1', Qualification2 = '$teacher_q2', Qualification2 = '$teacher_q3', Experience = '$teacher_exe', Salary = '$teacher_salary', Skype = '$teacher_skype', cat_id = '$teacher_designation', username = '$teacher_user', userpass = '$teacher_pass', witness_1 = '$witness_name1', cnic_1 = '$witness_cnic1', relation_1 = '$witness_r1', phone_1 = '$witness_m1', aphone_1 = '$witness_a1', years_1 = '$witness_year1', address_1 = '$witness_add1', witness_2 = '$witness_name2', cnic_2 = '$witness_cnic2', relation_2 = '$witness_r2', phone_2 = '$witness_m2', aphone_2 = '$witness_a2', years_2 = '$witness_year2', address_2 = '$witness_add2', joining_date = '$teacher_date', s_pass = '$teacher_spass', timezone = '$teacher_timezone', timezone_dif = '$teacher_tzdiff', inout_id = '$teacher_live', st1 = '$st1', st2 = '$st2', st3 = '$st3', et1 = '$et1', et2 = '$et2', et3 = '$et3', alt_phone = '$ateacher_phone', alt_moblie = '$ateacher_mobile', salary_amount = '$salary_amu', residence_all = '$rent_amu', tax = '$tax_amu', bank = '$teacher_bank', branch_code = '$teacher_bcode', account_no = '$teacher_acc', time = '$teacher_timezone' WHERE teacher_id = '$pppiiiddd'"; 
if ($conn->query($sql) === TRUE) {
echo "<script>window.open('teacher-accounts-profile?profile_no=".base64_encode($_REQUEST['profile_no'])."','_self')</script>";
}
}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Teacher';
$page_subtitle = 'Edit Teacher Account';
$table_name = 'Edit Teacher';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php //echo $search_bar; ?>
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
											<div class="form-body">
												<h3 class="form-section">Person 
												Bio Data of<font color="#44B6AE"> <b><?php echo $tname; ?></b></font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Teacher Name*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $tname; ?>" name="teach_name" id="teach_name">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Father Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname" id="fname">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>CNIC*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $cnic; ?>" name="t_cnic" id="t_cnic">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Address</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $add; ?>" name="taddress" id="taddress">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Telephone</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $tphone; ?>" name="ttnumber" id="ttnumber">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Mobile*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $mphone; ?>" name="tmnumber" id="tmnumber">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Alt-Phone</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $atphone; ?>" name="attnumber" id="attnumber">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Alt-Mobile</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $amphone; ?>" name="atmnumber" id="atmnumber">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>E-mail*</label>
															<div>
																<input type="email" class="form-control" value="<?php echo $email; ?>" name="temail" id="temail" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Age</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $age; ?>" name="tage" id="tage">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Gender*</label>
															<div>
															<select required class="form-control" name="tgender"  id="tgender" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM gender ORDER BY g_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['g_id'];?>"><?php echo $row['gender'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
													<div class="form-group">
															<label>Marital Status*</label>
															<div>
															<select required class="form-control" name="tmarital"  id="tmarital" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM marital ORDER BY ms_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['ms_id'];?>"><?php echo $row['marital_s'];?> </option>
                      <?php } ?>
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
															<label>Qualification 1</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $q1; ?>" name="tq1" id="tq1">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Qualification 2</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $q2; ?>" name="tq2" id="tq2">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Qualification 3</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $q3; ?>" name="tq3" id="tq3">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Experience</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $exe; ?>" name="texpi" id="texpi">
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
															<label>Designation</label>
															<div>
																<select required class="form-control" name="designation"  id="designation" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM employee_catagory ORDER BY cat_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label required>Salary Package*</label>
															<div>
																<select required class="form-control" name="salary"  id="salary" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM salary_package ORDER BY salary_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['salary_id'];?>"><?php echo $row['salary_name'];?> </option>
                      <?php } ?>
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
															<label>Skype ID</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $skype; ?>" name="skype" id="skype">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Password</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $skype_p; ?>" name="skype_pass" id="skype_pass">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label required>Tz-Difference*</label>
															<div>
															<input required type="text" class="form-control" value="<?php echo $tz_diff; ?>" name="tzdiff" id="tzdiff">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
													<div class="form-group">
															<label>Live in*</label>
															<div>
															<select required class="form-control" name="local_id"  id="local_id" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM hello ORDER BY inout_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['inout_id'];?>"><?php echo $row['inout_name'];?> </option>
                      <?php } ?>
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
															<label>Nationality</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $nat; ?>" name="pnational" id="pnational">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>TimeZone*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $tz_time; ?>" name="timez" id="timez">															
																</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Bank</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $bank; ?>" name="abank" id="abank">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Branch Code</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $b_code; ?>" name="acode" id="acode">															
																</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Account No.</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $acc_no; ?>" name="aacc" id="aacc">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Joining Date*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $doj; ?>" name="jdate" id="jdate">															
																</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Salary Amount</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $t_salary; ?>" name="tsalary" id="tsalary">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Residence Allowance</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $t_rent; ?>" name="trent" id="trent">															
																</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Tax Amount</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $t_tax; ?>" name="ttax" id="ttax">
															</div>
														</div>
													</div>
													</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">Schedule Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Start Time 1*</label>
															<div>
																<select required class="form-control" name="st1"  id="st1" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>End Time 1*</label>
															<div>
																<select required class="form-control" name="et1"  id="et1" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Start Time 2*</label>
															<div>
																<select required class="form-control" name="st2"  id="st2" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>End Time 2*</label>
															<div>
																<select required class="form-control" name="et2"  id="et2" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } ?>
               </select>															
               												</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Start Time 3*</label>
															<div>
																<select required class="form-control" name="st3"  id="st3" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>End Time 3*</label>
															<div>
																<select required class="form-control" name="et3"  id="et3" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeID'];?>"><?php echo $row['TimeList'];?> </option>
                      <?php } ?>
               </select>
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
															<label>Username*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $user; ?>" name="tuser" id="tuser">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Userpass*</label>
															<div>
																<input required type="text" class="form-control" value="<?php echo $pass; ?>" name="tpass" id="tpass">
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
															<label>Witness Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $wn1; ?>" name="wn1" id="wn1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>CNIC</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $cnic1; ?>" name="wcnic1" id="wcnic1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Relation</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $rel1; ?>" name="wr1" id="wr1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Mobile No.</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $mnum1; ?>" name="wm1" id="wm1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Alt-Contact</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $anum1; ?>" name="wa1" id="wa1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Years</label>
															<div>
																<input type="number" class="form-control" value="<?php echo $year1; ?>" name="wy1" id="wy1">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Address</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $add1; ?>" name="wadd1" id="wadd1">
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
															<label>Witness Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $wn2; ?>" name="wn2" id="wn2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>CNIC</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $cnic2; ?>" name="wcnic2" id="wcnic2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Relation</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $rel2; ?>" name="wr2" id="wr2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Mobile No.</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $mnum2; ?>" name="wm2" id="wm2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Alt-Contact</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $anum2; ?>" name="wa2" id="wa2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Years</label>
															<div>
																<input type="number" class="form-control" value="<?php echo $year2; ?>" name="wy2" id="wy2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Address</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $add2; ?>" name="wadd2" id="wadd2">
															</div>
														</div>
													</div>
													<input type="hidden" class="form-control" value="<?php echo $pro; ?>" name="proiidd" id="proiidd">
												</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
							</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.st1.value = ("<?php echo $st1; ?>");
	form.st2.value = ("<?php echo $st2; ?>");
	form.st3.value = ("<?php echo $st3; ?>");
	form.et1.value = ("<?php echo $et1; ?>");
	form.et2.value = ("<?php echo $et2; ?>");
	form.et3.value = ("<?php echo $et3; ?>");
	form.salary.value = ("<?php echo $sal; ?>");
	form.local_id.value = ("<?php echo $live; ?>");
	form.tgender.value = ("<?php echo $gender; ?>");
	form.tmarital.value = ("<?php echo $mat; ?>");
	form.designation.value = ("<?php echo $em_id; ?>");
	//alert (form.pCityM.value);				
</script>