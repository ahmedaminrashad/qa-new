<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
  include("load-data-files/home-functions.php");
?>
<?php
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
<?php
$page_title = 'Expense Report';
$page_subtitle = 'Expense Report';
$table_name = 'Expense Report';
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
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="expense-report">
										<label>Select Year</label>
											<select class="form-control input-small select2me" data-placeholder="Select..." name="year_id"  id="year_id" onchange="this.form.submit()">
												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['school_year'];?>" <?php if ($row['school_year'] == $yeaid) { echo 'selected';} ?>><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>
											</form>
                                    <br><h5 class="card-title">Expense Report</h5>
                                <script src="./assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="./assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
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
                    </div>
                    <!-- Table Row End -->
					<!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
									 <b><?php echo gavg("12","$yeaid"); ?></b>
								</td>
							</tr>
								</tbody>
								</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
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
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
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