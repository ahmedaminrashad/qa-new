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
$yeaid =$_REQUEST['year_id'];
$cat_id =$_REQUEST['cat_id'];
$name =$_REQUEST['name'];
$link =$_REQUEST['link'];
function psumi($a, $m, $y){
$sql = "select sum(amount) from account_entry where account_head = $a AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
if ($second == 0){
echo '--';
}
else {
echo number_format($second, 0);
}
}
function psumt($a, $y){
$sql = "select sum(amount) from account_entry where account_head = $a AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 0);
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
<?php echo $search_bar; ?>
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
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?php echo $link; ?>">Go Back</a><i class="fa fa-circle"></i>
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
								<span class="caption-subject theme-font bold uppercase">Accounts Report for <font color="green"><?php echo $name; ?></font> Year: <?php echo $yeaid; ?></span>							</div>
						</div>
						<div class="portlet-body">

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
					<div class="portlet light">
						<div class="portlet-body">
						<h3>Accounts Report for <font color="green"><?php echo $name; ?></font> Year: <?php echo $yeaid; ?></h3>
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
$result = mysql_query("SELECT * FROM accounts_head WHERE account_cat_id = $cat_id");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
	
				$head_id = MYSQL_RESULT($result,$i,"account_head_id");
			$head_cat_id = MYSQL_RESULT($result,$i,"account_cat_id");
			$head_name = MYSQL_RESULT($result,$i,"account_head_name");
			$head_note = MYSQL_RESULT($result,$i,"note");
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
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo '10'; ?>" data-name="<?php echo $yeaid; ?>" data-base="<?php echo $head_cat_id; ?>" data-base2="<?php echo $head_id; ?>" data-value="<?php echo psumi("$head_id","$yeaid"); ?>"><font color="green"><?php echo psumi("$head_id","10","$yeaid"); ?></font></a>
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
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
					<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
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