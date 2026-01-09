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
 $tt = $_SESSION['is']['teacher_id'];
 function LeaveApproved($t, $s)
  	{
  		$result = mysql_query("SELECT * FROM leave_app WHERE manager_id = '$t' AND status = '$s'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
}
function LeaveApproved1($t)
  	{
  		$result = mysql_query("SELECT * FROM leave_app WHERE manager_id = '$t' AND (status = '1' OR status = '2' OR status = '3' OR status = '4')");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
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
				<h1>Leave<small> Aplication Status</small></h1>			</div>
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
					 Leave Application Status
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN TODO SIDEBAR -->
					<div class="todo-sidebar">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
									<span class="caption-subject font-green-sharp bold uppercase">Leave Application Status </span>
									<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
								</div>
							</div>
							<div class="portlet-body todo-project-list-content">
								<div class="todo-project-list">
									<ul class="nav nav-pills nav-stacked">
										<li>
											<a href="leave-status">
											<span class="badge badge-success"> <?php echo LeaveApproved1("$tt"); ?> </span> PENDING </a>
										</li>
										<li class="active">
											<a href="leave-status-approved">
											<span class="badge badge-success"> <?php echo LeaveApproved("$tt", "5"); ?> </span> APPROVED </a>
										</li>
										<li>
											<a href="leave-status-not-approved">
											<span class="badge badge-success badge-active"> <?php echo LeaveApproved("$tt", "6"); ?> </span> NOT-APPROVED </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- END TODO SIDEBAR -->
					<!-- BEGIN TODO CONTENT -->
					<div class="todo-content">
						<div class="portlet light">
							<!-- PROJECT HEAD -->
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-helper">Approved:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase"> APPLICATIONS (<?php echo LeaveApproved("$tt", "5"); ?>)</span>
								</div>
							</div>
							<!-- end PROJECT HEAD -->
							<div class="portlet-body">
								<div class="row">
									<div class="">
										<div class="scroller" style="max-height: 800px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
											<div class="todo-tasklist">
											<?php 
// sending query
$result = mysql_query("SELECT * FROM leave_app WHERE manager_id = $ID AND status = 5 ORDER BY leave_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Rejected leave Application Found!</div>';
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
		
			$leaveid = MYSQL_RESULT($result,$i,"leave_id");
			$teacherid = MYSQL_RESULT($result,$i,"teacher_id");
			$teacherName = MYSQL_RESULT($result,$i,"teacher_name");
			$designation = MYSQL_RESULT($result,$i,"teacher_cat");
			$apply_date = MYSQL_RESULT($result,$i,"date");
			$sdate = MYSQL_RESULT($result,$i,"from_date");
			$tdate = MYSQL_RESULT($result,$i,"to_date");
			$status = MYSQL_RESULT($result,$i,"status");
			$man = MYSQL_RESULT($result,$i,"manager_id");
			$dis = MYSQL_RESULT($result,$i,"discription");
			$man_dis = MYSQL_RESULT($result,$i,"manager_remarks");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<font color="#A80707">NAME: <?php echo $teacherName; ?> <?php echo '('.$designation.')'; ?><br>FROM: <?php echo $sdate; ?>  --  TO: <?php echo $tdate; ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php if ($status == 1){echo '<b>Leave Discription:</b> '.$dis.''; } else {echo '<b>Leave Discription:</b> '.$dis.'<br><br><b>Manager Remarks:</b> '.$man_dis.'';} ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo $apply_date; ?> </span>
														<span class="todo-tasklist-badge badge badge-roundless"><?php if ($status == 1){echo "Under Suppervision";} elseif ($status == 2){echo "Sent for Approval";} elseif ($status == 3){echo "Approval Excepted";} elseif ($status == 4){echo "Approval Rejected";} elseif ($status == 5){echo "Approved";} else {echo "Not Approved";} ?></span>
													</div>
													<div class="todo-tasklist-controls pull-right">
													<span class="label label-sm label-info">Approved, no action required</span> <a href="update-leave?status=1&leave=<?php echo $leaveid; ?>"><button type="button" class="btn green btn-xs">Validate Again</button>
														</div>
												</div>
												<?php 	
		$i++;		
		}
	}	
?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END TODO CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.aalesson.value = ("<?php echo 100; ?>");
	//alert (form.pCityM.value);				
</script>