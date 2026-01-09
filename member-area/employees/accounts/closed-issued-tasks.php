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
  include("../includes/accounts_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  function TeacherName($var, $a){
$result1 = mysql_query("SELECT * FROM profile Where teacher_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$name = MYSQL_RESULT($result1,$i,"teacher_name");
					$img = MYSQL_RESULT($result1,$i,"ima");
	
			  		if ($a == 1){
			  		echo $name;
			  		}
			  		elseif ($a == 2){
			  		echo $img;
			  		}
			}
}
function pending($var1, $var2, $var3){
  $result = mysql_query("SELECT * FROM task_creator WHERE clear = '$var1' AND from_person = '$var2' AND status = '$var3'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows == 0) 
	{
	echo '0';
	}
elseif ($tnumberOfRows > 0){
	echo $tnumberOfRows;
}
  }
?>
<?php
date_default_timezone_set("Asia/Karachi");
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
				<h1>Issued <small>Task Management</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="dashboard">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Issued Task Management
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
									<span class="caption-subject font-green-sharp bold uppercase">TASK ISSUED </span>
									<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
								</div>
							</div>
							<div class="portlet-body todo-project-list-content">
								<div class="todo-project-list">
									<ul class="nav nav-pills nav-stacked">
										<li>
											<a href="pending-issued-tasks">
											<span class="badge badge-success"> <?php echo pending("1","$ID","2"); ?> </span> ACTIVE </a>
										</li>
										<li class="active">
											<a href="closed-issued-tasks">
											<span class="badge badge-success badge-active"> <?php echo pending("2","$ID","2"); ?> </span> CLOSED </a>
										</li>
										<li>
											<a href="awaiting-issued-tasks">
											<span class="badge badge-success"> <?php echo pending("1","$ID","1"); ?> </span> AWAITING </a>
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
									<span class="caption-helper">Tasks:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">CLOSED by you (<?php echo pending("2","1"); ?>)</span>
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
$result = mysql_query("SELECT * FROM task_creator WHERE clear = '2' AND from_person = '$ID' ORDER BY task_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Pending Task Found!</div>';
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
		
			$taskid = MYSQL_RESULT($result,$i,"task_id");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$per_to = MYSQL_RESULT($result,$i,"to_person");
			$per_from = MYSQL_RESULT($result,$i,"from_person");
			$add_date = MYSQL_RESULT($result,$i,"date");
			$tStatus = MYSQL_RESULT($result,$i,"status");
			$tDes = MYSQL_RESULT($result,$i,"des");
			$tClear = MYSQL_RESULT($result,$i,"clear");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<font color="#A80707">From: <?php echo TeacherName("$per_from",'1'); ?> To: <?php echo TeacherName("$per_to",'1'); ?></font> <?php if ($pid > 0){echo '<font color="#44B6AE">(Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a>)';} else {echo '';} ?>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $tDes; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo date('jS F-Y',strtotime($add_date)); ?></span>
													</div>
													<div class="todo-tasklist-controls pull-right">
														<a href="task-string?task=<?php echo base64_encode($taskid); ?>"><button type="button" class="btn red btn-xs">Open String</button></a>
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