<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$link = $_SERVER['REQUEST_URI'];
function abc($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM sched Where course_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		else if ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}
?>
<?php
function abc1($r, $mon, $yyy)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where course_id = $r and m_id = $mon and y_id = $yyy";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-warning">Nil</div>';
			}
		else if ($numberOfRows > 0) 
			{
			echo '<div class="ml-auto badge badge-info">Created</div>';
			}
	}
function abc2($r, $mon, $yyy)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where course_id = $r and m_id = $mon and y_id = $yyy and status_id = 2";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}
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
     elseif($sy == "2021") 
        {
            $y = 8;
        }
     elseif($sy == "2022") 
        {
            $y = 9;
        }
     elseif($sy == "2023") 
        {
            $y = 10;
        }
     elseif($sy == "2024") 
        {
            $y = 11;
        }
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$page_title = 'List of Active Students';
$page_subtitle = 'Active Students';
$table_name = 'Active Students';
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
                                <div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                <a href="list-of-active-students"><button class="mb-2 mr-2 btn btn-shadow btn-success">
                                        Active Students (No. <?php
$sql = "SELECT * FROM course WHERE nature = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows; ?>)
                                    </button></a>
                                    <a href="list-of-inactive-students"><button class="mb-2 mr-2 btn btn-shadow btn-danger">
                                        Deactivated Students (No. <?php $sql = "SELECT * FROM course WHERE nature = 2";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{

echo $numberOfRows;
} ?>)
                                    </button></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php echo $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                            <thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Student Name
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
									 History
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Test
								</th>
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT `course`.*, `dept`.`department`, `gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id and nature = 1 ORDER BY course_id ASC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$Course_ID = $row['course_id'];
			$course_yrSec = $row['course_yrSec'];
			$doj = $row['Date_Of_Joining'];
			$skype = $row['Skype_ID'];
			$con = $row['c_name'];
			$age = $row['Age'];
			$gender = $row['gender'];
			$cour = $row['department'];
			$status = $row['Status'];
			$nod = $row['Number_of_Days'];
			$fee = $row['Fee'];
			$teacher = $row['teacher_name'];
			$trial = $row['Trial_Class'];
			$pCourse = $row['course_id'];
			$ptea = $row['Teacher'];
			$pdt = $row['dept_id'];
			$dept_id = $row['dept_id'];
			$teacher_id = $row['Teacher'];
			$pn = $row['parent_name'];
			$plan = $row['lan_name'];
			$ptime = $row['timezone'];
			$ppid = $row['parent_id'];
			$gppid = $row['g_id'];

?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($ppid); ?>"><?php echo $pn; ?></a>
								</td>
								<td>
									 <?php echo $con; ?>
								</td>
								<td>
									 <div class="badge badge-success"><?php echo $plan; ?></div>
								</td>

								<td>
									 <?php if ($gppid == 1){ echo '<div class="badge badge-info">Male</div>'; } else { echo '<div class="badge badge-danger">Female</div>'; } ?>
								</td>
								<td>
									 <?php echo $cour; ?>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>"><button class="mb-2 mr-2 btn btn-success">History</button></a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $ptea; ?>"><?php echo $teacher; ?></a>
								</td>
								<td>
								<a href="student_results?Course_ID=<?php echo base64_encode($Course_ID); ?>&link=<?php echo 'parent-accounts-profile?parent_id='.base64_encode($ppid).''; ?>&name=<?php echo base64_encode($pn); ?>"><?php abc1("$Course_ID","$m","$y"); ?><?php abc2("$Course_ID","$m","$y"); ?></a>
								</td>
								<td>
								    <a href="list-of-reports?course=<?php echo $Course_ID; ?>"><button class="mb-2 mr-2 btn btn-info">Reports</button></a>
								</td>
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