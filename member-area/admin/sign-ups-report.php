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
				<h1>Sign-Ups<small> Sign-Ups vs Regulars</small></h1>
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
					 Sign-Ups Statistics
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
								<span class="caption-subject theme-font bold uppercase">Sign-ups Vs Regulars For Year <?php echo $yeaid; ?></span><form action="sign-ups-report" method="GET" class="form-horizontal form-row-sepe">
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
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/year-sign-ups.php?year_id=<?php echo $yeaid; ?>"
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
                "title": "All Sign-Ups",
                "type": "column",
                "valueField": "all_request"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Allocated",
                "type": "column",
                "valueField": "request"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Trials",
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
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <b>Mo.</b>
								</td>
								<td>
									 Jan
								</td>
								<td>
									 Feb
								</td>
								<td>
									 Mar
								</td>
								<td>
									 Apr
								</td>
								<td>
									 May
								</td>
								<td>
									 Jun
								</td>
								<td>
									 Jul
								</td>
								<td>
									 Aug
								</td>
								<td>
									 Sep
								</td>
								<td>
									 Oct
								</td>
								<td>
									 Nov
								</td>
								<td>
									 Dec
								</td>
								<td>
									 Total
								</td>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <b>Sign-Ups</b>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests_all("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="green"><b><?php echo requests_total("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Attended</b>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo requests("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="green"><b><?php echo requests_att("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Trials</b>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo trials("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="red"><b><?php echo trials_total("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Regular</b>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo regulars("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="red"><b><?php echo regulars_total("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Lefts</b>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo leftsall("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="red"><b>--</b></font>
								</td>
							</tr>
							<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <b>Reg%</b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("01","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("02","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("03","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("04","$yeaid"); ?></b>
								</td>
								<td>
									<b><?php echo req_reg_ratio("05","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("06","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("07","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("08","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("09","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("10","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("11","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio("12","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo req_reg_ratio_year("$yeaid"); ?></b>
								</td>
							</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
			<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Sign-ups Vs Websites For Year <?php echo $yeaid; ?></span><form action="sign-ups-report" method="GET" class="form-horizontal form-row-sepe">
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
<div id="chart1div" style="width:100%;height:300px;"></div>
<script>
var chart1 = AmCharts.makeChart("chart1div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/year-sign-ups-site.php?year_id=<?php echo $yeaid; ?>"
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
                "title": "Tarteel.com",
                "type": "column",
                "valueField": "site01"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Tarteel.co.uk",
                "type": "column",
                "valueField": "site02"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Tarteel.com.au",
                "type": "column",
                "valueField": "site03"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Learntoreadonline.com",
                "type": "column",
                "valueField": "site04"
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
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <b>Mo.</b>
								</td>
								<td>
									 Jan
								</td>
								<td>
									 Feb
								</td>
								<td>
									 Mar
								</td>
								<td>
									 Apr
								</td>
								<td>
									 May
								</td>
								<td>
									 Jun
								</td>
								<td>
									 Jul
								</td>
								<td>
									 Aug
								</td>
								<td>
									 Sep
								</td>
								<td>
									 Oct
								</td>
								<td>
									 Nov
								</td>
								<td>
									 Dec
								</td>
								<td>
									 Total
								</td>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <b>Site 01</b>
								</td>
								<td>
									 <?php echo site_all("01","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("02","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("03","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("04","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("05","$yeaid","1"); ?>
								</td>
								<td>
									<?php echo site_all("06","$yeaid","1"); ?>
								</td>
								<td>
									<?php echo site_all("07","$yeaid","1"); ?>
								</td>
								<td>
									<?php echo site_all("08","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("09","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("10","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("11","$yeaid","1"); ?>
								</td>
								<td>
									 <?php echo site_all("12","$yeaid","1"); ?>
								</td>
								<td>
									 <b><?php echo site_total("$yeaid","1"); ?></b>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Site 02</b>
								</td>
								<td>
									 <?php echo site_all("01","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("02","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("03","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("04","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("05","$yeaid","2"); ?>
								</td>
								<td>
									<?php echo site_all("06","$yeaid","2"); ?>
								</td>
								<td>
									<?php echo site_all("07","$yeaid","2"); ?>
								</td>
								<td>
									<?php echo site_all("08","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("09","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("10","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("11","$yeaid","2"); ?>
								</td>
								<td>
									 <?php echo site_all("12","$yeaid","2"); ?>
								</td>
								<td>
									 <b><?php echo site_total("$yeaid","2"); ?></b>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Site 03</b>
								</td>
								<td>
									 <?php echo site_all("01","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("02","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("03","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("04","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("05","$yeaid","3"); ?>
								</td>
								<td>
									<?php echo site_all("06","$yeaid","3"); ?>
								</td>
								<td>
									<?php echo site_all("07","$yeaid","3"); ?>
								</td>
								<td>
									<?php echo site_all("08","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("09","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("10","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("11","$yeaid","3"); ?>
								</td>
								<td>
									 <?php echo site_all("12","$yeaid","3"); ?>
								</td>
								<td>
									 <b><?php echo site_total("$yeaid","3"); ?></b>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Site 04</b>
								</td>
								<td>
									 <?php echo site_all("01","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("02","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("03","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("04","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("05","$yeaid","4"); ?>
								</td>
								<td>
									<?php echo site_all("06","$yeaid","4"); ?>
								</td>
								<td>
									<?php echo site_all("07","$yeaid","4"); ?>
								</td>
								<td>
									<?php echo site_all("08","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("09","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("10","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("11","$yeaid","4"); ?>
								</td>
								<td>
									 <?php echo site_all("12","$yeaid","4"); ?>
								</td>
								<td>
									 <b><?php echo site_total("$yeaid","4"); ?></b>
								</td>
							</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
			<!-- BEGIN PORTLET-->
					<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="notes-d1" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
					<!-- END PORTLET-->
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.year_id.value = ("<?php echo $yeaid; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
$('.notes2').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"sign-ups-details-trial.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.notes3').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"sign-ups-details-de.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.notes1').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"sign-ups-details-regular.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"sign-ups-details.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>