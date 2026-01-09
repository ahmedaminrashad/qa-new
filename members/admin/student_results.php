<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  ?>
<?php
$link =base64_decode($_GET["link"]);
$name =base64_decode($_GET["name"]);
$pnid =base64_decode($_GET["Course_ID"]);
	$sql = "SELECT * FROM course Where course_id = $pnid";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$student_name = $row['course_yrSec'];
			$teacher_remarks = $row['remark_teacher'];
			}
			}
?>
<?php
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
<?php
$page_title = 'Student Results';
$page_subtitle = 'Student Results';
$table_name = 'Student Results';
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
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
					</div>
					<!-- END PORTLET-->
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="alert alert-success">
								<strong>Trial Class Remarks:</strong><br> <?php echo $teacher_remarks; ?>
							</div>
                
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
							<?php 
// sending query
$pnid =base64_decode($_GET["Course_ID"]);
$sql = "SELECT `test_results`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `test_results`,`month`,`school_yr` WHERE test_results.m_id=month.month_id and test_results.y_id=school_yr.year_id HAVING course_id = $pnid AND (status_id = 2 or status_id = 3) ORDER BY m_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No record Found';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$t_id = $row['test_id'];
			$test_r = $row['test_remarks'];
			$test_g = $row['test_grade'];
			$date_a = $row['taken_date_admin'];
			$year_a = $row['school_year'];
			$mon_a = $row['month_name'];
			$tajweed_results = $row['tajweed_marks'];
			$reading_results = $row['reading_marks'];
			$hifz_results = $row['hifz_marks'];
			$mistakes = $row['mistakes'];
			$makharij = $row['makharij'];
			$noon = $row['noon_sakin'];
			$meem = $row['meem_sakin'];
			$qalqalah = $row['qulqala'];
			$guuna = $row['guuna'];
			$madda = $row['madda'];
			$msid = $row['status_id'];
			$dept_id = $row['dept_id'];
?>
<div class="alert alert-warning">
								<strong><?php echo $mon_a; ?>-<?php echo $year_a; ?></strong><br><br>
								<div class="table-responsive">
                                        <table class="mb-0 table">
								<tbody>
								<tr>
									<th>Tajweed Test Taken From: <?php if ($msid == 3){ echo '<div class="ml-auto badge badge-danger">Refused or Leave</span>'; } else {echo ''; } ?></th>
									<td>
										<?php if ($makharij == 1){ echo '<div class="ml-auto badge badge-info">MAKHARIJ</div>'; } else {echo ''; }?>
										<?php if ($noon == 1){ echo '<div class="ml-auto badge badge-info">NOON SAKIN</div>'; } else {echo ''; }?>
										<?php if ($meem == 1){ echo '<div class="ml-auto badge badge-info">MEEM SAKIN</div>'; } else {echo ''; }?>
										<?php if ($qalqalah == 1){ echo '<div class="ml-auto badge badge-info">QALQALAH</div>'; } else {echo ''; }?>
										<?php if ($guuna == 1){ echo '<div class="ml-auto badge badge-info">GHUNNA</div>'; } else {echo ''; }?>
										<?php if ($madda == 1){ echo '<div class="ml-auto badge badge-info">MADDA LETTER</div>'; } else {echo ''; }?>
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
									<td><div class="ml-auto badge badge-warning" title="Tajweed <?php echo number_format($tajweed_results, 2); ?>%"><?php echo number_format($tajweed_results, 2); ?>%</div></td>
								</tr>
								<?php if ($dept_id == 2 OR $dept_id == 3){
								echo '<tr>
									<th>Marks Obtained in Quran Reading:</th>
									<td><div class="ml-auto badge badge-warning" title="Quran Reading '.number_format($reading_results, 2).'%">'.number_format($reading_results, 2).'%</div></td>
									</tr>
									<tr>
								</tr>';} ?>
								<?php if ($dept_id == 3){
								echo '<tr>
									<th>Marks Obtained in Memorization:</th>
									<td><div class="ml-auto badge badge-warning" title="Hifz Performance '.number_format($hifz_results, 2).'%">'.number_format($hifz_results, 2).'%</div></td>
								</tr>';} ?>
								<tr>
									<th>Overall Performance:</th>
									<td><div class="ml-auto badge badge-success"><?php echo number_format(($tajweed_results+$reading_results+$hifz_results)/$dept_id, 2)?>%</div></td>
								</tr>
								<tr>
									<th><a href="delete-test?pT=<?php echo $t_id; ?>" onclick="return confirm('<?php echo "Are you sure about deletion of test of ". $s_name. " ?"; ?>');">
															<button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a></th>
									<td></td>
								</tr>
								</tbody>
								</table>
								</div>
								<?php 	
		}
	}	
?>
							
						</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>