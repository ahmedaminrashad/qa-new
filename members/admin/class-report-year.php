<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  require ("load-data-files/class-functions.php");
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
                                <div class="card-body"><form id="signupForm" class="col-md-10 mx-auto" method="post" action="class-report-year">
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
                                    <br><h5 class="card-title">All Classes of Year <?php echo $yeaid; ?></h5>
                                    <script src="./assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="./assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/class-data-year.php?year_id=<?php echo $yeaid; ?>"
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
                "title": "Taken",
                "type": "column",
                "valueField": "taken"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Absent",
                "type": "column",
                "valueField": "absent"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Leave",
                "type": "column",
                "valueField": "leave"
            },{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Declined",
                "type": "column",
                "valueField": "declined"
            },{
                "alphaField": "alpha",
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
									 Total
								</td>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <b>Taken</b>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="green"><?php echo taken_all("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="green"><b><?php echo taken_all_year("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Absent</b>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo absent_all("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="red"><b><?php echo absent_all_year("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Leave</b>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="blue"><?php echo leave_all("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="blue"><b><?php echo leave_all_year("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Declined</b>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes1" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="purple"><?php echo declined_all("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="purple"><b><?php echo declined_all_year("$yeaid"); ?></b></font>
								</td>
							</tr>
							<tr>
								<td>
									 <b>Pending</b>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("05","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("06","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("07","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes3" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>"><font color="red"><?php echo pending_all("12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="red"><b><?php echo pending_all_year("$yeaid"); ?></b></font>
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
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>

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