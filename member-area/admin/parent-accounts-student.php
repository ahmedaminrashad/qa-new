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
   include("../includes/session1.php");
   include("header.php");
  require ("../includes/dbconnection.php");
  $pid =base64_decode($_GET["p_id"]);

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
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Parent Account<small> Students</small></h1>

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
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List of Students of <?php 
$g =$_REQUEST['par_id'];
$result1 = mysql_query("SELECT * FROM account HAVING parent_id = $pid");	
$pname = MYSQL_RESULT($result1,$i,"parent_name");
echo $pname;	
?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM course WHERE parent_id = $pid and nature = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Active Students: $numberOfRows"; ?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 No.
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
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id and nature = 1 HAVING parent_id = $pid");
$counter = 0;
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
			$status = MYSQL_RESULT($result,$i,"Status");
			$nod = MYSQL_RESULT($result,$i,"Number_of_Days");
			$fee = MYSQL_RESULT($result,$i,"Fee");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$trial = MYSQL_RESULT($result,$i,"Trial_Class");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$ptea = MYSQL_RESULT($result,$i,"Teacher");
			$pdt = MYSQL_RESULT($result,$i,"dept_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
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
									 <?php echo $plan; ?>
								</td>

								<td>
									 <?php echo $gender; ?>
								</td>
								<td>
									 <?php echo $cour; ?>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $ptea; ?>"><?php echo $teacher; ?></a>
								</td>
								<td>
								<button type="button" class="btn yellow btn-xs"><?php echo $nod; ?></button>
								</td>
								<td><a href="edit-student-account?Course_ID=<?php echo $Course_ID; ?>"><button type="button" class="btn green btn-xs"><i class="fa fa-edit"></i></button></a></td>								
								<td><a href="student_inactive1?t_id1=<?php echo $Course_ID; ?>" onclick="return confirm('<?php echo "Are you sure about deactivation of Student ". $course_yrSec. " ?"; ?>');">
															<button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a></td>
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
						<h4><?php 
$result = mysql_query("SELECT * FROM course WHERE parent_id = $pid and nature = 2");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of In-active Students: $numberOfRows"; ?></h4>

						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 No.
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
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id and nature = 2 HAVING parent_id = $pid");
$counter = 0;
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
			$status = MYSQL_RESULT($result,$i,"Status");
			$nod = MYSQL_RESULT($result,$i,"Number_of_Days");
			$fee = MYSQL_RESULT($result,$i,"Fee");
			$trial = MYSQL_RESULT($result,$i,"Trial_Class");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$ptea = MYSQL_RESULT($result,$i,"Teacher");
			$pdt = MYSQL_RESULT($result,$i,"dept_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$teacher_id = MYSQL_RESULT($result,$i,"Teacher");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$plan = MYSQL_RESULT($result,$i,"lan_name");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>

								</td>
								<td>
									 <a href="student-show-a.php?Course_ID=<?php echo base64_encode($Course_ID); ?>"><?php echo $pn; ?>
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
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
								</td>
								<td>
									 In-Active
								</td>
								<td><a href="student_inactive2?t_id1=<?php echo $Course_ID; ?>" class="btn btn-icon-only blue" onclick="return confirm('<?php echo "Are you sure about activation of Teacher ". $tname. " ?"; ?>');">
															<i class="fa fa-user"></i></a></td>
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