<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
?>
<?php

    if (isset($_POST['cmdSubmit'])) 
  	{ 	require ("../includes/dbconnection.php");	
		 	$as_id= $_POST['student_id'];
			$at_id= $_POST['teacher_id'];
			$am_id= $_POST['month_id'];
			$ay_id= $_POST['year_id'];
			$adat= $_POST['date'];
			$atim= $_POST['time'];
			$adis= $_POST['discription'];
			$ad_id= $_POST['dept_id'];
			$ag_id= $_POST['g_id'];
			$al_id= $_POST['lan_id'];
			$ac_id= $_POST['c_id'];
			$apr_id= $_POST['pr_id'];
			$app_id= $_POST['parent_id'];
			$aman_id= $_POST['man_id'];
			$atn= $_POST['timename'];
			$apn= $_POST['tzphp'];	
			$sst= $_POST['stut'];
			$sql = "INSERT INTO test_results (course_id, teacher_id, m_id, y_id, test_date, test_time, test_discription, parent_id, dept_id, c_id, g_id, lan_id, tremark, time_name, phptime, man_id, test_status, makharij, noon_sakin, meem_sakin, qulqala, guuna, madda)
					VALUES('$as_id', '$at_id', '$am_id', '$ay_id', '$adat', '$atim', '" . mysqli_real_escape_string($conn, $adis) . "', '$app_id', '2', '$ac_id', '$ag_id', '$al_id', '$apr_id', '$atn', '$apn', '$aman_id', '$sst', '1', '1', '1', '1', '1', '1')"; 
					 if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: teacher-student-list");
			 	}
				}
?>
<?php
date_default_timezone_set($_SESSION['is']['teacher_time']);
$mon = date('F');
if($mon== "January") 
        {
            $m = 1;
        }
    elseif($mon== "February")
        {
            $m = 2;
        } 
    elseif($mon== "March") 
        {
            $m = 3;
        } 
    elseif($mon== "April")
        {
            $m = 4;
        } 
    elseif($mon== "May")
        {
            $m = 5;
        } 
    elseif($mon== "June") 
        {
            $m = 6;
        } 
    elseif($mon== "July")
        {
            $m = 7;
        } 
    elseif($mon== "August") 
        {
            $m = 8;
        } 
    elseif($mon== "September")
        {
            $m = 9;
        } 
    elseif($mon== "October")
        {
            $m = 10;
        } 
    elseif($mon== "November") 
        {
            $m = 11;
        }
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $m = 12;
        }
?>
<?php
date_default_timezone_set($_SESSION['is']['teacher_time']);
$sy = date('Y');
if($sy == "2014") 
        {
            $y = 1;
        }
    elseif($sy == "2015")
        {
           $y = 2;
        } 
    elseif($sy == "2016") 
        {
            $y = 3;
        }
    elseif($sy == "2017") 
        {
            $y = 4;
        }
    elseif($sy == "2018") 
        {
            $y = 5;
        }
    elseif($sy == "2019") 
        {
            $y = 6;
        }
    elseif($sy == "2020") 
        {
            $y = 7;
        }
?>
<?php
date_default_timezone_set($_SESSION['is']['teacher_time']);
$t_date = date('Y-m-d');
?>
<?php
$page_title = 'Add Test';
$page_subtitle = 'Add Test';
$table_name = 'Add Test';
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5><?php
										$st_id =base64_decode($_GET['st_id']);
$sql = "SELECT * FROM course WHERE course_id = $st_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pcourse = $row['course_id'];
			$pcoursennn = $row['course_yrSec'];
			$pdept = $row['dept_id'];
			$pgender = $row['g_id'];
			$plan = $row['lan_id'];
			$pcon = $row['c_id'];
			$ptech = $row['Teacher'];
			$premark = $row['remark_teacher'];
			$pparent = $row['parent_id'];
			$pman = $row['m_id'];
			$ptime = $row['time_name'];
			$pphp = $row['php_tz'];
}
}
?>
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
										<div class="form-group">
															<label>Student Name:</label>
															<div>
															<label class="control-label">
															<?php echo $pcoursennn; ?></label>
															
															</div>
												</div>
										<div class="form-group">
															<label>Test Month:</label>
															<div>
															<label class="control-label">
															<?php echo $mon; ?>-<?php echo $sy; ?></label>
															</div>
												</div>
												<div class="form-group">
													<label>Test Time*</label>
													<div>
														<select required class="form-control" name="time"  id="time" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM timestart ORDER BY time_s_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
                    <?php } ?>
                  </select>
													</div>
												</div>
												<div class="form-group">
													<label>Reading Details*</label>
													<div>
														<textarea required class="form-control" name="discription" id="discription"></textarea>													
													</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $t_date; ?>" name="date" id="date">
												<input type="hidden" class="form-control" value="<?php echo $pcourse; ?>" name="student_id" id="student_id">
												<input type="hidden" class="form-control" value="<?php echo $ptech; ?>" name="teacher_id" id="teacher_id">
												<input type="hidden" class="form-control" value="<?php echo $m; ?>" name="month_id" id="month_id">
												<input type="hidden" class="form-control" value="<?php echo $y; ?>" name="year_id" id="year_id">
												<input type="hidden" class="form-control" value="<?php echo $pdept; ?>" name="dept_id" id="dept_id">
												<input type="hidden" class="form-control" value="<?php echo $pgender; ?>" name="g_id" id="g_id">
												<input type="hidden" class="form-control" value="<?php echo $plan; ?>" name="lan_id" id="lan_id">
												<input type="hidden" class="form-control" value="<?php echo $pcon; ?>" name="c_id" id="c_id">
												<input type="hidden" class="form-control" value="<?php echo $premark; ?>" name="pr_id" id="pr_id">
												<input type="hidden" class="form-control" value="<?php echo $pparent; ?>" name="parent_id" id="parent_id">
												<input type="hidden" class="form-control" value="<?php echo $pman; ?>" name="man_id" id="man_id">
												<input type="hidden" class="form-control" value="<?php echo $ptime; ?>" name="timename" id="timename">
												<input type="hidden" class="form-control" value="<?php echo $pphp; ?>" name="tzphp" id="tzphp">
												<input type="hidden" class="form-control" value="1" name="stut" id="stut">
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