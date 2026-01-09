<?php if (empty($session)) { session_start(); } 
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
?>
<?php
  include("../includes/session.php");
  include("header.php");
  
date_default_timezone_set("Africa/Cairo");
$mon = date('F');
$monid = date('n');
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
date_default_timezone_set("Africa/Cairo");
$sy = date('Y');
$y = $

  require ("../includes/dbconnection.php");
  $Course_ID =base64_decode($_GET["Course_ID"]);

function history($con, $month, $year, $id){
			$result = mysql_query("SELECT * FROM History1 WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$his_id = MYSQL_RESULT($result,$i,"history1_id");
			echo '<a href="history-details?history_id='.$his_id.'"><button type="button" class="btn green btn-xs">See Details</button></a>';
				}
}

function teacher($con, $month, $year, $id){
			$result = mysql_query("SELECT `History1`.*,`profile`.`teacher_name` FROM `History1`,`profile` WHERE History1.teacher_id=profile.teacher_id HAVING admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			echo $teacher;
				}
}


function attend($con, $month, $year, $id){
			$result = mysql_query("SELECT `History1`.*,`attend`.`mark` FROM `History1`,`attend` WHERE History1.a_id=attend.a_id HAVING admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$attend = MYSQL_RESULT($result,$i,"mark");
			echo $attend;
				}
}

function remark($con, $month, $year, $id){
			$result = mysql_query("SELECT `History1`.*,`remaks`.`remak` FROM `History1`,`remaks` WHERE History1.teacher_remarks=remaks.remk_id HAVING admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$rmak = MYSQL_RESULT($result,$i,"remak");
			echo $rmak;
				}
}

function sum1($con, $month, $year, $id){
			$result =  mysql_query("SELECT * FROM `History1` WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
				echo "#fff";
				}
			else if ($numberOfRows > 0) 
				{
				echo "#DAECEC";				}
}

function uuu($con, $month, $year, $id){
			$result =  mysql_query("SELECT * FROM `History1` WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$start_t = MYSQL_RESULT($result,$i,"start_time");
			$end_t = MYSQL_RESULT($result,$i,"end_time");
			echo '<font color="#44B6AE"><b>'.$start_t.'</b></font> to <font color="#E35B5A"><b>'.$end_t.'</b></font>';
				}
}

function delete($con, $month, $year, $id){
			$result = mysql_query("SELECT * FROM History1 WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$his_id = MYSQL_RESULT($result,$i,"history1_id");
			echo '<a href="history-delete?history_id='.$his_id.'"><button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a>';
				}
}

function edit($con, $month, $year, $id){
			$result = mysql_query("SELECT * FROM History1 WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$his_id = MYSQL_RESULT($result,$i,"history1_id");
			echo '<a href="history-edit?history_id='.$his_id.'"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a>';
				}
}
?>
<?php echo $main_header; ?>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="circle">3</span>
						<span class="corner"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>7 New</strong> Messages</h3>
								<a href="javascript:;">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">Just Now </span>
										</span>
										<span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/<?php echo $_SESSION['is']['teacher_id'];?>a.jpg">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['teacher_name']; ?></span>
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
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Student<small> History</small></h1>
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
					 Classe History of <?php
				$Course_ID =base64_decode($_GET["Course_ID"]);
				$result = mysql_query("SELECT * FROM course HAVING course_id='$Course_ID'");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$course = MYSQL_RESULT($result,$i,"course_yrSec");
				}
				echo $course;				
				?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet light">
						
						<a href="history_course_search?month_id=6&year_id=3&Course_ID=<?php echo base64_encode($Course_ID); ?>"><button type="button" class="btn green btn-xs">Previous Month</button></a>
					<h3>Classe History of <font color="#44B6AE"> <b><?php
				$Course_ID =base64_decode($_GET["Course_ID"]);
				$result = mysql_query("SELECT * FROM course HAVING course_id='$Course_ID'");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$course = MYSQL_RESULT($result,$i,"course_yrSec");
				}
				echo $course;				
				?></b></font></h3>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Date/Day
								</th>
								<th>
									 Start/End
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Status
								</th>
								<th>
									 Remarks
								</th>
								<th>
									 Details
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php
$date = ''.$sy.'-'.$monid.'-01';
$end = ''.$sy.'-'.$monid.'-' . date('t', strtotime($date)); //get end date of month
?>
<?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('Y-m-d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    ?>
    </thead>
								
								<tbody>
								<tr bgcolor="<?php echo sum1("$day_num","$monid","$y","$Course_ID"); ?>">
								<td><?php echo $day_num; ?> - <?php echo $day_name; ?></td>
								<td><?php echo uuu("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo teacher("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo attend("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo remark("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo history("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo edit("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo delete("$day_num","$monid","$y","$Course_ID"); ?></td>
    							</tr>
    							<?php 	
	}	
?>
								</tbody>
								</table>
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