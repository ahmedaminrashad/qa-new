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
  include("header-accounts.php");
  $month =$_REQUEST['month_id'];
  $year =$_REQUEST['year_id'];
  $month_n =$_REQUEST['mon_name'];
function psum($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 10) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function rsum($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function tot($m, $y){
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 10) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $y";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $second-$first;
if($total >= 0) 
        {
            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light green-haze">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 '.number_format($total, 0).'
						</div>
						<div class="desc">
							 Surplus
						</div>
					</div>
					</a>
				</div>';
        }
    else
        {
            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light red-intense">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 '.number_format($total, 0).'
						</div>
						<div class="desc">
							 Deficit
						</div>
					</div>
					</a>
				</div>';
        }
}
function psumi($h){
$month =$_REQUEST['month_id'];
$year =$_REQUEST['year_id'];
$sql = "select sum(amount) from account_entry where account_head = $h AND YEAR(date) = $year";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 0);
}
function head_name($h){
$result = mysql_query("select * from accounts_head where account_head_id = $h");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'NIl';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$en_name = MYSQL_RESULT($result,$i,"account_head_name");
			echo $en_name;
$i++;		
		}
	}
}
?>
<?php echo $main_header; ?>
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
				<h1>Receipts and Payments <small><?php echo $month_n; ?>-<?php echo $year; ?></small></h1>

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
					 Receipts and Payments Account for <?php echo $month_n; ?>-<?php echo $year; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<a class="btn default" data-target="#full-width" data-toggle="modal">
									View Previous Records</a>
			<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light green-haze" href="admin-home">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php echo rsum("$month","$year"); ?>
						</div>
						<div class="desc">
							 Total Receipts
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light red-intense" href="admin-home">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php echo psum("$month","$year"); ?>
						</div>
						<div class="desc">
							 Total Payments
						</div>
					</div>
					</a>
				</div>
				<?php echo tot("$month","$year"); ?>
				<div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-money font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Receipts for <?php echo $month_n; ?>-<?php echo $year; ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Head
								</th>
								<th>
									 Amount
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM account_entry WHERE (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $year GROUP BY account_head");
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
			$en_des = MYSQL_RESULT($result,$i,"description");
			$en_ven = MYSQL_RESULT($result,$i,"vendor_id");
			$en_cat = MYSQL_RESULT($result,$i,"ac_cat_id");
			$en_head = MYSQL_RESULT($result,$i,"account_head");
			$en_amu = MYSQL_RESULT($result,$i,"amount");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $en_head; ?>" data-value="<?php echo psumi("$en_head"); ?>" data-month="<?php echo $month; ?>" data-year="<?php echo $year; ?>"><?php echo head_name("$en_head"); ?></a>
								</td>
								<td>
									 <?php echo psumi("$en_head"); ?>
								</td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								<tr bgcolor="#44b6ae">
								<td colspan="2" align="right">
									 <strong>Total</strong>
								</td>
								<td>
									 <strong><?php echo rsum("$month","$year"); ?></strong>
								</td>
							</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					<div class="row">
				<div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-ul font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Payments for <?php echo $month_n; ?>-<?php echo $year; ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Head
								</th>
								<th>
									 Amount
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM account_entry WHERE (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND YEAR(date) = $year GROUP BY account_head");
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
			$en_des = MYSQL_RESULT($result,$i,"description");
			$en_ven = MYSQL_RESULT($result,$i,"vendor_id");
			$en_cat = MYSQL_RESULT($result,$i,"ac_cat_id");
			$en_head = MYSQL_RESULT($result,$i,"account_head");
			$en_amu = MYSQL_RESULT($result,$i,"amount");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $en_head; ?>" data-value="<?php echo psumi("$en_head"); ?>" data-month="<?php echo $month; ?>" data-year="<?php echo $year; ?>"><?php echo head_name("$en_head"); ?></a>
								</td>
								<td>
									 <?php echo psumi("$en_head"); ?>
								</td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								<tr bgcolor="#e35b5a">
								<td colspan="2" align="right">
									 <strong>Total</strong>
								</td>
								<td>
									<strong><?php echo psum("$month","$year"); ?></strong>
								</td>
							</tr>
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
										<form action="receipt-payment-search" method="GET" class="form-horizontal">
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
    var famValue=$(this).attr('data-value');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');

    $.ajax({url:"entry-details-year.php?famID="+famID+"&famValue="+famValue+"&famMonth="+famMonth+"&famYear="+famYear,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>