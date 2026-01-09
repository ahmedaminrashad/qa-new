<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
$date = date('h:i a', time());
$syw = date('Y');
?>
<?php
  $p =$_REQUEST['pdept'];
  $ttn = $_SESSION['is']['parent'];
  $tem = $_SESSION['is']['email_id'];
  $sql = "SELECT * FROM `course`,`profile`,`account` WHERE course.Teacher=profile.teacher_id AND course.parent_id=account.parent_id HAVING course_id='$p'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$tn = $row['teacher_name'];
					$tid = $row['Teacher'];	
					$sn = $row['course_yrSec'];
					$pn = $row['parent_name'];		
			}
			}
   if (isset($_POST['cmdSubmit1'])) 
  	{ 		
  	require ("../includes/dbconnection.php");
		 	$tp= $_POST['pteacher'];
		 	$tname= $_POST['pteacher0'];
			$pemail= $_POST['pemail'];
			$pnam= $_POST['pname'];
			$msg= $_POST['S1'];
			$time= $_POST['time'];
			$date= $_POST['date'];
			$sname= $_POST['psn'];
			$sid= $_POST['ppp'];
			$paname= $_POST['pname1'];
		
			$sql = "INSERT INTO complaint(teacher_id, parent_id, issue, teacher_name, student_name, student_id, date1, time, parent_name, type)
					VALUES('$tp','$pnam','" . mysqli_real_escape_string($conn, $msg) . "', '$tname', '$sname', '$sid', '$date', '$time', '$paname', '1')";
					if ($conn->query($sql) === TRUE) { 
 		echo "<script>window.open('complaint-pending','_self')</script>";
			 	}
				}
?>
<?php
$page_title = 'Register a Complaint';
$page_subtitle = 'Register a Complaint';
$table_name = 'Register a Complaint';
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
										<input type="hidden" name="pteacher0" size="20" value="<?php echo $tn; ?>">
										<input type="hidden" name="pteacher" size="20" value="<?php echo $tid; ?>">
										<input type="hidden" name="pstudent" size="20" value="<?php echo $sn; ?>">
										<input type="hidden" name="pname" size="20" value="<?php echo $_SESSION['is']['parent_id']; ?>">
										<input type="hidden" name="date" size="20" value="<?php echo $sy; ?>">
										<input type="hidden" name="time" size="20" value="<?php echo $date; ?>">
										<input type="hidden" name="ppp" size="20" value="<?php echo $p; ?>">
										<input type="hidden" name="pname1" size="20" value="<?php echo $pn; ?>">
										<div class="form-group">
													<label>Teacher Name</label>
															<div>
															<input type="text" name="tname" id="tname" class="form-control" value="<?php echo $tn; ?>" readonly>
															</div>
												</div>
										<div class="form-group">
													<label>Student Name</label>
													<div>
														<input type="text" name="psn" id="psn" class="form-control" value="<?php echo $sn; ?>" readonly>
													</div>
												</div>
										<div class="form-group">
													<label>Your Email*</label>
													<div>
														<input type="email" name="pemail" id="pemail" class="form-control" value="<?php echo $tem; ?>" required>
													</div>
												</div>
										<div class="form-group">
													<label>Complaint*</label>
													<div>
														<textarea class="form-control" placeholder="Enter your complaint" name="S1" id="S1" required style="height: 73px; width: 375px"></textarea>													</div>
												</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit1" value="Sign up">Submit</button>
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