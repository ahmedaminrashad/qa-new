<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("load-data-files/home-functions.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
function today($var1, $var2)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM class_history WHERE date_admin = '$var1' and monitor_id = '$var2'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows;
}
  function group_name($var)
  {
  require ("../includes/dbconnection.php");
 $sql = "SELECT * FROM employee_catagory WHERE cat_id = $var";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){ echo 'General';}
else{
	while($row = mysqli_fetch_assoc($result)){		
		
			$hidden_pcourse = $row['cat_id'];
			$hidden_proom = $row['cat_name'];
			echo $hidden_proom;		 
			}
			}
	}
  function pen_task()
  	{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM task WHERE status = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function active_ann($d)
  	{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM announcement WHERE ann_date <= '$d' AND ann_end >= '$d'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
$data_date = date('Y-m-d', time());
$date = date('d/m/Y', time());
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
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
<?php
function csr_active($var)//currently active request
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where csr_id = $var AND status = 7";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function csr_remove($var)//currently removed
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where csr_id = $var AND status = 6";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function csr_trials($var)//schedule trial this month
{
$mm_id = date('m');
$yy_id = date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function csr_regulars($var)//regulars this month
{
$mm_id = date('m');
$yy_id = date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function csr_per($var)//performance average all
{
$mm_id = date('m');
$yy_id = date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id";
$counter = 0;
$result = mysqli_query($conn, $sql);
$regular = mysqli_num_rows($result);
$sql = "SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id";
$counter = 0;
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
$avg = ($regular/$total)*100;
echo number_format($avg, 2);
}
?>
<?php
$page_title = 'Admin Dashboard';
$page_subtitle = 'Class Details for Today!';
$table_name = 'Countries';
?>
<?php echo $main_header; ?>
<head>
<style>
.amcharts-chart-div a {display:none !important;}
</style>
</head>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Class Dashboard Start-->
                    <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="grid-menu grid-menu-3col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-all?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-primary"><i class="lnr-laptop-phone btn-icon-wrapper"> </i>Total <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-taken-classes?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-success"><i class="lnr-thumbs-up btn-icon-wrapper"> </i>Taken <?php echo today("$data_date", "9"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-remaining-classes?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary"><i class="lnr-redo btn-icon-wrapper"> </i>Remaining <?php echo today("$data_date", "1"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-absents?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger"><i class="lnr-neutral btn-icon-wrapper"> </i>Absent <?php echo today("$data_date", "4"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-leaves?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning"><i class="lnr-highlight btn-icon-wrapper"> </i>Leave <?php echo today("$data_date", "5"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-running-classes?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-info"><i class="lnr-bicycle btn-icon-wrapper"> </i>Runing <?php echo today("$data_date", "3"); ?></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="grid-menu grid-menu-3col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-declined?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger"><i class="lnr-sad btn-icon-wrapper"> </i>Declined <?php echo today("$data_date", "6"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-suspended?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger"><i class="lnr-hand btn-icon-wrapper"> </i>Suspended <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 17";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-on-trial?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning"><i class="lnr-history btn-icon-wrapper"> </i>Trials <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date'AND status = 11";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-advance?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-info"><i class="pe-7s-graph1 btn-icon-wrapper"> </i>Advance <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 19";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-rescheduled?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning"><i class="lnr-clock btn-icon-wrapper"> </i>Re-Scheduled <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 20";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-current-classes"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-primary"><i class="lnr-hourglass btn-icon-wrapper"> </i>See Current Classes</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Class Dashboard ENd-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">NEW SIGN-UPS REPORT</h5>
                                    <script src="./assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="./assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<a href="sign-ups-report?year_id=<?php echo $yy_id; ?>"><div id="chart1div" style="width:100%;height:300px;"></div></a>
<script>
var chart1 = AmCharts.makeChart("chart1div", {
  "type": "serial",
  "dataLoader": {
    "url": "./load-data-files/sign-ups-data.php"
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
                        </div>
                        <!-- Table Row End-->
                        <!-- Table Row Start-->
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Service Report</h5>
                                    <script src="assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
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
                        </div>
                        <!-- Table Row End -->
                        <!-- Table Row Start-->
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">New Students</h5>
                                    <script src="assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<a href="sign-ups-report?year_id=<?php echo $yy_id; ?>"><div id="chart7div" style="width:100%;height:300px;"></div></a>
<script>
var chart7 = AmCharts.makeChart("chart7div", {
"type": "serial",
"dataLoader": {
"url": "load-data-files/new-students.php"
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
"title": "Become Regular",
"type": "column",
"valueField": "family"
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
"title": "Active",
"valueField": "student"
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
"title": "Active to Left",
"valueField": "rate"
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
chart7.dataProvider = AmCharts.parseJSON(data);
chart7.validateData();
});
}
</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table Row End -->
                        <!-- Table Row Start-->
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Payments</h5>
                                    <script src="assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<a href="sign-ups-report?year_id=<?php echo $yy_id; ?>"><div id="chart14div" style="width:100%;height:300px;"></div></a>
<script>
var chart14 = AmCharts.makeChart("chart14div", {
"type": "serial",
"dataLoader": {
"url": "load-data-files/invoices.php"
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
"lineColor": "#62cf73",
"fillColors": "#62cf73",
"balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
"dashLengthField": "dashLengthColumn",
"fillAlphas": 1,
"title": "Received",
"type": "column",
"valueField": "student"
},{
"lineColor": "#902c2d",
"fillColors": "#902c2d",
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
"title": "Total",
"valueField": "family"
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
chart14.dataProvider = AmCharts.parseJSON(data);
chart14.validateData();
});
}
</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table Row End -->
                        <!-- Table Row Start-->
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Monthly Class Report</h5>
                                    <script src="assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<a href="class-report-year?year_id=<?php echo $yy_id; ?>"><div id="chart11div" style="width:100%;height:300px;"></div></a>
<script>
var chart11 = AmCharts.makeChart("chart11div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/class-data.php"
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
                "lineColor": "#BCF5A9",
                "fillColors": "#BCF5A9",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Taken",
                "type": "column",
                "valueField": "taken"
            },{
                "alphaField": "alpha",
                "lineColor": "#F9BCBC",
                "fillColors": "#F9BCBC",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Absent",
                "type": "column",
                "valueField": "absent"
            },{
                "alphaField": "alpha",
                "lineColor": "#C3C3FA",
                "fillColors": "#C3C3FA",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Leave",
                "type": "column",
                "valueField": "leave"
            },{
                "alphaField": "alpha",
                "lineColor": "#CEECF5",
                "fillColors": "#CEECF5",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Declined",
                "type": "column",
                "valueField": "declined"
            },{
                "alphaField": "alpha",
                "lineColor": "#902c2d",
                "fillColors": "#902c2d",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Pending",
                "type": "column",
                "valueField": "pending"
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
    chart11.dataProvider = AmCharts.parseJSON(data);
    chart11.validateData();
  });
}
</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table Row End -->
                        <!-- Table Row Start-->
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Taken VS Absent + Declined</h5>
                                    <script src="assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<a href="class-report-year?year_id=<?php echo $yy_id; ?>"><div id="chart12div" style="width:100%;height:300px;"></div></a>
<script>
var chart12 = AmCharts.makeChart("chart12div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/class-data.php"
  },
  "valueAxes": [{
    "gridColor": "#697B15",
    "gridAlpha": 0.2,
    "dashLength": 2
  }],
  "gridAboveGraphs": true,
  "startDuration": 1,
            "graphs": [{
                "lineColor": "#62cf73",
"fillColors": "#62cf73",
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
"title": "Total Taken",
"valueField": "taken"
},{
    "lineColor": "#902c2d",
"fillColors": "#902c2d",
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
"title": "Absent + Declined",
"valueField": "AbsDec"
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
"title": "Persentage",
"valueField": "rate"
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
    chart12.dataProvider = AmCharts.parseJSON(data);
    chart12.validateData();
  });
}
</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table Row End -->
                    </div>
                    
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>