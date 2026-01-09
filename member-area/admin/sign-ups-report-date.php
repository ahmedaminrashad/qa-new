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
  include("load-data-files/signup-functions.php");
  $s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
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
								<span class="caption-subject theme-font bold uppercase">Sign-ups Vs Regulars For Year <?php echo $yeaid; ?></span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row list-separated">
								<div class="col-md-2 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Trials Over
									</div>
									<div class="uppercase font-hg font-red-flamingo">
										 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="trial_date"><i class="fa fa-child"></i> <?php echo trials("$s_date","$e_date"); ?></a>
									</div>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Regulars
									</div>
									<div class="uppercase font-hg theme-font">
										 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="regular_date"><i class="fa fa-graduation-cap"></i> <?php echo regulars("$s_date","$e_date"); ?></a>
									</div>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Leave Over
									</div>
									<div class="uppercase font-hg font-purple">
										 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="leave_date"><i class="fa fa-history"></i> <?php echo leave("$s_date","$e_date"); ?></a>
									</div>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Suspensions
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="suspension_date"><i class="fa fa-thumbs-o-down"></i> <?php echo suspended("$s_date","$e_date"); ?></a>
									</div>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-6">
									<div class="font-grey-mint font-sm">
										 Deactivations
									</div>
									<div class="uppercase font-hg font-blue-sharp">
										 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="deactivation_date"><i class="fa fa-thumbs-o-down"></i> <?php echo lefts("$s_date","$e_date"); ?></a>
									</div>
								</div>
								</div>
							</div>
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/date-sign-ups.php?start_date=<?php echo $s_date; ?>&end_date=<?php echo $e_date; ?>"
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
                "title": "Trials Ended",
                "type": "column",
                "valueField": "trial"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Total Regulars",
                "type": "column",
                "valueField": "regular"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Leaves Over",
                "type": "column",
                "valueField": "leave"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Suspensions Over",
                "type": "column",
                "valueField": "suspend"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Deactivations",
                "type": "column",
                "valueField": "left"
            }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "date",
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
    var Date1=$(this).attr('s-date');
    var Date2=$(this).attr('e-date');
    var name=$(this).attr('name');

    $.ajax({url:"sign-ups-list-trial.php?Date1="+Date1+"&Date2="+Date2+"&name="+name,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>