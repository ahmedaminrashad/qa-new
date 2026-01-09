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
  include("load-data-files/home-functions.php");
date_default_timezone_set("Africa/Cairo");
$date = date('d/m/Y', time());
?>
<?php 
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set("Africa/Cairo");
    $today = date("l");
    if($today == "Sunday") 
        {
            $c = 7;
        }
    elseif($today == "Monday")
        {
            $c = 1;
        } 
    elseif($today == "Tuesday") 
        {
            $c = 2;
        } 
    elseif($today == "Wednesday")
        {
            $c = 3;
        } 
    elseif($today == "Thursday")
        {
            $c = 4;
        } 
    elseif($today == "Friday") 
        {
            $c = 5;
        } 
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $c = 6;
        }
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
$year1 = date('Y');
$month1 = date('m');
$month_n = date('M');
$year1sm = date('y');
$ddd1 = ''.$year1.'-'.$month1.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
?>
<?php echo $main_header; ?>
<head>
<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<style>
.amcharts-chart-div a {display:none !important;}
</style>
</head>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-envelope-open"></i>
						<?php echo newrequest(); ?></a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo newrequest(); ?> New Requests</strong>awaiting.</h3>
								<a href="list-of-new-request">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
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
				<h1>Admin Home<small> Today's Classes</small></h1>
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
					 Current Day Class Progress
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light blue-madison" href="admin-home">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$dnumberOfRows = MYSQL_NUMROWS($result);
echo $dnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Classes Today
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light green-haze" href="admin-home-taken-classes">
					<div class="visual">
						<i class="fa fa-check-square-o fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 2");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Taken
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light red-intense" href="admin-home-remaining-classes">
					<div class="visual">
						<i class="fa fa-user-times fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 5");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Remaining
						</div>
					</div>
					</a>
				</div>
				</div>
				<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light yellow" href="admin-home-running-classes">
					<div class="visual">
						<i class="fa fa-forward fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE aday_id = $c and mnt_id = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Classes Running
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light blue-chambray" href="admin-home-absents">
					<div class="visual">
						<i class="fa fa-thumbs-o-down fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 3");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$anumberOfRows = MYSQL_NUMROWS($result);
echo $anumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Absents
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light red-pink" href="admin-home-leaves">
					<div class="visual">
						<i class="fa fa-bed fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 6");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Leaves
						</div>
					</div>
					</a>
				</div>
				</div>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
													<div class="col-md-6 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">New Sign-ups Report</span>

							</div>
						</div>
						<div class="portlet-body">
							<div class="row list-separated">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Sign-ups
									</div>
									<div class="uppercase font-hg font-red-flamingo">
										 <i class="fa fa-child"></i> <?php echo requests("$month1","$year1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Trials Scheduled
									</div>
									<div class="uppercase font-hg theme-font">
										 <i class="fa fa-history"></i> <?php echo trials("$month1","$year1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 New Regulars
									</div>
									<div class="uppercase font-hg font-purple">
										 <i class="fa fa-graduation-cap"></i> <?php echo regulars("$month1","$year1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Deactivations
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <i class="fa fa-thumbs-o-down"></i> <?php echo lefts("$ddd1","$last_date1"); ?>
									</div>
								</div>
							</div>
<div id="chart1div" style="width:100%;height:300px;"></div>
<script>
var chart1 = AmCharts.makeChart("chart1div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/sign-ups-data.php"
  },
  "valueAxes": [{
    "gridColor": "#697B15",
    "gridAlpha": 0.2,
    "dashLength": 2
  }],
  "gridAboveGraphs": true,
  "startDuration": 1,
            "graphs": [{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Sign-ups",
                "type": "column",
                "valueField": "request"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Scheduled Trial",
                "type": "column",
                "valueField": "trial"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Regular",
                "type": "column",
                "valueField": "regular"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Left",
                "type": "column",
                "valueField": "left"
            }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  }
});

function setDataSet1(dataset_url) {
  AmCharts.loadFile(dataset_url, {}, function(data) {
    chart1.dataProvider = AmCharts.parseJSON(data);
    chart1.validateData();
  });
}
</script>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				<div class="col-md-6 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Service Report</span>

							</div>
						</div>
						<div class="portlet-body">
							<div class="row list-separated">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Paid
									</div>
									<div class="uppercase font-hg font-red-flamingo">
										 <i class="fa fa-money"></i> <?php echo active("$last_date1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Free
									</div>
									<div class="uppercase font-hg theme-font">
										 <i class="fa fa-life-ring"></i> <?php echo free("$last_date1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Trial
									</div>
									<div class="uppercase font-hg font-purple">
										 <i class="fa fa-history"></i> <?php echo trial2(); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Leave
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <i class="fa fa-thumbs-o-down"></i> <?php echo leave2(); ?>
									</div>
								</div>
							</div>
<a href="list-of-new-request"><div id="chartdiv" style="width:100%;height:300px;"></div></a>
<script>
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/accounts-growth.php"
  },
  "valueAxes": [{
    "gridColor": "#697B15",
    "gridAlpha": 0.2,
    "dashLength": 2
  }],
  "gridAboveGraphs": true,
  "startDuration": 1,
            "graphs": [{
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "bullet": "round",
                "dashLengthField": "dashLengthLine",
                "lineThickness": 3,
                "bulletSize": 7,
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "bulletBorderThickness": 3,
                "fillAlphas": 0,
                "lineAlpha": 1,
                "title": "Active",
                "valueField": "active"
            },{
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "bullet": "round",
                "dashLengthField": "dashLengthLine",
                "lineThickness": 3,
                "bulletSize": 7,
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "bulletBorderThickness": 3,
                "fillAlphas": 0,
                "lineAlpha": 1,
                "title": "All",
                "valueField": "all"
            }
            ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  }
});

function setDataSet(dataset_url) {
  AmCharts.loadFile(dataset_url, {}, function(data) {
    chart.dataProvider = AmCharts.parseJSON(data);
    chart.validateData();
  });
}
</script>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
					<div class="col-md-6 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light tasks-widget">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">New Requests</span>
								<span class="caption-helper"><?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?> active</span>
							</div>
							<div class="inputs">
								<div class="portlet-input input-small input-inline">
								</div>
							</div>
						</div>
				<div class="portlet-body">
							<div class="task-content">
								<div class="scroller" style="height: 282px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
									<!-- START TASK LIST -->
									<ul class="task-list">
									<?php 
// sending query
$result = mysql_query("SELECT * FROM new_request WHERE status = 1 ORDER BY request_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'There is no pending request...';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$arequest_id = MYSQL_RESULT($result,$i,"request_id");
			$aname = MYSQL_RESULT($result,$i,"name");
			$aemail = MYSQL_RESULT($result,$i,"email");
			$aphone = MYSQL_RESULT($result,$i,"phone");
			$askype = MYSQL_RESULT($result,$i,"skype");
			$acountry = MYSQL_RESULT($result,$i,"country");
			$acity = MYSQL_RESULT($result,$i,"city");
			$amessage = MYSQL_RESULT($result,$i,"message");
			$adate = MYSQL_RESULT($result,$i,"date");
			$atime = MYSQL_RESULT($result,$i,"time");
			$aupdate = MYSQL_RESULT($result,$i,"time_update");
			$asent = MYSQL_RESULT($result,$i,"sent");
			$acsr_id = MYSQL_RESULT($result,$i,"csr_id");
			$from_id = MYSQL_RESULT($result,$i,"time_from");
			$to_id = MYSQL_RESULT($result,$i,"time_to");
?>
										<li>
											<div class="task-title">
												<span class="task-title-sp">
												<?php echo mb_strimwidth("$aname", 0, 20, "..."); ?> </span>
												<span class="task-title-sp">
												(<?php echo $acountry; ?>) </span>
												<span class="label label-sm label-warning" title="Email Status"><i class="fa fa-envelope"> </i><?php if ($asent == 2){ echo '<font color="green">Sent</font>';} else { echo '<font color="red">Not Sent</font>';} ?></span>
								<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $arequest_id; ?>" data-name="<?php echo $aname; ?>"><span class="label label-sm label-success" title="Note Details"><i class="fa fa-comments-o"> </i><?php echo req_note("$arequest_id"); ?></span></a>
								<?php if ($acsr_id == 0){ echo '<span class="label label-sm label-danger" title="Allocation"> Not Allocated</span>'; } else { echo '<span class="label label-sm label-info" title="Allocation"><i class="fa fa-mail-forward"></i></span> '.csr("$acsr_id").''; }?> 
								<span class="task-title-sp">
												<?php $date1=date_create("$adate"); echo date_format($date1,"d/m/Y"); ?></span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
													<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
													<a href="add-new-request-note?req=<?php echo $arequest_id; ?>&name=<?php echo $aname; ?>">Add Note </a>
												</li>
												<li>
													<a href="welcome-email?request=<?php echo $arequest_id; ?>">Send Email </a>
												</li>
												<li>
													<a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $arequest_id; ?>" data-name="<?php echo $aname; ?>">Allocate CSR </a>
												</li>
												<li>
													<a href="add-parent-account?req=<?php echo $arequest_id; ?>&name=<?php echo $aname; ?>&email=<?php echo $aemail; ?>&phone=<?php echo $aphone; ?>&skype=<?php echo $askype; ?>&city=<?php echo $acity; ?>">Create Account </a>
												</li>
												<li>
													<a href="teaching-request?req=<?php echo $arequest_id; ?>">Teaching </a>
												</li>
												<li>
													<a href="remove-request?req=<?php echo $arequest_id; ?>">Remove </a>
												</li>
												<li>
													<a href="delete-request?req=<?php echo $arequest_id; ?>">Spam </a>
												</li>
													</ul>
												</div>
											</div>
										</li>
										<?php 	
		$i++;		
		}
	}	
?>
									</ul>
									<!-- END START TASK LIST -->
								</div>
							</div>
							<div class="task-footer">
								<div class="btn-arrow-link pull-right">
									<a href="list-of-new-request"><button type="button" class="btn green btn-xs">Request Page</button></a>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-12">
					<!-- BEGIN TODO CONTENT -->
					<div class="todo-content">
						<div class="portlet light">
							<!-- PROJECT HEAD -->
							<div class="portlet-title">
								<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Tasks</span>
								<span class="caption-helper"><?php echo task(); ?> pending</span>
							</div>
							</div>
							<!-- end PROJECT HEAD -->
							<div class="portlet-body">
								<div class="row">
									<div class="">
										<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											<div class="todo-tasklist">
											<?php 
// sending query
$result = mysql_query("SELECT * FROM task WHERE status = 1 ORDER BY task_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Pending Task Found';
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
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$taskdes = MYSQL_RESULT($result,$i,"task_des");
			$stu = MYSQL_RESULT($result,$i,"status");
			$reply = MYSQL_RESULT($result,$i,"responce");
			$adate = MYSQL_RESULT($result,$i,"task_date");
			$rdate = MYSQL_RESULT($result,$i,"responce_date");
			$type = MYSQL_RESULT($result,$i,"type_id");
			$man = MYSQL_RESULT($result,$i,"manager");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<?php if ($pid > 0){echo '<font color="#44B6AE">(Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a>)';} else {echo '';} ?> <font color="#A80707">Assigned to <?php echo $man; ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $taskdes; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo $adate; ?> </span>
														<span class="todo-tasklist-badge badge badge-roundless"><?php if ($type ==1){echo "Urgent";} else {echo "Casual";} ?></span>
													</div>
													<div class="todo-tasklist-controls pull-right">
														<a href="clear-task?pT=<?php echo base64_encode($taskid); ?>&link=<?php echo $link; ?>"><button type="button" class="btn green btn-xs">Clear Now</button></a>
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
					</div>
					<!-- END TODO CONTENT -->
					<a href="expense-report?year_id=<?php echo $yy_id; ?>"><div class="col-sm-12">
			<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Expense vs Revenues For Last Six Months</span>

							</div>
						</div>
						<div class="portlet-body">
							<div class="row list-separated">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Income
									</div>
									<div class="uppercase font-hg theme-font">
										 <i class="fa fa-sort-up"></i> <?php echo rsum("$month1","$year1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Expense
									</div>
									<div class="uppercase font-hg font-red-flamingo">
										 <i class="fa fa-sort-down"></i> <?php echo psum("$month1","$year1"); ?>

									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Status
									</div>
									<div class="uppercase font-hg font-purple">
										 <?php echo tot("$month1","$year1"); ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Cash
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <i class="fa fa-money"></i> <?php echo cash("$sy"); ?>
									</div>
								</div>
							</div>
<div id="chart3div" style="width:100%;height:300px;"></div>
<script>
var chart3 = AmCharts.makeChart("chart3div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/expense-revenue.php"
  },
  "valueAxes": [{
    "gridColor": "#697B15",
    "gridAlpha": 0.2,
    "dashLength": 2
  }],
  "gridAboveGraphs": true,
  "startDuration": 1,
            "graphs": [{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Revenue",
                "type": "column",
                "valueField": "revenue"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Expense",
                "type": "column",
                "valueField": "expense"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Surplus",
                "type": "column",
                "valueField": "surplus"
            }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  }
});

function setDataSet1(dataset_url) {
  AmCharts.loadFile(dataset_url, {}, function(data) {
    chart3.dataProvider = AmCharts.parseJSON(data);
    chart3.validateData();
  });
}
</script>
							</div>
						</div>
					</div></a>
					<!-- END PORTLET-->
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


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
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"note-details.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"allocate-csr.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>