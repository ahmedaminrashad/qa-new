<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  ?>
<?php
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
function abc1($r, $mon, $yyy, $sss)
{
// sending query
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<span class="label label-sm label-warning">Nil</span>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<span class="label label-sm label-warning">Created</span>';
			}
	}
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
// sending query
$sql = "SELECT `test_results`.*, `course`.*, `dept`.`department`, `profile`.`teacher_name`, `timestart`.`time_s`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM `test_results`,`course`,`dept`,`profile`,`timestart`,`Gender`,`country`,`account`,`lan` WHERE test_results.course_id=course.course_id and test_results.dept_id=dept.dept_id and test_results.teacher_id=profile.teacher_id and test_results.test_time=timestart.time_s_id and test_results.g_id=Gender.g_id and test_results.c_id=country.c_id and test_results.parent_id=account.parent_id and test_results.lan_id=lan.lan_id ORDER BY test_time ASC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			if($row['status_id']=='1') 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}		
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
			$ssttuu = $row['status_id'];

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
								<td><a href="enter_test_results?test_id=<?php echo base64_encode($t_id); ?>" onclick="return confirm('<?php echo "Are you sure about test of student ". $course_yrSec. " ?"; ?>');">
															<?php if ($ssttuu == 1){ echo '<button type="button" class="btn green btn-xs"><i class="fa fa-graduation-cap"></i> Enter Results</button>';} ?></a><a href="student_results?course_id=<?php echo base64_encode($pcourse); ?>"><?php if ($ssttuu == 2){ echo '<button type="button" class="btn yellow btn-xs">See Test Results</button>';} ?></a></td>
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