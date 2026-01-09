<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
   function report($s)
{require ("../includes/dbconnection.php");
    date_default_timezone_set($TimeZoneCustome);
$m = date('m');
$y = date('Y');
// sending query
   $sql = "SELECT * FROM reports Where MONTH(date) = $m AND YEAR(date) = $y AND course_id = $s";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<button type="button" class="mb-2 mr-2 btn btn-danger">Add Report</button>';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '';
			}
	}
	function report2($s)
{require ("../includes/dbconnection.php");
    date_default_timezone_set($TimeZoneCustome);
$m = date('m');
$y = date('Y');
// sending query
   $sql = "SELECT * FROM reports Where MONTH(date) = $m AND YEAR(date) = $y AND course_id = $s";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			echo '<button type="button" class="mb-2 mr-2 btn btn-warning">Created</button>';
			}
	}
	function abc1($r, $mon, $yyy)
{require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where course_id = $r and m_id = $mon and y_id = $yyy";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<button type="button" class="mb-2 mr-2 btn btn-danger">Create</button>';
			}
		else if ($numberOfRows > 0) 
			{
			echo '';
			}
	}
	
	function abc2($r, $mon, $yyy)
{require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where course_id = $r and m_id = $mon and y_id = $yyy";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$test_st = $row['status_id'];
			if ($test_st == 1){
			echo '<div class="ml-auto badge badge-warning">Awaiting</div>';
			}
			elseif ($test_st == 2){
			echo '<div class="ml-auto badge badge-success">Taken</div>';
			}
			}
			}
	}
	
	function abc($er)
{require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM sched Where course_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
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
$page_title = 'List of Students';
$page_subtitle = 'List of Students';
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
									 Age
								</th>
								<th>
									 Course
								</th>
								<th>
								</th>
								<th>
								</th>
								<th>
								</th>
								<th>
								</th>
								<th>
									 
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
require ("../includes/dbconnection.php");
$tt = $ID;
$sql = "SELECT `course`.*, `dept`.`department`, `gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM `course`,`dept`,`gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING Teacher = $tt";
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
			$cdept = $row['dept_id'];
			$status = $row['Status'];
			$nod = $row['Number_of_Days'];
			$fee = $row['Fee'];
			$teacher = $row['teacher_name'];
			$trial = $row['Trial_Class'];
			$pCourse = $row['course_id'];
			$ptea = $row['Teacher'];
			$pdt = $row['dept_id'];
			$dept_id = $row['dept_id'];
			$adept_id = $row['adept_id'];
			$teacher_id = $row['Teacher'];
			$pn = $row['parent_name'];
			$plan = $row['lan_name'];
			$ppid = $row['parent_id'];
?>
								<tr>
								<td>
									 <?php echo $course_yrSec; ?>
								</td>
								<td>
									 <?php echo $pn; ?>
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
									 <?php echo $age; ?>
								</td>
								<td>
									 <a href="change-student-course?student_id=<?php echo base64_encode($Course_ID); ?>&d_id=<?php echo base64_encode($dept_id); ?>&ad_id=<?php echo base64_encode($adept_id); ?>&name=<?php echo base64_encode($course_yrSec); ?>"><?php echo $cour; ?></a>
								</td>
								<td>
									<a href="student_results?Course_ID=<?php echo base64_encode($Course_ID); ?>&name=<?php echo base64_encode($course_yrSec); ?>"><button type="button" title="Test Results" class="mb-2 mr-2 btn btn-info"><i class="pe-7s-note2"></i></button></a>
								</td>
								<td>
									<a href="comment-timeline-teacher?studentid=<?php echo $Course_ID; ?>"><button type="button" title="Note History" class="mb-2 mr-2 btn btn-info"><i class="pe-7s-chat"></i></button></a>
								</td>
								<td>
									<a href="list-of-reports?course=<?php echo $Course_ID; ?>"><button type="button" title="All Reports" class="mb-2 mr-2 btn btn-info"><i class="pe-7s-notebook"></i></button></a>
								</td>
								<td>
									 <a href="add-note?sid=<?php echo $Course_ID; ?>&sname=<?php echo $course_yrSec; ?>&tid=<?php echo $ptea; ?>&tname=<?php echo $teacher; ?>&pid=<?php echo $ppid; ?>"><button type="button" class="mb-2 mr-2 btn btn-success">Add Note</button></a>
								</td>
								<td>
									 <a href="submit-report?sid=<?php echo $Course_ID; ?>&sname=<?php echo $course_yrSec; ?>&tid=<?php echo $ptea; ?>&dept=<?php echo $pdt; ?>"><?php echo report("$Course_ID"); ?></a><?php echo report2("$Course_ID"); ?>
								</td>
								<td>
									 <?php abc2("$Course_ID","$m","$y"); ?><a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo base64_encode($Course_ID); ?>"><?php abc1("$Course_ID","$m","$y"); ?></a></td>
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

<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"allocate-test.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>