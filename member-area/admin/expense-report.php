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

  include("../includes/session1.php");
  include("header-main.php");
  include("load-data-files/home-functions.php");
  
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$mm_id = date('m');
$yeaid = isset($_REQUEST['year_id']) ? $_REQUEST['year_id'] : '';
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
				<h1>Statistics<small> Expense Revenue</small></h1>
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
					 Expense Revenue Statistics
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
								<span class="caption-subject theme-font bold uppercase">Expense vs Revenues For Year <?php echo $yeaid; ?></span><form action="expense-report" method="GET" class="form-horizontal form-row-sepe">
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
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/year-expense.php?year_id=<?php echo $yeaid; ?>"
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
									 Avg
								</td>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <b>RR</b>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("01","$yeaid"); ?>"><font color="green"><?php echo rsum("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("02","$yeaid"); ?>"><font color="green"><?php echo rsum("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("03","$yeaid"); ?>"><font color="green"><?php echo rsum("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("04","$yeaid"); ?>"><font color="green"><?php echo rsum("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("05","$yeaid"); ?>"><font color="green"><?php echo rsum("05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("06","$yeaid"); ?>"><font color="green"><?php echo rsum("06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("07","$yeaid"); ?>"><font color="green"><?php echo rsum("07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("08","$yeaid"); ?>"><font color="green"><?php echo rsum("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("09","$yeaid"); ?>"><font color="green"><?php echo rsum("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("10","$yeaid"); ?>"><font color="green"><?php echo rsum("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("11","$yeaid"); ?>"><font color="green"><?php echo rsum("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo rsum("12","$yeaid"); ?>"><font color="green"><?php echo rsum("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="green"><b><?php echo ravg("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>EXP</b>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("01","$yeaid"); ?>"><font color="red"><?php echo psum("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("02","$yeaid"); ?>"><font color="red"><?php echo psum("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("03","$yeaid"); ?>"><font color="red"><?php echo psum("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("04","$yeaid"); ?>"><font color="red"><?php echo psum("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("05","$yeaid"); ?>"><font color="red"><?php echo psum("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("06","$yeaid"); ?>"><font color="red"><?php echo psum("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("07","$yeaid"); ?>"><font color="red"><?php echo psum("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("08","$yeaid"); ?>"><font color="red"><?php echo psum("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("09","$yeaid"); ?>"><font color="red"><?php echo psum("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("10","$yeaid"); ?>"><font color="red"><?php echo psum("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("11","$yeaid"); ?>"><font color="red"><?php echo psum("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d1" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>" data-value="<?php echo psum("12","$yeaid"); ?>"><font color="red"><?php echo psum("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="red"><b><?php echo pavg("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <b>Exp%</b>
								</td>
								<td>
									 <b><?php echo totavg("01","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("02","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("03","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("04","$yeaid"); ?></b>
								</td>
								<td>
									<b><?php echo totavg("05","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("06","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("07","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("08","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("09","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("10","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("11","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo totavg("12","$yeaid"); ?></b>
								</td>
								<td>
									 <b><?php echo gavg("$yeaid"); ?></b>
								</td>
							</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
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
                "title": "Surplus Curve",
                "valueField": "curve"
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
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"expense-report-details-income.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.notes1').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"expense-report-details.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>