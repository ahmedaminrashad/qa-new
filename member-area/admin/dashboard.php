<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

// Check if dbconnection exists
if (!file_exists("../includes/dbconnection.php")) {
    die("Database configuration file not found. Please contact administrator.");
}

include("../includes/session1.php");
require("../includes/dbconnection.php");
// Temporary compatibility layer for mysql_* functions
require_once("../includes/mysql-compat.php");

// Verify database connection
if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

// Check if header file exists
if (!file_exists("header-main.php")) {
    die("Header file not found: header-main.php");
}

include("header-main.php");

// Check if home-functions file exists
if (file_exists("load-data-files/home-functions.php")) {
    include("load-data-files/home-functions.php");
} else {
    error_log("Warning: load-data-files/home-functions.php not found");
}
  if (!function_exists('today')) {
  function today($var1, $var2)
{
global $conn;
// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM class_history WHERE date_admin = ? AND monitor_id = ?");
if ($stmt) {
    $stmt->bind_param("si", $var1, $var2);
    $stmt->execute();
    $result = $stmt->get_result();
    $rnumberOfRows = $result->num_rows;
    $stmt->close();
    echo $rnumberOfRows;
} else {
    error_log("Query failed: " . $conn->error);
    echo '0';
}
}
  }
  if (!function_exists('group_name')) {
  function group_name($var)
  {
global $conn;
// Use prepared statement
$stmt = $conn->prepare("SELECT * FROM employee_catagory WHERE cat_id = ?");
if ($stmt) {
    $stmt->bind_param("i", $var);
    $stmt->execute();
    $result = $stmt->get_result();
    $numberOfRows = $result->num_rows;
    
    if ($numberOfRows == 0) {
        echo 'General';
    } else {
        $row = $result->fetch_assoc();
        echo htmlspecialchars($row['cat_name'] ?? 'General', ENT_QUOTES, 'UTF-8');
    }
    $stmt->close();
} else {
    error_log("Query failed: " . $conn->error);
    echo 'General';
}
}
  }
  if (!function_exists('pen_task')) {
  function pen_task()
  	{
global $conn;
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM task WHERE status = 1");
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $numberOfRowsot = $row['count'] ?? 0;
    $stmt->close();
    echo number_format($numberOfRowsot, 0);
} else {
    error_log("Query failed: " . $conn->error);
    echo '0';
}
}
  }
if (!function_exists('active_ann')) {
function active_ann($d)
  	{
global $conn;
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM announcement WHERE ann_date <= ? AND ann_end >= ?");
if ($stmt) {
    $stmt->bind_param("ss", $d, $d);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $numberOfRowsot = $row['count'] ?? 0;
    $stmt->close();
    echo number_format($numberOfRowsot, 0);
} else {
    error_log("Query failed: " . $conn->error);
    echo '0';
}
}
  }
date_default_timezone_set("Africa/Cairo");
$data_date = date('Y-m-d', strtotime('now +1 hour'));
$date = date('d/m/Y', strtotime('now +1 hour'));
$mm_id = date('m',strtotime('now +1 hour'));
$yy_id = date('Y',strtotime('now +1 hour'));
$sy = date('Y-m-d',strtotime('now +1 hour'));
$mm_id = date('m',strtotime('now +1 hour'));
$yy_id = date('Y',strtotime('now +1 hour'));
$year1 = date('Y',strtotime('now +1 hour'));
$month1 = date('m',strtotime('now +1 hour'));
$month_n = date('M',strtotime('now +1 hour'));
$year1sm = date('y',strtotime('now +1 hour'));
$ddd1 = ''.$year1.'-'.$month1.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
?>
<?php
if (!function_exists('csr_active')) {
function csr_active($var)//currently active request
{
global $conn;
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE csr_id = ? AND status = 7");
if ($stmt) {
    $stmt->bind_param("i", $var);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $tnumberOfRows = $row['count'] ?? 0;
    $stmt->close();
    echo number_format($tnumberOfRows, 0);
} else {
    error_log("Query failed: " . $conn->error);
    echo '0';
}
}
  }
if (!function_exists('csr_remove')) {
function csr_remove($var)//currently removed
{
global $conn;
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE csr_id = ? AND status = 6");
if ($stmt) {
    $stmt->bind_param("i", $var);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $tnumberOfRows = $row['count'] ?? 0;
    $stmt->close();
    echo number_format($tnumberOfRows, 0);
} else {
    error_log("Query failed: " . $conn->error);
    echo '0';
}
}
  }
if (!function_exists('csr_trials')) {
function csr_trials($var)//schedule trial this month
{
$mm_id = date('m',strtotime('now +1 hour'));
$yy_id = date('Y',strtotime('now +1 hour'));
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo number_format($tnumberOfRows, 0);
}
  }
if (!function_exists('csr_regulars')) {
function csr_regulars($var)//regulars this month
{
$mm_id = date('m',strtotime('now +1 hour'));
$yy_id = date('Y',strtotime('now +1 hour'));
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo number_format($tnumberOfRows, 0);
}
  }
if (!function_exists('csr_per')) {
function csr_per($var)//performance average all
{
$mm_id = date('m',strtotime('now +1 hour'));
$yy_id = date('Y',strtotime('now +1 hour'));
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$regular = MYSQL_NUMROWS($result);
$result = mysql_query("SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);

// Prevent division by zero
if ($total > 0) {
    $avg = ($regular/$total)*100;
    echo number_format($avg, 2);
} else {
    echo '0.00';
}
}
  }
?>
<?php echo $main_header; ?>
<head>
<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<style>
.amcharts-chart-div a {display:none !important;}
</style>
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
					<div class="tiles">
					<a href="admin-home-all?date=<?php echo $data_date; ?>"><div class="tile bg-blue-hoki">
					<div class="tile-body">
						<i class="fa fa-calendar"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Total
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
					<a href="admin-home-taken-classes?date=<?php echo $data_date; ?>"><div class="tile bg-green-haze">
					<div class="tile-body">
						<i class="fa fa-check"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Taken
						</div>
						<div class="number">
							 <?php echo today("$data_date", "9"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-remaining-classes?date=<?php echo $data_date; ?>"><div class="tile bg-red-intense">
					<div class="tile-body">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Remaining
						</div>
						<div class="number">
							 <?php echo today("$data_date", "1"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-running-classes?date=<?php echo $data_date; ?>"><div class="tile bg-yellow-crusta">
					<div class="tile-body">
						<i class="fa fa-asterisk"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Running
						</div>
						<div class="number">
							 <?php echo today("$data_date", "3"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-absents?date=<?php echo $data_date; ?>"><div class="tile bg-red">
					<div class="tile-body">
						<i class="fa fa-times"></i>
					</div>
					<div class="tile-object">
						<div class="name">q
							 Absent
						</div>
						<div class="number">
							 <?php echo today("$data_date", "4"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-leaves?date=<?php echo $data_date; ?>"><div class="tile bg-blue-madison">
					<div class="tile-body">
						<i class="fa fa-phone"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Leave
						</div>
						<div class="number">
							 <?php echo today("$data_date", "5"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-declined?date=<?php echo $data_date; ?>"><div class="tile bg-grey-cascade">
					<div class="tile-body">
						<i class="fa fa-ban"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Declined
						</div>
						<div class="number">
							 <?php echo today("$data_date", "6"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-suspended?date=<?php echo $data_date; ?>"><div class="tile bg-red-thunderbird">
					<div class="tile-body">
						<i class="fa fa-frown-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Suspended
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 17");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-on-trial?date=<?php echo $data_date; ?>"><div class="tile bg-yellow-gold">
					<div class="tile-body">
						<i class="fa fa-headphones"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Trial
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date'AND status = 11");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-advance?date=<?php echo $data_date; ?>"><div class="tile bg-purple-medium">
					<div class="tile-body">
						<i class="fa fa-smile-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Advance
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 19");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-rescheduled?date=<?php echo $data_date; ?>"><div class="tile bg-green-jungle">
					<div class="tile-body">
						<i class="fa fa-repeat"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Re-Scheduled
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 20");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="list-of-active-students"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-user"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Students
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM course WHERE nature = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="test_status"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-edit"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Created
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$anumberOfRows = MYSQL_NUMROWS($result);
echo $anumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="test_status"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-align-center"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Remaining
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE status_id = 2 AND MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed test 5");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="test_status"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-thumbs-o-down"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Refused
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE status_id = 3 AND MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed test 6");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-current-classes"><div class="tile bg-blue-chambray">
					<div class="tile-body">
						<i class="fa fa-repeat"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 See Current Classes
						</div>
						
					</div>
				</div></a>
				<a href="update_daily_classes.php"><div class="tile bg-blue-chambray">
					<div class="tile-body">
						<i class="fa fa-repeat"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Update Daily Classes
						</div>

					</div>
				</div></a>
				
					<a href="student-list-details"><div class="tile bg-yellow-gold">
					<div class="tile-body">
						<i class="fa fa-user"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Student<br>Details
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM course WHERE nature = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				
				
				</div>
				</div>
				<div class="col-md-12">
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
										 <i class="fa fa-thumbs-o-down"></i> <?php echo leftsall("$month1","$year1"); ?>
									</div>
								</div>
							</div>
<a href="sign-ups-report?year_id=<?php echo $yy_id; ?>"><div id="chart1div" style="width:100%;height:300px;"></div></a>
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
										 <i class="fa fa-history"></i> <?php echo $trial2; ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Leave
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <i class="fa fa-thumbs-o-down"></i> <?php echo $leave2; ?>
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
                "type": "smoothedLine",
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
                "type": "smoothedLine",
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
					<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Test Report</span>

							</div>
						</div>
						<div class="portlet-body">
							<div class="row list-separated">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Total Students
									</div>
									<div class="uppercase font-hg font-red-flamingo">
										 <i class="fa fa-child"></i> <?php
// sending query
   $result = mysql_query("SELECT * FROM course WHERE nature = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Test Created
									</div>
									<div class="uppercase font-hg theme-font">
										 <i class="fa fa-history"></i> <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$anumberOfRows = MYSQL_NUMROWS($result);
echo $anumberOfRows; ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Test Taken
									</div>
									<div class="uppercase font-hg font-purple">
										 <i class="fa fa-graduation-cap"></i> <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE status_id = 2 AND MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Test Remaining
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <i class="fa fa-thumbs-o-down"></i> <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE status_id = 1 AND MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
									</div>
								</div>
							</div>
<a href="sign-ups-report?year_id=<?php echo $yy_id; ?>"><div id="chart7div" style="width:100%;height:300px;"></div></a>
<script>
var chart7 = AmCharts.makeChart("chart7div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/invoice-data.php"
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
                "title": "Total Sent",
                "type": "column",
                "valueField": "tinvoice",
                balloonFunction: function(e) {
      var value = e.graph.chart.dataProvider[e.index][e.graph.valueField];
      if (!value) {
        return "";
      }
      return e.graph.chart.formatString(e.graph.balloonText, e, true);
    }
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

function setDataSet7(dataset_url) {
  AmCharts.loadFile(dataset_url, {}, function(data) {
    chart7.dataProvider = AmCharts.parseJSON(data);
    chart7.validateData();
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
	echo '<div class="label label-info">No Pending request Found!</div>';
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
					<!-- BEGIN PORTLET-->
					<div class="portlet light tasks-widget">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">CSR Activity
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
									<table class="table table-hover table-light">
								<thead>
								<tr class="uppercase">
									<th colspan="2">
										 NAME
									</th>
									<th>
										 <i class="fa fa-group font-blue"></i>
									</th>
									<th>
										 <i class="fa fa-user-times font-red"></i>
									</th>
									<th>
										 <i class="fa fa-history font-yellow"></i>
									</th>
									<th>
										 <i class="fa fa-check font-green"></i>
									</th>
									<th>
										 <i class="fa fa-bar-chart font-green"></i>
									</th>
								</tr>
								</thead>
									<?php 
// sending query
$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 7 OR csr_rights = 1) AND active = 1 ORDER BY teacher_id DESC;");
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
			$ateacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$aname = MYSQL_RESULT($result,$i,"teacher_name");
			$aimage = MYSQL_RESULT($result,$i,"ima");
?>
										<tr>
									<td class="fit">
										<img class="user-pic" src="../uploads/thumb/<?php echo $aimage; ?>">
									</td>
									<td>
										<a href="csr-performance?csr=<?php echo $ateacher_id; ?>&name=<?php echo $aname; ?>&month=<?php echo $mm_id; ?>&year=<?php echo $yy_id; ?>" class="primary-link"><?php echo $aname; ?></a>
									</td>
									<td>
										 <a href="list-of-new-request-csr?csr=<?php echo $ateacher_id; ?>&name=<?php echo $aname; ?>&status=7" class="primary-link"><b><?php echo csr_active("$ateacher_id"); ?></b></a>
									</td>
									<td>
										 <a href="list-of-new-request-csr?csr=<?php echo $ateacher_id; ?>&name=<?php echo $aname; ?>&status=6" class="primary-link"><b><?php echo csr_remove("$ateacher_id"); ?></b></a>
									</td>
									<td>
										 <a href="parent-accounts-trial-csr?csr=<?php echo $ateacher_id; ?>&name=<?php echo $aname; ?>&month=<?php echo $mm_id; ?>&year=<?php echo $yy_id; ?>" class="primary-link"><b><?php echo csr_trials("$ateacher_id"); ?></b></a>
									</td>
									<td>
										 <a href="parent-accounts-regular-csr?csr=<?php echo $ateacher_id; ?>&name=<?php echo $aname; ?>&month=<?php echo $mm_id; ?>&year=<?php echo $yy_id; ?>" class="primary-link"><b><?php echo csr_regulars("$ateacher_id"); ?></b></a>
									</td>
									<td>
										<span class="bold theme-font"><?php echo csr_per("$ateacher_id"); ?>%</span>
									</td>
										<?php 	
		$i++;		
		}
	}	
?>
									</table>
									<!-- END START TASK LIST -->
								</div>
							</div>
							<div class="task-footer">
								<div class="btn-arrow-link pull-right">
									<a href="#"><button type="button" class="btn green btn-xs">Report Page</button></a>
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
								<span class="caption-helper"><?php echo pen_task(); ?> pending</span>
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
$result = mysql_query("SELECT `task`.*, `profile`.`teacher_name` FROM `task`,`profile` WHERE task.manager=profile.teacher_id HAVING status = 1 ORDER BY task_id DESC;");
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
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$taskdes = MYSQL_RESULT($result,$i,"task_des");
			$stu = MYSQL_RESULT($result,$i,"status");
			$reply = MYSQL_RESULT($result,$i,"responce");
			$adate = MYSQL_RESULT($result,$i,"task_date");
			$rdate = MYSQL_RESULT($result,$i,"responce_date");
			$type = MYSQL_RESULT($result,$i,"type_id");
			$man = MYSQL_RESULT($result,$i,"teacher_name");
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
					<div class="col-md-6 col-sm-12">
					<!-- BEGIN TODO CONTENT -->
					<div class="todo-content">
						<div class="portlet light">
							<!-- PROJECT HEAD -->
							<div class="portlet-title">
								<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Announcements</span>
								<span class="caption-helper"><?php echo active_ann($sy); ?> active</span>
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
$result = mysql_query("SELECT * FROM announcement WHERE ann_date <= '$sy' AND ann_end >= '$sy'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Active Announcement Found!</div>';
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
		
			$annid = MYSQL_RESULT($result,$i,"ann_id");
			$sdate = MYSQL_RESULT($result,$i,"ann_date");
			$anncat = MYSQL_RESULT($result,$i,"ann_cat");
			$msg = MYSQL_RESULT($result,$i,"ann_msg");
			$edate = MYSQL_RESULT($result,$i,"ann_end");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<font color="#A80707">For <?php echo group_name("$anncat"); ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $msg; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <span class="font-green"><?php echo $sdate; ?></span>-<span class="font-red"><?php echo $edate; ?></span> </span>
													</div>
													<div class="todo-tasklist-controls pull-right">
														<a href="delete-announcement?pT=<?php echo $annid; ?>"><button type="button" class="btn red btn-xs">Delete</button></a>
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