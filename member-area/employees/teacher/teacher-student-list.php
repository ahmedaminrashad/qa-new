<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
<?php
  include("../includes/session.php");
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");   include("header.php");
	function abc1($r, $mon, $yyy)
{
// sending query
   $result = mysql_query("SELECT * FROM test_results Where course_id = $r and m_id = $mon and y_id = $yyy");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<button type="button" class="btn red btn-xs">Create</button>';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '';
			}
	}
	
	function abc2($r, $mon, $yyy)
{
// sending query
   $result = mysql_query("SELECT * FROM test_results Where course_id = $r and m_id = $mon and y_id = $yyy");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			$test_st = MYSQL_RESULT($result,$i,"status_id");
			if ($test_st == 1){
			echo '<span class="label label-sm label-warning">Awaiting</span>';
			}
			elseif ($test_st == 2){
			echo '<span class="label label-sm label-success">Taken</span>';
			}
			}
	}
	
	function abc($er)
{
// sending query
   $result = mysql_query("SELECT * FROM sched Where course_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
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
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Teacher<small> Student's List</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">

			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List of Students of <?php 
					 $tt = $_SESSION['is']['teacher_id'];
$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$tt'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$teacher = MYSQL_RESULT($result1,$i,"teacher_name");
				}			
		echo $teacher; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<?php 
// sending query
$result = mysql_query("SELECT * FROM trial WHERE mnt_id = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0)
				{
					echo "<div class='alert alert-info'>
						<p>
							 You have requests waiting for your <strong>responce...</strong>
						</p>
					</div>";
				}

?>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
					$tt = $_SESSION['is']['teacher_id'];
$result = mysql_query("SELECT * FROM course WHERE Teacher = $tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Students: $numberOfRows"; ?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
								<?php 
// sending query
$tt = $_SESSION['is']['teacher_id'];
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING Teacher = $tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}		
			$Course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course_yrSec = MYSQL_RESULT($result,$i,"course_yrSec");
			$doj = MYSQL_RESULT($result,$i,"Date_Of_Joining");
			$skype = MYSQL_RESULT($result,$i,"Skype_ID");
			$con = MYSQL_RESULT($result,$i,"c_name");
			$age = MYSQL_RESULT($result,$i,"Age");
			$gender = MYSQL_RESULT($result,$i,"gender");
			$cour = MYSQL_RESULT($result,$i,"department");
			$cdept = MYSQL_RESULT($result,$i,"dept_id");
			$status = MYSQL_RESULT($result,$i,"Status");
			$nod = MYSQL_RESULT($result,$i,"Number_of_Days");
			$fee = MYSQL_RESULT($result,$i,"Fee");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$trial = MYSQL_RESULT($result,$i,"Trial_Class");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$ptea = MYSQL_RESULT($result,$i,"Teacher");
			$pdt = MYSQL_RESULT($result,$i,"dept_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$adept_id = MYSQL_RESULT($result,$i,"adept_id");
			$teacher_id = MYSQL_RESULT($result,$i,"Teacher");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$plan = MYSQL_RESULT($result,$i,"lan_name");
			$ppid = MYSQL_RESULT($result,$i,"parent_id");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
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
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>"><button type="button" title="Lesson History" class="btn blue btn-xs"><i class="fa fa-graduation-cap"></i></button></a>
								</td>
								<td>
									<a href="student_results?Course_ID=<?php echo base64_encode($Course_ID); ?>&name=<?php echo base64_encode($course_yrSec); ?>"><button type="button" title="Test Results" class="btn blue btn-xs"><i class="fa fa-bar-chart-o"></i></button></a>
								</td>
								<td>
									<a href="comment-timeline-teacher?studentid=<?php echo $Course_ID; ?>"><button type="button" title="Note History" class="btn blue btn-xs"><i class="fa fa-comments"></i></button></a>
								</td>
								<td>
									 <a href="add-note?sid=<?php echo $Course_ID; ?>&sname=<?php echo $course_yrSec; ?>&tid=<?php echo $ptea; ?>&tname=<?php echo $teacher; ?>&pid=<?php echo $ppid; ?>"><button type="button" class="btn green btn-xs">Add Note</button></a>
								</td>
								<td>
									 <?php abc2("$Course_ID","$m","$y"); ?><a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo base64_encode($Course_ID); ?>"><?php abc1("$Course_ID","$m","$y"); ?></a></td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div>
						</div>
					</div>
					<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"allocate-test.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>