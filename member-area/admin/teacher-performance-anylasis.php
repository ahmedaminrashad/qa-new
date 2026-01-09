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
  include("header-main.php");
  include("load-data-files/home-functions.php");
  $link = $_SERVER['REQUEST_URI'];
  $csr_id =$_REQUEST['csr'];
  $csr_name =$_REQUEST['name'];
  $yy_id = $_REQUEST['year'];
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$mm_id = date('m');
$yeaid =$_REQUEST['year_id'];
$yy_id = date('Y');
$year1 = date('Y');
$month1 = date('m');
$month_n = date('M');
$year1sm = date('y');
$ddd1 = ''.$year1.'-'.$month1.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
function perform($er, $m, $y)
{
$sql = "SELECT SUM(attendence+test+teaching+language+subject+attentiveness+dress_code+behaviour+discipline+complaints) FROM teacher_performance_c where MONTH(date) = $m AND YEAR(date) = $y AND teacher_id = $er"; 
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if ($row[0] == 0){
echo '--';
}
else{
$total = $row[0]/11;
echo ''.number_format($total, 2).'%';
						}
}
function attMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"attendence");
			echo $c_att;
}
}
function testMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"test");
			echo $c_att;
}
}
function teachingMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"teaching");
			echo $c_att;
}
}
function lanMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"language");
			echo $c_att;
}
}
function subMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"subject");
			echo $c_att;
}
}
function antMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"attentiveness");
			echo $c_att;
}
}
function dressMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"dress_code");
			echo $c_att;
}
}
function bhrMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"behaviour");
			echo $c_att;
}
}
function dicMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"discipline");
			echo $c_att;
}
}
function compMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"complaints");
			echo $c_att;
}
}
function classesMonthly($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"classes");
			echo $c_att;
}
}
function notes($er, $m, $y){
$result = mysql_query("SELECT * FROM teacher_performance_c WHERE teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '--';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$c_att = MYSQL_RESULT($result,$i,"note");
			echo $c_att;
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
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>CSR<small> Performance</small></h1>

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
					<a href="dashboard">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 CSR Performance Report
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
					<div class="col-sm-12">
			<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Expense vs Revenues For Year <?php echo $yeaid; ?></span><form action="expense-head-report" method="GET" class="form-horizontal form-row-sepe">
										<label class="control-label">Select Year</label>
											<select class="form-control input-small select2me" data-placeholder="Select..." name="year_id"  id="year_id" onchange="this.form.submit()">
												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
											</form>
							</div>
						</div>
						<div class="portlet-body">
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/year-performance.php?year_id=<?php echo $yy_id; ?>&csr=<?php echo $csr_id; ?>"
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
                "title": "Performance",
                "valueField": "Performance"
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
					</div>
					<!-- END PORTLET-->
					<div class="portlet light">
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Month
								</th>
								<th>
									 Jan
								</th>
								<th>
									 Feb
								</th>
								<th>
									 Mar
								</th>
								<th>
									 Apr
								</th>
								<th>
									 May
								</th>
								<th>
									 Jun
								</th>
								<th>
									 Jul
								</th>
								<th>
									 Aug
								</th>
								<th>
									 Sep
								</th>
								<th>
									 Oct
								</th>
								<th>
									 Nov
								</th>
								<th>
									 Dec
								</th>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 Attendence
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo attMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo attMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo attMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Test
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo testMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo testMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo testMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Teaching
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo teachingMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo teachingMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo teachingMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Comunication
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo lanMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo lanMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo lanMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Knowledge
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo subMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo subMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo subMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Attentiveness
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo antMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo antMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo antMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Dress Code
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo dressMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dressMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo dressMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Behaviour
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo bhrMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo bhrMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo bhrMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Dicipline
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo dicMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo dicMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo dicMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Complaints
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo compMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo compMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo compMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Classes
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","01","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","02","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","03","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","04","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","05","$yy_id"); ?>
								</td>
								<td>
									<?php echo classesMonthly("$csr_id","06","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","07","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","08","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","09","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","10","$yy_id"); ?>
								</td>
								<td>
									 <?php echo classesMonthly("$csr_id","11","$yy_id"); ?>
								</td>
								<td>
									<?php echo classesMonthly("$csr_id","12","$yy_id"); ?>
								</td>
								</tr>
								<tr>
								<td>
									 Average Performance
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","01","$yy_id"); ?>"><?php echo perform("$csr_id","01","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","02","$yy_id"); ?>"><?php echo perform("$csr_id","02","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","03","$yy_id"); ?>"><?php echo perform("$csr_id","03","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","04","$yy_id"); ?>"><?php echo perform("$csr_id","04","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","05","$yy_id"); ?>"><?php echo perform("$csr_id","05","$yy_id"); ?></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","06","$yy_id"); ?>"><?php echo perform("$csr_id","06","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","07","$yy_id"); ?>"><?php echo perform("$csr_id","07","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","08","$yy_id"); ?>"><?php echo perform("$csr_id","08","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","09","$yy_id"); ?>"><?php echo perform("$csr_id","09","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","10","$yy_id"); ?>"><?php echo perform("$csr_id","10","$yy_id"); ?></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","11","$yy_id"); ?>"><?php echo perform("$csr_id","11","$yy_id"); ?></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo perform("$csr_id","12","$yy_id"); ?>"><?php echo perform("$csr_id","12","$yy_id"); ?></a>
								</td>
								</tr>
								</tbody>
								</table>
								</table>
							</div>
						</div>
					</div>
					</div>
					<!-- END PORTLET-->
					<!-- END SAMPLE TABLE PORTLET-->
					<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.year_id.value = ("<?php echo $yeaid; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"per-note-details.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>