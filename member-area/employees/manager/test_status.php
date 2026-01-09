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
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");
  ?>
<?php
date_default_timezone_set("Asia/Karachi");
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
date_default_timezone_set("Asia/Karachi");
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
			echo '<span class="label label-sm label-warning">Nil</span>';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '<span class="label label-sm label-warning">Created</span>';
			}
	}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy22 = date('Y-m-d');
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
				<h1>Test<small> Schedule</small></h1>

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
				<li class="active">
					 List of Created Test
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">

															<a href="test_all" class="btn yellow"><i class="fa fa-fax"></i> All Scheduled Test <b>(No. <?php 
$result = mysql_query("SELECT * FROM test_results WHERE m_id = $m and y_id = $y");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="test_today" class="btn red"><i class="fa fa-fax"></i> Scheduled Test Today<b>(No. <?php 
$result = mysql_query("SELECT * FROM test_results WHERE test_date = '$sy22'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="test_status" class="btn blue"><i class="fa fa-child"></i> Test Active <b>(No. <?php 
$result = mysql_query("SELECT * FROM test_results WHERE m_id = $m and y_id = $y and status_id = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="test_taken" class="btn green"><i class="fa fa-graduation-cap"></i> Test Taken <b>(No. <?php 
$result = mysql_query("SELECT * FROM test_results WHERE m_id = $m and y_id = $y and status_id = 2");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
						</div>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
								<?php 
// sending query
$result = mysql_query("SELECT `test_results`.*, `course`.*, `dept`.`department`, `profile`.`teacher_name`, `timestart`.`time_s`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`test_results`,`course`,`dept`,`profile`,`timestart`,`Gender`,`country`,`account`,`lan` WHERE test_results.course_id=course.course_id and test_results.dept_id=dept.dept_id and test_results.teacher_id=profile.teacher_id and test_results.test_time=timestart.time_s_id and test_results.g_id=Gender.g_id and test_results.c_id=country.c_id and test_results.parent_id=account.parent_id and test_results.lan_id=lan.lan_id and status_id = '1' ORDER BY test_date ASC;");
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
			$t_id = MYSQL_RESULT($result,$i,"test_id");
			$test_d = MYSQL_RESULT($result,$i,"test_date");
			$test_t = MYSQL_RESULT($result,$i,"time_s");
			$s_name = MYSQL_RESULT($result,$i,"course_yrSec");
			$dept = MYSQL_RESULT($result,$i,"department");
			$gen = MYSQL_RESULT($result,$i,"gender");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$parent = MYSQL_RESULT($result,$i,"parent_name");
			$lan = MYSQL_RESULT($result,$i,"lan_name");
			$pcourse = MYSQL_RESULT($result,$i,"course_id");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$con = MYSQL_RESULT($result,$i,"c_name");
			$dep = MYSQL_RESULT($result,$i,"dept_id");

			?>
							</tr>
								</thead>
								<tbody>
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
															<button type="button" class="btn green btn-xs"><i class="fa fa-graduation-cap"></i> Enter Results</button></a></td>
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
						</div>
						</div>
						</div>

			<!-- END PAGE CONTENT INNER -->
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>