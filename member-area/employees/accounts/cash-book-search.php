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
  include("../includes/session.php");
  include("../includes/accounts_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
function tot($y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $second-$first;
echo $total;
}
function pa_d($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date = '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
echo $first;
}
function re_d($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date = '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
echo $first;
}
?>
<?php
$monid =$_REQUEST['month_id'];
$yeaid =$_REQUEST['year_id'];
date_default_timezone_set("Asia/Karachi");
$sy = ''.$yeaid.'-'.$monid.'-01';
$year = $yeaid;
$month = $monid;
$month_n = date('F');
$pre_year = $year-1;
$pre_month_n = date('m', strtotime('-1 month'));
$datestring=''.$sy.' last day of last month';
$dt=date_create($datestring);
$pre_date = $dt->format("Y-m-d");
$cun_date = date("Y-m-t", strtotime($sy));
?>
<?php echo $main_header; ?>
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script></head>
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
				<h1>List <small>of Vouchers</small></h1>

			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
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
				<li class="active">
					 Cash Book for <?php echo $month_n; ?>-<?php echo $year; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM account_entry Where MONTH(date) = $month and YEAR(date) = $year");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Entries: $numberOfRows"; ?> for <?php echo $month_n; ?>-<?php echo $year; ?></h4>
<a class="btn default" data-target="#full-width" data-toggle="modal">
									View Previous Records</a>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Date
								</th>
								<th>
									 See Details
								</th>
								<th>
									 Dr.
								</th>
								<th>
									 Cr.
								</th>
								<th>
									 Balance
								</th>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="">
								<td>--</td>
								<td>--</td>
								<td><strong>Opening Balance</strong></td>
								<td>--</td>
								<td>--</td>
								<td>
									 <strong><?php echo tot("$pre_date"); ?></strong>
								</td>
								</tr>
								<?php 
// sending query
$result = mysql_query("SELECT `account_entry`.*, `bank_account`.`bank_name`, `accounts_head`.`account_head_name`, `voucher`.`voucher_num` FROM `account_entry`,`bank_account`,`accounts_head`,`voucher` WHERE account_entry.bank_id=bank_account.bank_id and account_entry.account_head=accounts_head.account_head_id and account_entry.voucher_id=voucher.voucher_id GROUP BY date HAVING MONTH(date) = $month AND YEAR(date) = $year ORDER BY date");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Entry Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$en_id = MYSQL_RESULT($result,$i,"entry_id");
			$en_date = MYSQL_RESULT($result,$i,"date");
			$en_vou = MYSQL_RESULT($result,$i,"voucher_id");
			$en_voun = MYSQL_RESULT($result,$i,"voucher_num");
			$en_des = MYSQL_RESULT($result,$i,"description");
			$en_ven = MYSQL_RESULT($result,$i,"vendor_id");
			$en_cat = MYSQL_RESULT($result,$i,"ac_cat_id");
			$en_head = MYSQL_RESULT($result,$i,"account_head");
			$en_bid = MYSQL_RESULT($result,$i,"bank_id");
			$en_bname = MYSQL_RESULT($result,$i,"bank_name");
			$en_head_name = MYSQL_RESULT($result,$i,"account_head_name");
			$en_amu = MYSQL_RESULT($result,$i,"amount");
?>
								<tr bgcolor="">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php $date1=date_create("$en_date"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $en_date; ?>">Click</a>
								</td>
								<td>
									 <?php echo re_d("$en_date"); ?>
								</td>
								<td>
									 <?php echo pa_d("$en_date"); ?>
								</td>
								<td>
									 <?php echo tot("$en_date"); ?>
								</td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								<tr bgcolor="">
								<td>--</td>
								<td>--</td>
								<td><strong>Closing Balance</strong></td>
								<td>--</td>
								<td>--</td>
								<td>
									 <strong><?php echo tot("$cun_date"); ?></strong>
								</td>
								</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<div id="full-width" class="modal container fade" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								</div>
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-chevron-right"></i>Search For Previous Month Class History
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="cash-book-search" method="GET" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section">Please Select Desired Month and Year</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Month</label>
															<div class="col-md-9">
																<select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM month ORDER BY month_id ");			  	
				do {  ?>
  <option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
																<span class="help-block">
																Please Select Month. </span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Year</label>
															<div class="col-md-9">
															<select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<span class="help-block">
																Please Select Year. </span>

<input type="hidden" id="Course_ID" name="Course_ID"  value="<?php echo base64_encode($Course_ID); ?>" />

															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
				</div>
<?php echo $fot; ?>
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    
    $.ajax({url:"entry-details-cash.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>