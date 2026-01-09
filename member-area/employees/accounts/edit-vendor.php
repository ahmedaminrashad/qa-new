<?php session_start(); ?>
<?php
include("../includes/session.php");
  include("../includes/accounts_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
    $vid =base64_decode($_GET["pT"]);
	$result = mysql_query("SELECT * FROM vendor where vendor_id = '$vid'");
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
			$v_id = MYSQL_RESULT($result,$i,"vendor_id");
			$v_name = MYSQL_RESULT($result,$i,"vendor_name");
			$v_contact = MYSQL_RESULT($result,$i,"contact");
			$v_address = MYSQL_RESULT($result,$i,"address");
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$vn= $_POST['ven_name'];
		 	$vc= $_POST['ven_contact'];
		 	$va= $_POST['ven_address'];
		 	$vi= $_POST['v_id'];
			mysql_query( "UPDATE vendor SET vendor_name = '" . mysql_real_escape_string($vn) . "', contact = '$vc', address = '" . mysql_real_escape_string($va) . "' where vendor_id = '$vi'") or die(mysql_error()); 
							 header("Location: list-of-vendor");
				}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
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
				<h1>Edit <small>Vendor Details</small></h1>
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
					<a href="list-of-vendor">list of Vendors</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are editing vendor
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
											<i class="fa fa-plus"></i>You are editing vendor
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Vendor Name</strong></label>
															<div class="col-md-4">
															<input required type="text" value="<?php echo $v_name; ?>" name="ven_name" id="ven_name" class="form-control input-circle">															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Contact Details</strong></label>
													<div class="col-md-4">
														<input required type="text" value="<?php echo $v_contact; ?>" name="ven_contact" id="ven_contact" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Address</strong></label>
													<div class="col-md-4">
														<textarea class="form-control" name="ven_address" id="ven_address"><?php echo $v_address; ?></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $v_id; ?>" name="v_id" id="v_id" class="form-control input-circle">
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