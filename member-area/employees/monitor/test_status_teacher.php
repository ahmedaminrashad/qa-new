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
  ?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy22 = date('Y-m-d');
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
<div class="top-menu">
				<ul class="nav navbar-nav pull-left">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
               <li class="dropdown" id="header_notification_bar">
					<form action="test_status_teacher" method="GET"><label>
															Teacher Filter</label>
															<select class="form-control" name="teacherday_id"  id="teacherday_id" onchange="this.form.submit()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id ");			  	
				do {  ?>
  <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>		</form>			</li>
               <li class="dropdown" id="header_notification_bar">
					<form action="test_status_time" method="GET"><label>
															Test Time</label>
															<select class="form-control" name="time_id"  id="time_id" onchange="this.form.submit()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>		</form>			</li>
					<!-- END NOTIFICATION DROPDOWN -->
					</ul>
						</div>
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
$tech =$_REQUEST['teacherday_id'];
$result = mysql_query("SELECT `test_results`.*, `course`.*, `dept`.`department`, `profile`.`teacher_name`, `timestart`.`time_s`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM `test_results`,`course`,`dept`,`profile`,`timestart`,`Gender`,`country`,`account`,`lan` WHERE test_results.course_id=course.course_id and test_results.dept_id=dept.dept_id and test_results.teacher_id=profile.teacher_id and test_results.test_time=timestart.time_s_id and test_results.g_id=Gender.g_id and test_results.c_id=country.c_id and test_results.parent_id=account.parent_id and test_results.lan_id=lan.lan_id HAVING status_id = '1' and teacher_id = '$tech' ORDER BY test_date ASC;");
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
								<td><a href="delete-test?pT=<?php echo $t_id; ?>" onclick="return confirm('<?php echo "Are you sure about deletion of test of ". $s_name. " ?"; ?>');">
															<button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a></td>
								<td><a href="refuse-test?pT=<?php echo $t_id; ?>" onclick="return confirm('<?php echo "Are you sure about refuse test of ". $s_name. " ?"; ?>');">
															<button type="button" class="btn red btn-xs"><i class="fa fa-remove"></i></button></a></td>
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
<script language="javascript" >
	var form1 = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form1.teacherday_id.value = ("<?php echo $tech; ?>");
	//alert (form.pCityM.value);				
</script>