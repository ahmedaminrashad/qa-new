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
  require ("../includes/dbconnection.php");
  include("header.php");
$pdept =$_REQUEST['query'];
function lesson($er)
{
// sending query
   $result = mysql_query("SELECT * FROM lesson_pages Where lesson_id = $er");
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
			while ($i<$tnumberOfRows)
				{			
					$l_name = MYSQL_RESULT($result,$i,"lesson_name");
			  		echo $l_name;
	$i++;	 
			}
			}
	}
function email($var)
{
$result = mysql_query("SELECT * FROM account WHERE parent_id = '$var'");
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
				//$country_id = MYSQL_RESULT($result,$i,"c_id");
			$country_abb = MYSQL_RESULT($result,$i,"email");
			//$country_name = MYSQL_RESULT($result,$i,"c_a");
			echo $country_abb;
			$i++;		
		}
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
					 Search Results for <b><?php echo $pdept;	?></b>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<h4>List of Students for Search Resuts <b><?php echo $pdept;	?></b></h4>

						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Lesson
								</th>
								<th>
									 Description
								</th>
								<th>
									 Additional
								</th>
								<th>
									 Description
								</th>
								<th>
									 Sabaq
								</th>
								<th>
									 Sabaqi
								</th>
								<th>
									 Manzil
								</th>
								<th></th>
								<?php 
// sending query
$result = mysql_query("SELECT `class_history`.*,`course`.`course_yrSec`,`monitor`.`mnt_name`,`remaks`.`remak`,`profile`.`teacher_name` FROM `class_history`,`course`,`monitor`,`remaks`,`profile` WHERE class_history.course_id=course.course_id and class_history.monitor_id=monitor.mnt_id and class_history.teacher_remarks=remaks.remk_id and class_history.teacher_id=profile.teacher_id GROUP BY course_id HAVING teacher_id = '110'") or die(mysql_error());
	if (!$result) 
	{
    die("Query not");
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
			$hid = MYSQL_RESULT($result,$i,"history_id");
			$student = MYSQL_RESULT($result,$i,"course_yrSec");
			$remarkst = MYSQL_RESULT($result,$i,"remak");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
			$stur_course_id = MYSQL_RESULT($result,$i,"course_id");
			$st = MYSQL_RESULT($result,$i,"start_time");
			$et = MYSQL_RESULT($result,$i,"end_time");
			$sabuq = MYSQL_RESULT($result,$i,"sabaq");
			$sabuqi = MYSQL_RESULT($result,$i,"sabaqi");
			$manz = MYSQL_RESULT($result,$i,"manzil");
			$r_course_id = MYSQL_RESULT($result,$i,"dept_id");
			$r_lesson_id = MYSQL_RESULT($result,$i,"lesson_id");
			$r_lesson_des = MYSQL_RESULT($result,$i,"lesson_discription");
			$a_course_id = MYSQL_RESULT($result,$i,"adept_id");
			$a_lesson_id = MYSQL_RESULT($result,$i,"alesson_id");
			$a_lesson_des = MYSQL_RESULT($result,$i,"additional_des");
			$monitor = MYSQL_RESULT($result,$i,"mnt_name");
			$status = MYSQL_RESULT($result,$i,"status");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$mnp_id = MYSQL_RESULT($result,$i,"monitor_id");
			$parent_id = MYSQL_RESULT($result,$i,"parent_id");

?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo $student; ?></a>
								</td>
								<td>
									 <?php echo email("$parent_id"); ?>
								</td>
								<td>
									 <?php echo $r_lesson_des; ?>
								</td>
								<td>
									 <a href="lesson-page?c_id=<?php echo $a_lesson_id; ?>&did=<?php echo $a_course_id; ?>"><?php echo lesson("$a_lesson_id"); ?></a>
								</td>
								<td>
									 <?php echo $a_lesson_des; ?>
								</td>
								<td>
									 <?php echo $sabuq; ?>
								</td>
								<td>
									 <?php echo $sabuqi; ?>
								</td>
								<td>
									 <?php echo $manz; ?>
								</td>
								<td></td>
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
						<h4>List of Requests for Search Resuts <b><?php echo $pdept;	?></b></h4>

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