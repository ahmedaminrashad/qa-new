<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  $g =$_REQUEST['par_id'];
$cv =$_REQUEST['con_id'];
$mang =$_REQUEST['man_id'];
$trial =$_REQUEST['trial_id'];
$tz11 =$_REQUEST['time_id'];
$tz_name =$_REQUEST['time_name'];
$tz_dif =$_REQUEST['time_dif'];
$tz_php =$_REQUEST['time_php'];
$csr_id =$_REQUEST['csr_id'];
$sql = "SELECT `account`.*, `currency`.`currency_name`, `country`.`c_a`, `time_zone`.* FROM `account`,`currency`, `country`, `time_zone` where account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING parent_id = '$g'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pname = $row['parent_name'];
			$puskype = $row['skype'];
			$pdate = $row['date'];
			}
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
			$nod = $_POST['prate'];
			$fee = 0;
			$teacher = $_POST['pteacher'];
			$trialp = $_POST['remarkp'];
			$trialt = $_POST['remarkt'];
			$p_id = $_POST['txtidp'];
			$strial = $_POST['trialp1'];
			$pmanp = $_POST['manp'];
			$tzp = $_POST['ptimez'];
			$tzdif = $_POST['ptimedif'];
			$tzname = $_POST['ptimename'];
			$tdate = $_POST['pdate'];
			$tzphp = $_POST['ptimephp'];
			$pcsr = $_POST['tcsr'];
			//$pcur = $_POST['tcur'];
			$abc = base64_encode($p_id);

			$sql = "INSERT INTO course(course_yrSec, dept_id, Skype_ID, Age, g_id, c_id, rate, Fee, Teacher, Trial_Class, remark_teacher, parent_id, m_id, active, tz_id, timezone, time_name,date,php_tz, lan_id, adept_id, csr_id)
					VALUES('$course','$department','$skype','$age','$gender','$con','$nod','$fee','$teacher','$trialp','$trialt','$p_id','$pmanp','$strial','$tzp','$tzdif','$tzname','$tdate','$tzphp','$langs','$aadepartment','$pcsr')";
 		if ($conn->query($sql) === TRUE) {
 		echo "<script>window.open('parent-accounts-profile?parent_id=".$abc."','_self')</script>";
 		}  
				}
   
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add New Student';
$page_subtitle = 'You are adding a student!';
$table_name = 'Add Student';
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="">
                                <input type="hidden" value="<?php echo $g; ?>" class="form-control" name="txtidp" id="txtidp">
																<input type="hidden" value="<?php echo $cv; ?>" class="form-control" placeholder="Enter Fee" name="txts0" id="txts0">
																<input type="hidden" value="<?php echo $mang; ?>" class="form-control" name="manp" id="manp">
																<input type="hidden" value="<?php echo $_REQUEST['trial_id']; ?>" class="form-contro" name="trialp1" id="trialp1">
																<input type="hidden" value="<?php echo $tz11; ?>" class="form-control" name="ptimez" id="ptimez">
																<input type="hidden" value="<?php echo $tz_name; ?>" class="form-control" name="ptimename" id="ptimename">
																<input type="hidden" value="<?php echo $tz_dif; ?>" class="form-control" name="ptimedif" id="ptimedif">
																<input type="hidden" value="<?php echo $tz_php; ?>" class="form-control" name="ptimephp" id="ptimephp">
																<input type="hidden" value="<?php echo $csr_id; ?>" class="form-control" name="tcsr" id="tcsr">
												<input type="hidden" value="<?php echo $_REQUEST['cur_id']; ?>" class="form-control" name="tcur" id="tcur">
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Student Name</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Add Full Name" name="txtcourse" id="txtcourse" maxlength="14" required>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Age</label>
                                    <div>
                                        <input type="number" class="form-control" placeholder="Add Age" name="txtage" id="txtage" required>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Skype/Zoom</label>
                                    <div>
                                        <input type="text" value="<?php echo $puskype; ?>" class="form-control" placeholder="Add Skype ID" name="txts" id="txts">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Gender</label>
                                    <div>
                                        <select required class="form-control" name="pgender"  id="pgender" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM gender ORDER BY g_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['g_id'];?>"><?php echo $row['gender'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Language</label>
                                    <div>
                                        <select required class="form-control" name="plan"  id="plan" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM lan ORDER BY lan_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['lan_id'];?>"><?php echo $row['lan_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Date</label>
                                    <div>
                                        <input type="text" value="<?php echo $sy; ?>" class="form-control" placeholder="dd-mm-yy" name="pdate" id="pdate">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Rate for Teacher</label>
                                    <div>
                                        <input type="text" value="" class="form-control" name="prate" id="prate" required>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Regular Course</label>
                                    <div>
                                        <select required class="form-control" name="pdept"  id="pdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM dept WHERE type_id = 1 ORDER BY dept_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Teacher</label>
                                    <div>
                                        <select required class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and schedule_status = 1 and training = 1 ORDER BY teacher_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Additional Course</label>
                                    <div>
                                        <select class="form-control" name="aapdept"  id="aapdept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM dept WHERE type_id = 3 ORDER BY dept_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Remarks for Parent</label>
                                    <div>
                                        <textarea required class="form-control" placeholder="Enter Remarks for Parent" name="remarkp" id="remarkp"></textarea>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Remarks for Teacher</label>
                                    <div>
                                        <textarea required class="form-control" placeholder="Enter Remarks for Teacher" name="remarkt" id="remarkt"></textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Add Students</button>
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