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
  include("header-accounts.php");
    $link = $_SERVER['REQUEST_URI'];
function dep_time($var)
{
// sending query
   $result = mysql_query("SELECT * FROM adjusment_account where entry_id = $var");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '--';
			}
		else if ($tnumberOfRows > 0) 
			{echo $tnumberOfRows;}
}
function dep_amu($var){
$sql = "select sum(ad_amount) from adjusment_account where entry_id = $var";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 0);
}
function dep_res($var){
  $sql = "select sum(amount) from account_entry where entry_id = $var";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where entry_id = $var";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first-$second;
echo number_format($total, 0);
}
function dep_upto($var)
{
$result = mysql_query("SELECT * FROM adjusment_account where entry_id = $var");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '--';
			}
		else if ($tnumberOfRows > 0) 
			{
$result = mysql_query("SELECT MAX(date) AS max_date FROM adjusment_account where entry_id = $var");
$row = mysql_fetch_array($result);
$date1=date_create($row['max_date']); 
echo date_format($date1,"M d, Y");
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
				<h1>Advances &amp; Accrued Expence Adjustment<small></small></h1>

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
					 List of Advances &amp; Accrued Expenses
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Transaction Date
								</th>
								<th>
									 Head
								</th>
								<th>
									 Description
								</th>
								<th>
									 Value
								</th>
								<th>
									 Adjustment
								</th>
								<th>
									 Residual
								</th>
								<th>
									Upto (x Times)
								</th>
								<th>
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$result = mysql_query("SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING (ac_cat_id = 2 OR ac_cat_id = 5) AND status = 1 ORDER BY date DESC;");
	if (!$result) 
	{
    die("There is an issue in data");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Entry Found';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{	
	
			$en_id = MYSQL_RESULT($result,$i,"entry_id");
			$vdate = MYSQL_RESULT($result,$i,"date");
			$vdes = MYSQL_RESULT($result,$i,"description");
			$vname = MYSQL_RESULT($result,$i,"vendor_name");
			$vmod = MYSQL_RESULT($result,$i,"ac_cat_id");
			$vamu = MYSQL_RESULT($result,$i,"amount");
			$vhead = MYSQL_RESULT($result,$i,"account_head_name");
			$en_head = MYSQL_RESULT($result,$i,"account_head");
?>
								<tr bgcolor="<?php if ($vmod == 2) { echo '#FFF0A9'; } else { echo '#CFFDA8'; } ?>">
								<td>
									 <?php $date1=date_create("$vdate"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <?php echo $vhead; ?>
								</td>
								<td>
									 <?php echo $vdes; ?>
								</td>
								<td>
									 Rs. <?php echo number_format($vamu, 0); ?>
								</td>
								<td>
									<?php echo dep_amu("$en_id"); ?>
								</td>
								<td>
									<?php echo dep_res("$en_id"); ?>
								</td>
								<td>
									<a href="depreciation-details?en_id=<?php echo $en_id; ?>"><b><?php echo dep_upto("$en_id"); ?></b> (<?php echo dep_time("$en_id"); ?>)</a>
								</td>
								<td>
									<a href="add-adjustment-entry?en_id=<?php echo $en_id; ?>&en_head=<?php echo $en_head; ?>&ac_c_id=<?php echo $vmod; ?>&link=<?php echo $link; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-plus"></i></button></a>
								</td>
								<td>
									<a href="mark-cleared?ent_id=<?php echo $en_id; ?>"><button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a>
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
										<form action="list-of-voucher-search" method="GET" class="form-horizontal">
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
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"voucher-details.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>