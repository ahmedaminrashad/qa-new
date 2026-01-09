<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  ?>
<?php
$sy22 = date('Y-m-d');
?>
<?php
$page_title = 'Teacher Test Status';
$page_subtitle = 'Teacher Test Status';
$table_name = 'Teacher Test Status';
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
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 Test Time
								</th>
								<th>
									 Test Date
								</th>
								<th>
									 Name
								</th>
								<th>
									 Parent
								</th>
								<th>
									 Country
								</th>
								<th>
									 Language
								</th>
								<th>
									 Gender
								</th>
								<th>
									 Course
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 History
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
$tech =$_REQUEST['teacherday_id'];
$sql = "SELECT `test_results`.*, `course`.*, `dept`.`department`, `profile`.`teacher_name`, `timestart`.`time_s`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM `test_results`,`course`,`dept`,`profile`,`timestart`,`Gender`,`country`,`account`,`lan` WHERE test_results.course_id=course.course_id and test_results.dept_id=dept.dept_id and test_results.teacher_id=profile.teacher_id and test_results.test_time=timestart.time_s_id and test_results.g_id=Gender.g_id and test_results.c_id=country.c_id and test_results.parent_id=account.parent_id and test_results.lan_id=lan.lan_id HAVING status_id = '1' and teacher_id = '$tech' ORDER BY test_date ASC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$t_id = $row['test_id'];
			$test_d = $row['test_date'];
			$test_t = $row['time_s'];
			$s_name = $row['course_yrSec'];
			$dept = $row['department'];
			$gen = $row['gender'];
			$teacher = $row['teacher_name'];
			$parent = $row['parent_name'];
			$lan = $row['lan_name'];
			$pcourse = $row['course_id'];
			$pid = $row['parent_id'];
			$con = $row['c_name'];
			$dep = $row['dept_id'];

			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $test_t; ?>
								</td>
								<td>
									 <?php echo $test_d; ?>
								</td>
								<td>
									 <a href="student-schedule?pT=<?php echo base64_encode($pcourse); ?>"><?php echo $s_name; ?></a>

								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $parent; ?>
								</td>
								<td>
									 <?php echo $con; ?>
								</td>
								<td>
									 <?php echo $lan; ?>
								</td>
								<td>
									 <?php echo $gen; ?>
								</td>
								<td>
									 <?php echo $dept; ?>
								</td>
								<td>
									 <?php echo $teacher; ?>
								</td>
								<td>
									 <a href="a_list<?php echo $dep; ?>.php?Course_ID=<?php echo base64_encode($pcourse); ?>">History</a>
								</td>
								<td><a href="delete-test?pT=<?php echo $t_id; ?>" onclick="return confirm('<?php echo "Are you sure about deletion of test of ". $s_name. " ?"; ?>');">
															<button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a></td>
								<td><a href="refuse-test?pT=<?php echo $t_id; ?>" onclick="return confirm('<?php echo "Are you sure about refuse test of ". $s_name. " ?"; ?>');">
															<button type="button" class="btn red btn-xs"><i class="fa fa-remove"></i></button></a></td>
								<td><a href="enter_test_results?test_id=<?php echo base64_encode($t_id); ?>" onclick="return confirm('<?php echo "Are you sure about test of student ". $course_yrSec. " ?"; ?>');">
															<button type="button" class="btn green btn-xs"><i class="fa fa-graduation-cap"></i> Enter Results</button></a></td>
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
<script language="javascript" >
	var form1 = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form1.teacherday_id.value = ("<?php echo $tech; ?>");
	//alert (form.pCityM.value);				
</script>