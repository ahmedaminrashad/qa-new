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
  ?>
<?php
$name =base64_decode($_GET["name"]);
$pnid =base64_decode($_GET["Course_ID"]);
	$result = mysql_query("SELECT * FROM course Where course_id = $pnid");
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
			$student_name = MYSQL_RESULT($result,$i,"course_yrSec");
			$teacher_remarks = MYSQL_RESULT($result,$i,"remark_teacher");
			}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
function mis($a){
if ($a == 1){echo 'Prononunciation of letters is not good';}
elseif ($a == 2){echo 'Confusion in reading Haa and HHaa';}
elseif ($a == 3){echo 'Confusion in reading Hamza and Ain';}
elseif ($a == 4){echo 'Not pronouncing the bold letters properly';}
elseif ($a == 5){echo 'Confusion in reading Thaa and Seen';}
elseif ($a == 6){echo 'Not reading Zaal and Zaa from their articulation points';}
elseif ($a == 7){echo 'Izhar is not memorized';}
elseif ($a == 8){echo 'Idgham is not memorized';}
elseif ($a == 9){echo 'Do not know about Ikhfa';}
elseif ($a == 10){echo 'Iqlab is not memorized';}
elseif ($a == 11){echo 'Memorized but unable to apply Noon Sakin & Tanween';}
elseif ($a == 12){echo 'Applied but not memorized Noon Sakin & Tanween';}
elseif ($a == 13){echo 'Memorized but unable to apply Meem Sakin';}
elseif ($a == 14){echo 'Applied but not memorized Meem Sakin';}
elseif ($a == 15){echo 'Have no idea about Meem Sakin';}
elseif ($a == 16){echo 'Memorized but unable to apply Qalqalah';}
elseif ($a == 17){echo 'Applied but not memorized Qalqalah';}
elseif ($a == 18){echo 'Have no idea about Qalqalah';}
elseif ($a == 19){echo 'Not doing Ghunna properly';}
elseif ($a == 20){echo 'Some times do not care of Ghunna';}
elseif ($a == 21){echo 'Have no idea about Ghunna';}
elseif ($a == 22){echo 'Not stretching madda letters';}
elseif ($a == 23){echo 'Stretching the Harakat';}
elseif ($a == 24){echo 'Not stretch Madd properly';}
elseif ($a == 25){echo 'Know about the madda letters but not reading accordingly';}
elseif ($a == 26){echo 'Have no idea about Madda &amp; Madh';}
}
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
				<h1>Student <small>Results</small></h1>
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
				<li class="active">
					 Trial Class Remarks and Results of <?php echo $student_name; ?> </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
			<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
				<div class="col-md-12">
				<div class="portlet-body">
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/student-learning-curve.php?c_id=<?php echo $pnid; ?>"
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
                "title": "Tajweed",
                "type": "column",
                "valueField": "tajweed",
                "lineColor":"#76B75B",
                balloonFunction: function(e) {
      var value = e.graph.chart.dataProvider[e.index][e.graph.valueField];
      if (!value) {
        return "";
      }
      return e.graph.chart.formatString(e.graph.balloonText, e, true);
    }
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Quran Reading",
                "type": "column",
                "valueField": "reading",
                "lineColor":"#FBE600",
                balloonFunction: function(e) {
      var value = e.graph.chart.dataProvider[e.index][e.graph.valueField];
      if (!value) {
        return "";
      }
      return e.graph.chart.formatString(e.graph.balloonText, e, true);
    }
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Memorization",
                "type": "column",
                "valueField": "hifz",
                "lineColor":"#FF7800",
                balloonFunction: function(e) {
      var value = e.graph.chart.dataProvider[e.index][e.graph.valueField];
      if (!value) {
        return "";
      }
      return e.graph.chart.formatString(e.graph.balloonText, e, true);
    }
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
                "title": "Average Performance",
                "valueField": "avg",
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

function setDataSet1(dataset_url) {
  AmCharts.loadFile(dataset_url, {}, function(data) {
    chart4.dataProvider = AmCharts.parseJSON(data);
    chart4.validateData();
  });
}
</script>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="alert alert-success">
								<strong>Trial Class Remarks:</strong><br> <?php echo $teacher_remarks; ?>
							</div>
					<div class="portlet light">
						<div class="portlet-body">
							<?php 
// sending query
$pnid =base64_decode($_GET["Course_ID"]);
$result = mysql_query("SELECT `test_results`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `test_results`,`month`,`school_yr` WHERE test_results.m_id=month.month_id and test_results.y_id=school_yr.year_id HAVING course_id = $pnid AND (status_id = 2 or status_id = 3) ORDER BY m_id DESC;");
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
			$t_id = MYSQL_RESULT($result,$i,"test_id");
			$test_r = MYSQL_RESULT($result,$i,"test_remarks");
			$test_g = MYSQL_RESULT($result,$i,"test_grade");
			$date_a = MYSQL_RESULT($result,$i,"taken_date_admin");
			$year_a = MYSQL_RESULT($result,$i,"school_year");
			$mon_a = MYSQL_RESULT($result,$i,"month_name");
			$tajweed_results = MYSQL_RESULT($result,$i,"tajweed_marks");
			$reading_results = MYSQL_RESULT($result,$i,"reading_marks");
			$hifz_results = MYSQL_RESULT($result,$i,"hifz_marks");
			$mistakes = MYSQL_RESULT($result,$i,"mistakes");
			$makharij = MYSQL_RESULT($result,$i,"makharij");
			$noon = MYSQL_RESULT($result,$i,"noon_sakin");
			$meem = MYSQL_RESULT($result,$i,"meem_sakin");
			$qalqalah = MYSQL_RESULT($result,$i,"qulqala");
			$guuna = MYSQL_RESULT($result,$i,"guuna");
			$madda = MYSQL_RESULT($result,$i,"madda");
			$msid = MYSQL_RESULT($result,$i,"status_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
?>
<div class="alert alert-warning">
								<strong><?php echo $mon_a; ?>-<?php echo $year_a; ?></strong><br><br>
								<table class="table">
								<tbody>
								<tr>
									<th>Tajweed Test Taken From: <?php if ($msid == 3){ echo '<span class="label label-sm label-danger">Refused or Leave</span>'; } else {echo ''; } ?></th>
									<td>
										<?php if ($makharij == 1){ echo '<span class="label label-sm label-info">MAKHARIJ</span>'; } else {echo ''; }?>
										<?php if ($noon == 1){ echo '<span class="label label-sm label-info">NOON SAKIN</span>'; } else {echo ''; }?>
										<?php if ($meem == 1){ echo '<span class="label label-sm label-info">MEEM SAKIN</span>'; } else {echo ''; }?>
										<?php if ($qalqalah == 1){ echo '<span class="label label-sm label-info">QALQALAH</span>'; } else {echo ''; }?>
										<?php if ($guuna == 1){ echo '<span class="label label-sm label-info">GHUNNA</span>'; } else {echo ''; }?>
										<?php if ($madda == 1){ echo '<span class="label label-sm label-info">MADDA LETTER</span>'; } else {echo ''; }?>
									</td>
								</tr>
								<tr>
									<th>Mistakes Identified:</th>
									<td><?php
								$well= explode(",", $mistakes);
								foreach ($well as $key => $value) {
    if (empty($value))
        echo "";
    else
        echo ''.mis("$value").'<br>';
}
								?></td>
								</tr>
								<tr>
									<th>Marks Obtained in Tajweed:</th>
									<td><span class="label label-sm label-warning" title="Tajweed <?php echo number_format($tajweed_results, 2); ?>%"><?php echo number_format($tajweed_results, 2); ?>%</span></td>
								</tr>
								<?php if ($dept_id == 2 OR $dept_id == 3){
								echo '<tr>
									<th>Marks Obtained in Quran Reading:</th>
									<td><span class="label label-sm label-warning" title="Quran Reading '.number_format($reading_results, 2).'%">'.number_format($reading_results, 2).'%</span></td>
									</tr>
									<tr>
								</tr>';} ?>
								<?php if ($dept_id == 3){
								echo '<tr>
									<th>Marks Obtained in Memorization:</th>
									<td><span class="label label-sm label-warning" title="Hifz Performance '.number_format($hifz_results, 2).'%">'.number_format($hifz_results, 2).'%</span></td>
								</tr>';} ?>
								<tr>
									<th>Overall Performance:</th>
									<td><span class="label label-success"><?php echo number_format(($tajweed_results+$reading_results+$hifz_results)/$dept_id, 2)?>%</span></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								</tbody>
								</table>
								</div>
								<?php 	
		$i++;		
		}
	}	
?>
							
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
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>