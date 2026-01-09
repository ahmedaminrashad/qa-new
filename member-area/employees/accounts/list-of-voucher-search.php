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
    $monid =$_REQUEST['month_id'];
  $yeaid =$_REQUEST['year_id'];
  function vamu($var){
  $sql = "select sum(amount) from account_entry where voucher_id = $var";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo 'Rs. ' . $row[0];
        }
    else
        {
            echo '--';
        }
}
function ent($var)
{
// sending query
   $result = mysql_query("SELECT * FROM account_entry where voucher_id = $var");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{echo $tnumberOfRows;}
			}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
$year = date('Y');
$month = date('m');
$month_n = date('F');
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
					 List of Vouchers for <?php echo $month_n; ?>-<?php echo $year; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM voucher Where MONTH(date) = $monid and YEAR(date) = $yeaid");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Added Vouchers: $numberOfRows"; ?> for <?php echo $month_n; ?>-<?php echo $year; ?></h4>
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
									 Voucher Number
								</th>
								<th>
									 Cheque Number
								</th>
								<th>
									 Amount
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `voucher`.*, `bank_account`.`bank_name` FROM `voucher`,`bank_account` WHERE voucher.bank_id=bank_account.bank_id HAVING MONTH(date) = $monid and YEAR(date) = $yeaid ORDER BY date");
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
		
			$vou_id = MYSQL_RESULT($result,$i,"voucher_id");
			$vou_num = MYSQL_RESULT($result,$i,"voucher_num");
			$che_num = MYSQL_RESULT($result,$i,"cheque_num");
			$voudate = MYSQL_RESULT($result,$i,"date");
			$voutype = MYSQL_RESULT($result,$i,"type_id");
			$voubankid = MYSQL_RESULT($result,$i,"bank_id");
			$voubank = MYSQL_RESULT($result,$i,"bank_name");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php if ($voutype == 1){ echo '#D9FFCB';} else {echo '#FFD6D6';} ?>
">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php $date1=date_create("$voudate"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <?php echo $vou_num; ?><?php echo $vou_id; ?>
								</td>
								<td>
									 <?php echo $che_num; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $vou_id; ?>" data-name="<?php echo $vou_num; ?>" data-value="<?php echo vamu($vou_id); ?>"><button type="button" class="btn green btn-xs"><?php echo vamu($vou_id); ?> (<?php echo ent($vou_id); ?>)</button></a>
								</td>
								<td>
									<span class="label label-sm label-info"><?php echo $voubank; ?></span>
								</td>
								<td>
									 <?php if ($voutype == 1){ echo '<span class="label label-sm label-success">Receipt</span>';} else {echo '<span class="label label-sm label-danger">Payment</span>';} ?>
								</td>
								<td><a href="add-account-entry?vou_id=<?php echo $vou_id; ?>&vou_n=<?php echo $vou_num; ?>&vou_bank=<?php echo $voubankid; ?>&vou_bankna=<?php echo $voubank; ?>&vou_date=<?php echo $voudate; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-plus"></i></button></a> <a href="edit-voucher?pT=<?php echo base64_encode($vou_id); ?>"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a> <a href="delete-voucher?cid=<?php echo $vou_id; ?>"><button type="button" class="btn red btn-xs" title="Delete Voucher"><i class="fa fa-close"></i></button></a></td>
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