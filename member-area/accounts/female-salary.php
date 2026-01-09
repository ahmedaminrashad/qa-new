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
  $pT =$_REQUEST['t_id'];
$t_link =$_REQUEST['t_link'];
$mm_id =$_REQUEST['mon'];
$yy_id =$_REQUEST['yyy'];
$tname =$_REQUEST['t_name'];
$tsalary =$_REQUEST['t_salary'];
$trent =$_REQUEST['t_rent'];
$ttax =$_REQUEST['t_tax'];
$ddd = ''.$yy_id.'-'.$mm_id.'-01';
$last_date = date("Y-m-t", strtotime($ddd));
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
   $result = mysql_query("SELECT * FROM History1 Where course_id = $cr AND teacher_id = $tr AND MONTH(admin_date) = $mr AND YEAR(admin_date) = $yr AND a_id = $sr");
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
   $result = mysql_query("SELECT * FROM History1 Where course_id = $cr AND teacher_id = $tr AND MONTH(admin_date) = $mr AND YEAR(admin_date) = $yr AND a_id = $sr");
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
			echo ''.$total.' ('.mb_substr($figure, 0, 5).'%)';
			}
			}

	}
function ratio1($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM History1 Where course_id = $cr AND teacher_id = $tr AND MONTH(admin_date) = $mr AND YEAR(admin_date) = $yr AND a_id = $sr");
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
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script></head>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php echo trial("$sy"); ?></a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo trial2(); ?> families</strong> on trial</h3>
								<a href="parent-accounts-on-trial">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bubbles"></i>
						<?php echo note(); ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo note2(); ?> </strong>unread comments</h3>
								<a href="comment-timeline-all">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-calendar"></i>
						<?php echo leave($sy); ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo leave2(); ?> families</strong> on leave</h3>
								<a href="parent-accounts-on-leave">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php echo task() ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo task() ?> New</strong> Tasks</h3>
								<a href="pending-task">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/avatar9.jpg">
						<span class="username username-hide-mobile"><?php echo $head_name; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
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
					 List of Students of <?php echo $tname; ?>
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
$result = mysql_query("SELECT * FROM course WHERE Teacher = $pT");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Students: $numberOfRows"; ?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover" id="txtMult">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Parent
								</th>
								<th>
									 History
								</th>
								<th>
									 Report
								</th>
								<th>
									Class Ratio 
								</th>
								<th>
									 
								</th>
								<th>
									 
								</th>
								<th>
									 
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `account`.`parent_name` FROM `course`,`account` WHERE course.parent_id=account.parent_id HAVING Teacher = $pT");
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
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo ratio1("$Course_ID", "$pT", "$mm_id", "$yy_id", "1"); ?>" class="txtMult">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?></a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pn; ?>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
								</td>
								<td>
									 <span class="label label-sm label-success" title="Taken Regular"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "1"); ?></span>-<span class="label label-sm label-info" title="Leave"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "5"); ?></span>-<span class="label label-sm label-danger" title="Absent"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "4"); ?></span>-<span class="label label-sm label-warning" title="Pending"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "9"); ?></span>-<span class="label label-sm label-success" title="Classes/Week"><?php echo schedule_classes($Course_ID); ?></span>
								</td>
								<td><strong><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "1"); ?></strong>/<?php echo ratio("$Course_ID", "$pT", "$mm_id", "$yy_id", "1") ?></td>
								<td>
                				<input name="txtEmmail" class="val1" value="<?php echo schedule_classes($Course_ID); ?>" />
            					</td>
            					<td>
                				<input name="txtEmmail" class="val2" value="350"/>
            					</td>
            					<td>
                				<span class="multTotal">0.00</span>
            					</td>						
        						</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								<tr>
    								<td colspan="9" align="right">
        								Grand Total# <span id="grandTotal">0.00</span>
    								</td>
								</tr>							
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
<script>
$(document).ready(function () {
       $(".txtMult input").keyup(multInputs);

       function multInputs() {
           var mult = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.val1', this).val();
               var $val2 = $('.val2', this).val();
               var $total = ($val1 * 1) * ($val2 * 1);
               // set total for the row
               $('.multTotal', this).text($total);
               mult += $total;
           });
           $("#grandTotal").text(mult);
           document.getElementById("gtotal").value = mult;
       }
  });
 </script>