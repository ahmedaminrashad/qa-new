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
  $link = $_SERVER['REQUEST_URI'];
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
function psumi($h, $m, $y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = $h AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
if ($second == 0){
echo '--';
}
else {
echo number_format($second, 0);
}
}
function psumt($h, $y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = $h AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 0);
}
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="expense-head-report">
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
								<th>
									 <b>Mo.</b>
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
								<th>
									 Avg
								</th>
							</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM accounts_cat";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
	
				$head_cat_id = $row['accounts_cat_id'];
			$head_cat_name = $row['accounts_cat_name'];
			$head_cat_status = $row['status'];
?>
								<tr>
								<td>
									 <a href="expense-account-head-report?year_id=<?php echo $yeaid; ?>&cat_id=<?php echo $head_cat_id; ?>&name=<?php echo $head_cat_name; ?>&link=<?php echo $link; ?>"><b><?php echo $head_cat_name; ?></b></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","01","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","02","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","03","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","04","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","05","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","06","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","07","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","08","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","09","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","10","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","11","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-value="<?php echo psumi("$head_cat_id","12","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_cat_id","12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="green"><b><?php echo psumt("$head_cat_id","$yeaid"); ?></b></font>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.year_id.value = ("<?php echo $yeaid; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
$('.notes').click(function(){
    var famMonth=$(this).attr('data-id');
    var famYear=$(this).attr('data-name');
    var famID=$(this).attr('data-base');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"expense-head-report-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>