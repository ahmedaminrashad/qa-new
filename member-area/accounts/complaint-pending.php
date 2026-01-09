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
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
  function pen_com($var)
  	{
  		$result = mysql_query("SELECT * FROM complaint WHERE cn_id = '1' AND parent_id = '$var'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
}
function com_com($var)
  	{
  		$result = mysql_query("SELECT * FROM complaint WHERE cn_id = '2' AND parent_id = '$var'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link rel="stylesheet" type="text/css" href="../assets/admin/pages/css/todo.css"/>
</head>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
 ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot1 = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '0';
	}
else if ($numberOfRowsot1 > 0) 
	{
	echo $numberOfRowsot1;
	}
 ?> Invoice(s)</strong> unpaid</h3>
								<a href="ind_details">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/user-alt-128.png">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['parent']; ?></span>
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
				<h1>Complaints <small>Pending</small></h1>
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
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Complaints Pending
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
									<span class="caption-subject font-green-sharp bold uppercase">COMPLAINTS</span>
									<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
								</div>
							</div>
							<div class="portlet-body todo-project-list-content">
								<div class="todo-project-list">
									<ul class="nav nav-pills nav-stacked">
										<li class="active">
											<a href="complaint-pending">
											<span class="badge badge-success badge-active"> <?php echo pen_com("$tt"); ?> </span> PENDING </a>
										</li>
										<li>
											<a href="complaint-completed">
											<span class="badge badge-success"> <?php echo com_com("$tt"); ?> </span> CLEARED </a>
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
									<span class="caption-helper">Complaints:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">PENDING (<?php echo pen_com("$tt"); ?>)</span>
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
$result = mysql_query("SELECT * FROM complaint WHERE cn_id = '1' AND parent_id = '$tt' ORDER BY com_id DESC;");
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
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<?php echo 'Regarding: '.$tname.''; ?>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $complaint; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo $dateos; ?> </span>
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
			<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"clear-complaint.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>