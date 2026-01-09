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
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");
  $mm_id =$_REQUEST['month_id'];
  $yy_id =$_REQUEST['year_id'];
  $pT =base64_decode($_GET['ptec']);
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
function schedule_classes($cr)
{
// sending query
   $result = mysql_query("SELECT * FROM sched Where course_id = $cr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			}
	}
function classes($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			}
	}
function ratio($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0%';
			}
		else if ($tnumberOfRows > 0) 
			{
	$result = mysql_query("SELECT * FROM sched Where course_id = $cr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0){
			echo 'N-A';
			}
		else if ($numberOfRows > 0) 
			{
			$total = $numberOfRows*4;
			$rate = $tnumberOfRows/$total;
			$figure = $rate*100;
			echo ''.mb_substr($figure, 0, 5).'%';
			}
			}

	}
function ratio1($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '#FFFFFF';
			}
		else if ($tnumberOfRows > 0) 
			{
	$result = mysql_query("SELECT * FROM sched Where course_id = $cr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0){
			echo '#FFFFFF';
			}
		else if ($numberOfRows > 0) 
			{
			$total = $numberOfRows*4;
			$rate = $tnumberOfRows/$total;
			$figure = $rate*100;
			if( $figure >= 25){echo '#BCF5A9';}
			}
			}

	}
  ?>
<?php
function test1($r, $mon, $yyy)
{
// sending query
   $result = mysql_query("SELECT * FROM test_results Where course_id = $r and MONTH(test_date) = $mon AND YEAR(test_date) = $yyy");
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
			echo '<span class="label label-sm label-info">Created</span>';
			}
	}
function test2($r, $mon, $yyy)
{
// sending query
   $result = mysql_query("SELECT * FROM test_results Where course_id = $r and MONTH(test_date) = $mon AND YEAR(test_date) = $yyy and status_id = 2");
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
			echo '<i class="fa fa-check font-green"></i>';
			}
	}
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
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="parent-accounts">List of Teachers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List of Students of <?php 
$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$pT'");
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
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM course WHERE Teacher = $pT");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Students: $numberOfRows"; ?></h4>
<a class="btn default" data-target="#full-width" data-toggle="modal">
									View Previous Month Class History <b>(<?php $monthName = date("F", mktime(0, 0, 0, $mm_id, 10)); echo $monthName; ?>-<?php echo date('Y'); ?>)</b></a>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
									 History
								</th>
								<th>
									 T-L-A-P
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `account`.`parent_name`, `country`.`c_name` FROM `course`,`account`,`country` WHERE course.parent_id=account.parent_id AND course.c_id=country.c_id HAVING Teacher = $pT");
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
			$Course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course_yrSec = MYSQL_RESULT($result,$i,"course_yrSec");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$cname = MYSQL_RESULT($result,$i,"c_name");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo ratio1("$Course_ID", "$pT", "$mm_id", "$yy_id", "9"); ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pn; ?>
								</td>
								<td>
									 <?php echo $cname; ?>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
								</td>
								<td>
									 <span class="label label-sm label-success" title="Taken Regular"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "9"); ?></span>-<span class="label label-sm label-info" title="Leave"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "5"); ?></span>-<span class="label label-sm label-danger" title="Absent"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "4"); ?></span>-<span class="label label-sm label-warning" title="Pending"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "7"); ?></span>-<span class="label label-sm label-success" title="Classes/Week"><?php echo schedule_classes($Course_ID); ?></span>
								</td>
								<td>
								<a href="student_results?Course_ID=<?php echo base64_encode($Course_ID); ?>&link=<?php echo 'parent-accounts-profile?parent_id='.base64_encode($ppid).''; ?>&name=<?php echo base64_encode($pn); ?>"><?php test1("$Course_ID","$mm_id","$yy_id"); ?><?php test2("$Course_ID","$mm_id","$yy_id"); ?></a>
								</td>
								<td><?php echo ratio("$Course_ID", "$pT", "$mm_id", "$yy_id", "9") ?></td>
								<td><a href="re-add-schedule-local?cou_id=<?php echo $Course_ID; ?>"><span class="label label-sm label-warning" title="Re-Schedule"><i class="fa fa-history"></i></span></a></td>
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
						<!-- full width -->
							<div id="full-width" class="modal container fade" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								</div>
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-chevron-right"></i>Search For Previous Month Records
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="teacher-student-list-search" method="GET" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section">Please Select Desired Month and Year</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Month</label>
															<div class="col-md-9">
																<select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM month ORDER BY month_id ");			  	
				do {  ?>
  <option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
																<span class="help-block">
																Please Select Month. </span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Year</label>
															<div class="col-md-9">
															<select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<span class="help-block">
																Please Select Year. </span>

<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />

															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
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