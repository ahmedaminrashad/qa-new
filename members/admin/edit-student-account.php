<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
   $link =$_REQUEST['link'];
   $Course_ID =$_REQUEST['Course_ID'];
		$sql = "SELECT * FROM course WHERE course_id  = '$Course_ID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
				while ($row = mysqli_fetch_assoc($result)){
			$this_course_ID = $row['course_id'];
			$course = $row['course_yrSec'];
			$department = $row['dept_id'];
			$adepartment = $row['adept_id'];
			$skype = $row['Skype_ID'];
			$con = $row['c_id'];
			$age = $row['Age'];
			$gender = $row['g_id'];
			$status = $row['Status'];
			$fee = $row['Fee'];
			$teacher = $row['Teacher'];
			$prk = $row['Trial_Class'];
			$trk = $row['remark_teacher'];
			$lan = $row['lan_id'];
			$parent = $row['nature'];
			$manid = $row['m_id'];
			$stut = $row['active'];
			$jod = $row['date'];
			$rod = $row['regular_date'];
			$ppt_id = $row['parent_id'];
			$STrate = $row['rate'];

				}
				}
?>
<?php 
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
  	require ("../includes/dbconnection.php");
		 	$course_a= $_POST['txtcourse'];
			$department_a = $_POST['pdept'];
			$adepartment_a = $_POST['aapdept'];
			$skype_a = $_POST['txts'];
			$age_a = $_POST['txtage'];
			$gender_a = $_POST['pgender'];
			$nod_a = $_POST['prate'];
			$fee_a = 0;
			$teacher_a = $_POST['pteacher'];
			$trialp = $_POST['remarkp'];
			$trialt = $_POST['remarkt'];
			$tdate = $_POST['pdate'];
			$tman = $_POST['pmanager'];
			$tsu = $_POST['pstatus'];
			$trod = $_POST['txtrod'];
			$tlan = $_POST['plan'];
			$tcid = $_POST['ccid'];
			$pcur = $_POST['tcur'];
			$abc = base64_encode($_POST['link1']);
			$sql = "UPDATE course SET course_yrSec = '$course_a', dept_id = '$department_a', adept_id = '$adepartment_a', Skype_ID = '$skype_a', Age = '$age_a', g_id = '$gender_a', rate = '$nod_a', Fee = '$fee_a', Teacher = '$teacher_a', Trial_Class = '$trialp', remark_teacher = '$trialt', Teacher = '$teacher_a', m_id = '$tman', active = '$tsu', date = '$tdate', regular_date = '$trod', lan_id = '$tlan' WHERE course_id = '$tcid'";
		if ($conn->query($sql) === TRUE) {
		echo "<script>window.open('update-course?cid=".$tcid."&did=".$department_a."&adid=".$adepartment_a."&parent_id=".$abc."&rate=".$nod_a."','_self')</script>";
		}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Student';
$page_subtitle = 'Edit Student';
$table_name = 'Edit Student';
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
												<h3 class="form-section"><font color="#44B6AE">Person Bio Data</font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Student Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $course; ?>" name="txtcourse" id="txtcourse">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Age</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $age; ?>" name="txtage" id="txtage">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Skype ID</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $skype; ?>" name="txts" id="txts">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Gender</label>
																<div>
															<select class="form-control" name="pgender"  id="pgender">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM gender ORDER BY g_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['g_id'];?>" <?php if ($row['g_id'] == $gender) { echo 'selected';} ?>><?php echo $row['gender'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Language</label>
																<div>
															<select class="form-control" name="plan"  id="plan" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM lan ORDER BY lan_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['lan_id'];?>" <?php if ($row['lan_id'] == $lan) { echo 'selected';} ?>><?php echo $row['lan_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Data</label>
															<div>
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
															<label>Rate of Teacher</label>
															<div>
																<input type="text" value="<?php echo $STrate; ?>" class="form-control" name="prate" id="prate">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Regular Course*</label>
															<div>
																<select required class="form-control" name="pdept"  id="pdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM dept WHERE type_id = 1 ORDER BY dept_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['dept_id'];?>" <?php if ($row['dept_id'] == $department) { echo 'selected';} ?>><?php echo $row['department'];?> </option>
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
															<label>Teacher*</label>
															<div>
																<select required class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and schedule_status = 1 and training = 1 ORDER BY teacher_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>" <?php if ($row['teacher_id'] == $teacher) { echo 'selected';} ?>><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Additional Course*</label>
															<div>
																<select required class="form-control" name="aapdept"  id="aapdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM dept WHERE type_id = 3 ORDER BY dept_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['dept_id'];?>" <?php if ($row['dept_id'] == $department) { echo 'selected';} ?>><?php echo $row['department'];?> </option>
                      <?php } ?>
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
															<label>Remarks for Parent</label>
															<div>
																<textarea class="form-control" name="remarkp" id="remarkp"><?php echo $prk; ?></textarea>
															</div>
														</div>
													</div>
												<div class="col-md-6">
														<div class="form-group">
															<label>Remarks for Teacher</label>
															<div>
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
															<label>Manager Name</label>
															<div>
																<select required class="form-control" name="pmanager"  id="pmanager" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE (cat_id = 5 or super_rights = 1) and active = 1 ORDER BY teacher_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>" <?php if ($row['teacher_id'] == $manid) { echo 'selected';} ?>><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
												<div class="col-md-6">
														<div class="form-group">
															<label>Status</label>
															<div>
																<select class="form-control" name="pstatus"  id="pstatus" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM status ORDER BY status_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['status_id'];?>" <?php if ($row['status_id'] == $stut) { echo 'selected';} ?>><?php echo $row['status_name'];?> </option>
                      <?php } ?>
               </select>															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Regular Date</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $rod; ?>" name="txtrod" id="txtrod">
															</div>
														</div>
													</div>
													<input type="hidden" class="form-control" value="<?php echo $Course_ID; ?>" name="ccid" id="ccid">
													<input type="hidden" class="form-control" value="<?php echo $ppt_id; ?>" name="link1" id="link1">
													<input type="hidden" value="<?php echo $_REQUEST['cur_id']; ?>" class="form-control" placeholder="Number of Classes" name="tcur" id="tcur">
												</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>	
                            <script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pgender.value = ("<?php echo 2; ?>");
	form.plan.value = ("<?php echo $lan; ?>");
	form.pdept.value = ("<?php echo $department; ?>");
	form.aapdept.value = ("<?php echo $adepartment; ?>");
	form.pteacher.value = ("<?php echo $teacher; ?>");
	form.pmanager.value = ("<?php echo $manid; ?>");
	form.pstatus.value = ("<?php echo $stut; ?>");
	form.txtnod.value = ("<?php echo $nod; ?>");
	//alert (form.pCityM.value);				
</script><!-- END FORM-->
							</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
