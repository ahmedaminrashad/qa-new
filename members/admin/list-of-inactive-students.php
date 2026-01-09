<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
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
$page_title = 'In-Active Students';
$page_subtitle = 'List of In-Active Students';
$table_name = 'In-Active Students';
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
                                <div class="card-body"><h5 class="card-title">In-Active Students</h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
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
									 &nbsp;
								</th>
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT `course`.*, `dept`.`department`, `gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`gender`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=gender.g_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id and nature = 2 ORDER BY course_id ASC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
elseif ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_array($result))
		{		
		
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
?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>

								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($ppid); ?>"><?php echo $pn; ?>
								</td>
								<td>
									 <?php echo $con; ?>
								</td>
								<td>
									 <?php echo $plan; ?>
								</td>

								<td>
									 <?php echo $gender; ?>
								</td>
								<td>
									 <?php echo $cour; ?>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>"><button class="mb-2 mr-2 btn btn-outline-success">Daily Progress</button></a>
								</td>
								<td><a href="student-delete?Course_ID=<?php echo $Course_ID; ?>" onclick="return confirm('<?php echo "Are you sure about deletion of student ". $course_yrSec. " ?"; ?>');">
															<button class="mb-2 mr-2 btn btn-outline-danger"><i class="fa fa-bomb"></i></button></a></td>
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