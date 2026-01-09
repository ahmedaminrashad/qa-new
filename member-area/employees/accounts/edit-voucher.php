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
    $vouid =base64_decode($_GET["pT"]);
	$result = mysql_query("SELECT * FROM voucher where voucher_id = '$vouid'");
	if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$vou_id = MYSQL_RESULT($result,$i,"voucher_id");
			$vou_num = MYSQL_RESULT($result,$i,"voucher_num");
			$che_num = MYSQL_RESULT($result,$i,"cheque_num");
			$vou_date = MYSQL_RESULT($result,$i,"date");
			$vou_type = MYSQL_RESULT($result,$i,"type_id");
			$vou_bank = MYSQL_RESULT($result,$i,"bank_id");
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$vun= $_POST['vou_n'];
		 	$chn= $_POST['che_n'];
		 	$voui= $_POST['h_id'];
		 	$vdate= $_POST['vou_d'];
		 	$vtype= $_POST['vou_t'];
		 	$vbank= $_POST['vou_b'];
			mysql_query( "UPDATE voucher SET voucher_num = '$vun', cheque_num = '$chn', date = '$vdate', bank_id = '$vbank', type_id = '$vtype' where voucher_id = '$voui'") or die(mysql_error()); 
							 header("Location: list-of-voucher");
				}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Edit <small>Voucher</small></h1>
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
				<li>
					<a href="list-of-voucher">list of Vouchers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are editing voucher
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>You are editing voucher
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Voucher Number</strong></label>
															<div class="col-md-4">
															<input required type="text" value="<?php echo $vou_num; ?>" name="vou_n" id="vou_n" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Cheque Number</strong></label>
															<div class="col-md-4">
															<input required type="text" value="<?php echo $che_num; ?>" name="che_n" id="che_n" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Date</strong></label>
															<div class="col-md-4">
															<input required type="text" value="<?php echo $vou_date; ?>" name="vou_d" id="vou_d" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Type</strong></label>
															<div class="col-md-4">
															<select required class="form-control" name="vou_t"  id="vou_t">
												<option value="2">Payment</option>
												<option value="1">Reciept</option>
              									</select>															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Bank Account</strong></label>
															<div class="col-md-4">
															<select required class="form-control" name="vou_b"  id="vou_b" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM bank_account ORDER BY bank_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['bank_id'];?>"><?php echo $row['bank_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
												</div>
												<input type="hidden" value="<?php echo $vou_id; ?>" name="h_id" id="h_id" class="form-control">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
									</div>
								</div>
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
<?php echo $fot; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.vou_t.value = ("<?php echo $vou_type; ?>");
	form.vou_b.value = ("<?php echo $vou_bank; ?>");
	//alert (form.pCityM.value);				
</script>