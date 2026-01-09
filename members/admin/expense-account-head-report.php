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
?>
<?php
$yeaid =$_REQUEST['year_id'];
$cat_id =$_REQUEST['cat_id'];
$name =$_REQUEST['name'];
$link =$_REQUEST['link'];
function psumi($a, $m, $y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where account_head = $a AND MONTH(date) = $m AND YEAR(date) = $y";
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
function psumt($a, $y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where account_head = $a AND YEAR(date) = $y";
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
                                <div class="card-body"><h5 class="card-title">Expense Report</h5>
                                <script src="./assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="./assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
  "type": "serial",
  "dataLoader": {
    "url": "load-data-files/expense-head-analyses.php?year_id=<?php echo $yeaid; ?>&h_id=<?php echo $cat_id; ?>"
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
                "title": "Surplus",
                "type": "column",
                "valueField": "amount"
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
									 Total
								</th>
							</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM accounts_head WHERE account_cat_id = $cat_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
	
				$head_id = $row['account_head_id'];
			$head_cat_id = $row['account_cat_id'];
			$head_name = $row['account_head_name'];
			$head_note = $row['note'];
?>
								<tr>
								<td>
									 <b><?php echo $head_name; ?></b>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '01'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","01","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","01","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '02'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","02","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","02","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '03'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","03","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","03","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '04'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","04","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","04","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '05'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","05","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","05","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '06'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","06","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","06","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '07'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","07","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","07","$yeaid"); ?></font></a>
								</td>
								<td>
									<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '08'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","08","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","08","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '09'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","09","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","09","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","10","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","10","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '11'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","11","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","11","$yeaid"); ?></font></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '12'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","12","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","12","$yeaid"); ?></font></a>
								</td>
								<td>
									 <font color="green"><b><?php echo psumt("$head_id","$yeaid"); ?></b></font>
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
    var famID2=$(this).attr('data-base2');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"expense-account-head-report-details.php?famID2="+famID2+"&famMonth="+famMonth+"&famYear="+famYear+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>