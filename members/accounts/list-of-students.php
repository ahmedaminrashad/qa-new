<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
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
$page_title = 'List of Students';
$page_subtitle = 'List of Students In your account';
$table_name = 'List of Students';
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
									 #
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Course
								</th>
								<th>
									 Class History
								</th>
								<th>
									 Progress
								</th>
								<th>
									 Schedule
								</th>
								<th>
									 Status
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 

                    $tt = $_SESSION['is']['parent_id'];

// sending query

$sql = "SELECT `course`.*, `dept`.`department`, `gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name` FROM `course`,`dept`,`gender`,`profile`,`country` WHERE course.dept_id=dept.dept_id and course.g_id=gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and parent_id = $tt ";
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
			$dept = $row['dept_id'];
			$stau = $row['active'];
?>							
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <?php echo $course_yrSec; ?>
								</td>
								<td>
									 <a href='course-material-lesson?c_id=<?php echo $dept; ?>'><?php echo $cour; ?></a>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>"><button class="mb-2 mr-2 btn btn-info">History</button></a>
								</td>
								<td>
									 <a href="list-of-reports?course=<?php echo $Course_ID; ?>"><button class="mb-2 mr-2 btn btn-warning">See Reports</button></a>
								</td>
								<td>
									 <a href="student-schedule?pT=<?php echo base64_encode($Course_ID); ?>"><button class="mb-2 mr-2 btn btn-danger">Schedule</button></a>
								</td>
								<td><?php if ($stau == 11){ echo '<div class="ml-auto badge badge-warning">On Trial</div>'; } elseif ($stau == 17){ echo '<div class="ml-auto badge badge-danger">Suspended</div>'; } else { echo '<div class="ml-auto badge badge-success">Regular</div>'; } ?>
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