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
  $tt = $_REQUEST['pppid'];
  mysql_query("UPDATE complaint SET cn_id = '2' WHERE parent_id = '$tt'") or die(mysql_error());
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link href="../assets/admin/pages/css/timeline-old.css" rel="stylesheet" type="text/css"/>
</head>
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
				<h1>Complaint <small>Records</small></h1>
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
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="complaint">Register Complaint</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Complaint Records
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet light">
				<div class="portlet-body">
					<div class="row">
				<div class="col-md-12">
							<ul class="timeline">
							<?php 
// sending query
$result = mysql_query("SELECT * FROM complaint WHERE parent_id = '$tt' ORDER BY com_id DESC;");
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
		
			$cid = MYSQL_RESULT($result,$i,"com_id");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$tid = MYSQL_RESULT($result,$i,"teacher_id");
			$pinida = MYSQL_RESULT($result,$i,"cn_id");
			$complaint = MYSQL_RESULT($result,$i,"issue");
			$tname = MYSQL_RESULT($result,$i,"teacher_name");
			$sname = MYSQL_RESULT($result,$i,"student_name");
			$sid = MYSQL_RESULT($result,$i,"student_id");
			$dateos = MYSQL_RESULT($result,$i,"date1");
			$timeos = MYSQL_RESULT($result,$i,"time");
			$pnidp = MYSQL_RESULT($result,$i,"cn_idp");
			$who = MYSQL_RESULT($result,$i,"type");
			$pname = MYSQL_RESULT($result,$i,"parent_name");

?>
								<li class="timeline-<?php if ($who == 1){ echo 'yellow'; } elseif ($who == 2){ echo 'green'; }?>">
									<div class="timeline-time">
										<span class="date">
										<?php echo $timeos; ?> </span>
										<span class="time">
										<?php echo $dateos; ?> </span>
									</div>
									<div class="timeline-icon">
										<i class="fa fa-comments"></i>
									</div>
									<div class="timeline-body">
										<h2><?php echo $sname; ?> for <?php echo $tname; ?></h2>
										<div class="timeline-content">
											<strong><a href="parent-accounts-student?p_id=<?php echo base64_encode($apid); ?>"><?php echo $pname; ?></a> <i class="fa fa-arrow-right"></i></strong> <?php echo $complaint; ?>											
											</div>
									</div>
								</li>
								<?php 	
		$i++;		
		}
	}	
?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>