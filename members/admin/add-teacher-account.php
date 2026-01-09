<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");

   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		if (trim($_POST['txtcourse']) == ""){ $txtcourse = 'Required';}	
{
require ("../includes/dbconnection.php");
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
			$sql = "INSERT INTO profile(teacher_name, Father_name, CNIC, Address, Email, Mobile, Telephone, Age, g_id, ms_id, Nationality, Qualification1, Qualification2, Qualification3, Experience, Salary, Skype, cat_id, username, userpass, witness_1, cnic_1, relation_1, phone_1, aphone_1, years_1, address_1, witness_2, cnic_2, relation_2, phone_2, aphone_2, years_2, address_2, st1, et1, st2, et2, st3, et3, s_pass, shift_id, inout_id, time, timezone_dif, joining_date, alt_phone, alt_moblie, bank, branch_code, account_no, salary_amount, residence_all, tax, account_title, dept_id)
			VALUES('$teacher_name','$father_name','$teacher_cnic', '$address', '$teacher_email', '$teacher_mobile', '$teacher_phone', '$teacher_age', '$teacher_gender', '$teacher_marital', '$teacher_nation', '$teacher_q1', '$teacher_q2', '$teacher_q3', '$teacher_exe', '$teacher_salary', '$teacher_skype', '$teacher_designation', '$teacher_user', '$teacher_pass', '$witness_name1', '$witness_cnic1', '$witness_r1', '$witness_m1', '$witness_a1', '$witness_year1', '$witness_add1', '$witness_name2', '$witness_cnic2', '$witness_r2', '$witness_m2', '$witness_a2', '$witness_year2', '$witness_add2', '$st1', '$et1', '$st2', '$et2', '$st3', '$et3', '$teacher_spass', '1', '$teacher_live', '$teacher_timezone', '$teacher_tzdiff', '$teacher_date', '$ateacher_phone', '$ateacher_mobile', '0', '0', '0', '0', '0', '0', '$teacher_name', '$teacher_designation')"; 
									 if ($conn->query($sql) === TRUE) { 
									 echo "<script>window.open('list-of-teachers','_self')</script>";
			 	}
}
}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add Country';
$page_subtitle = 'You are adding a country!';
$table_name = 'Add Country';
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
											<div class="form-body">
												<h3 class="form-section"><font color="#44B6AE">Person Bio Data</font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Teacher Name*</label>
															<div>
																<input required type="text" class="form-control" placeholder="Add Full Name" name="teach_name" id="teach_name">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Father Name*</label>
															<div>
																<input required type="text" class="form-control" placeholder="Add Father Name" name="fname" id="fname">
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
																<input required type="text" class="form-control" placeholder="Add CNIC No." name="t_cnic" id="t_cnic">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Address</label>
															<div>
																<input type="text" class="form-control" placeholder="Add Address" name="taddress" id="taddress">
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
																<input type="text" class="form-control" placeholder="Add Land-Line Number" name="ttnumber" id="ttnumber">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Mobile</label>
															<div>
																<input required type="text" class="form-control" placeholder="Add Cell Number" name="tmnumber" id="tmnumber">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Alt-Telephone</label>
															<div>
																<input type="text" class="form-control" placeholder="Alternative Land-Line Number" name="attnumber" id="attnumber">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Alt-Mobile</label>
															<div>
																<input type="text" class="form-control" placeholder="Alternative Cell Number" name="atmnumber" id="atmnumber">
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
																<input type="email" class="form-control" placeholder="Add Email" name="temail" id="temail" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Age</label>
															<div>
																<input type="number" class="form-control" placeholder="Add Age" name="tage" id="tage">
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
																<input type="text" class="form-control" placeholder="First Qualification" name="tq1" id="tq1">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Qualification 2</label>
															<div>
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
															<label>Qualification 3</label>
															<div>
																<input type="text" class="form-control" placeholder="Third Qualification" name="tq3" id="tq3">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Experience</label>
															<div>
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
															<label>Designation*</label>
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
																<input type="text" class="form-control" placeholder="Add Skype ID" name="skype" id="skype">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Password</label>
															<div>
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
															<label required>Tz-Difference*</label>
															<div>
															<input required type="text" class="form-control" placeholder="Add Nationality" name="tzdiff" id="tzdiff">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
													<div class="form-group">
															<label>Local/Foregin*</label>
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
																<input type="text" class="form-control" placeholder="Add Nationality" name="pnational" id="pnational">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>TimeZone*</label>
															<div>
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
															<label>Joining Date*</label>
															<div>
																<input required type="date" class="form-control" value="<?php echo $sy; ?>" name="jdate" id="jdate">
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
															<label>Start Time 1*</label>
															<div>
																<select required class="form-control" name="st1"  id="st1" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timetable ORDER BY TimeID";			  	
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
																<input required type="text" class="form-control" placeholder="Login Name" name="tuser" id="tuser">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Userpass*</label>
															<div>
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
															<label>Witness Name</label>
															<div>
																<input type="text" class="form-control" placeholder="Add Witness Name" name="wn1" id="wn1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>CNIC</label>
															<div>
																<input type="text" class="form-control" placeholder="Add CNIC" name="wcnic1" id="wcnic1">
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
																<input type="text" class="form-control" placeholder="Add Relationship" name="wr1" id="wr1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Mobile No.</label>
															<div>
																<input type="text" class="form-control" placeholder="Add Mobile Number" name="wm1" id="wm1">
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
																<input type="text" class="form-control" placeholder="Add Alternative Contact" name="wa1" id="wa1">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Years</label>
															<div>
																<input type="number" class="form-control" placeholder="Number of Years" name="wy1" id="wy1">
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
															<label>Witness Name</label>
															<div>
																<input type="text" class="form-control" placeholder="Add Witness Name" name="wn2" id="wn2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>CNIC</label>
															<div>
																<input type="text" class="form-control" placeholder="Add CNIC" name="wcnic2" id="wcnic2">
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
																<input type="text" class="form-control" placeholder="Add Relationship" name="wr2" id="wr2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Mobile No.</label>
															<div>
																<input type="text" class="form-control" placeholder="Add Mobile Number" name="wm2" id="wm2">
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
																<input type="text" class="form-control" placeholder="Add Alternative Contact" name="wa2" id="wa2">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Years</label>
															<div>
																<input type="number" class="form-control" placeholder="Number of Years" name="wy2" id="wy2">
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
																<input type="text" class="form-control" placeholder="Add Address" name="wadd2" id="wadd2">
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Add New Teacher</button>
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