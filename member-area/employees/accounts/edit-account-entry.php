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
$hid =base64_decode($_GET["pT"]);
	$result = mysql_query("SELECT * FROM account_entry where entry_id = '$hid'");
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
			$e_id = MYSQL_RESULT($result,$i,"entry_id");
			$edate = MYSQL_RESULT($result,$i,"date");
			$evou_id = MYSQL_RESULT($result,$i,"voucher_id");
			$edes = MYSQL_RESULT($result,$i,"description");
			$even_id = MYSQL_RESULT($result,$i,"vendor_id");
			$eac_cat = MYSQL_RESULT($result,$i,"ac_cat_id");
			$eac_head = MYSQL_RESULT($result,$i,"account_head");
			$ebank_id = MYSQL_RESULT($result,$i,"bank_id");
			$eoffice_id = MYSQL_RESULT($result,$i,"office_id");
			$etax = MYSQL_RESULT($result,$i,"tax");
			}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php
$db = new mysqli('localhost','tarteele_raj','5506729*','tarteele_ss');
  $query = "SELECT * FROM accounts_cat";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['accounts_cat_id'], "val" => $row['accounts_cat_name']);
  }

  $query = "SELECT * FROM accounts_head";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['account_cat_id']][] = array("id" => $row['account_head_id'], "val" => $row['account_head_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $head_title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var account_cat_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[account_cat_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[account_cat_id][i].val,subcats[account_cat_id][i].id);
        }
      }
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body onload='loadCategories()'>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html"><img src="../../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->

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
				<h1>Add <small>New Entry</small></h1>
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
					<a href="parent-accounts">List of Vouchers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add New Entry in Voucher number: <strong><?php echo $voun; ?> 
					 (Rs. <?php echo $voua; ?>)</strong>
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
											<i class="fa fa-plus"></i>Add 
											details of voucher Number <?php 
echo $voun;	
?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section"><font color="#44B6AE">
												Entry Details</font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Voucher</strong></label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $voun; ?>" readonly>															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Category</strong></label>
															<div class="col-md-9">
																<select class="form-control" name="cat_id" id="categoriesSelect"></select>															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Vendor</strong></label>
															<div class="col-md-9">
																<select required class="form-control" name="ven_id"  id="ven_id" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM vendor ORDER BY vendor_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['vendor_id'];?>"><?php echo $row['vendor_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Head</strong></label>
																<div class="col-md-9">
															<select class="form-control" name="head_id" id="subcatsSelect"></select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Amount</strong></label>
																<div class="col-md-9">
															<input type="text" class="form-control" name="amu" id="amu">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Date</strong></label>
															<div class="col-md-9">
																<input type="date" class="form-control" name="edate" id="edate">
															</div>
														</div>
													</div>
												<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
													<label class="col-md-3 control-label"><strong>
															Bank Account</strong></label>
													<div class="col-md-9">
														<input type="text" class="form-control" value="<?php echo $voubna; ?>" readonly>
													</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
													<label class="col-md-3 control-label"><strong>
															Office</strong></label>
													<div class="col-md-9">
														<select required class="form-control" name="eoffice"  id="eoffice" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM branch_office ORDER BY office_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['office_id'];?>"><?php echo $row['office_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
													</div>
														</div>
													</div>
												<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>
															Tax Provision</strong></label>
																<div class="col-md-9">
															<input type="text" class="form-control" value="0" name="taxp" id="taxp">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
													<label class="col-md-3 control-label"><strong>
															Description</strong></label>
													<div class="col-md-9">
														<textarea class="form-control" name="edes" id="edes"></textarea>
													</div>
														</div>
													</div>
												<!--/span-->
												</div>
												<input type="hidden" class="form-control" value="<?php echo $vouid; ?>" name="avou_id" id="avou_id">
												<input type="hidden" class="form-control" value="<?php echo $voub; ?>" name="ebank" id="ebank">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" name="cmdSubmit" class="btn green">
																Submit</button>
																<button type="button" class="btn default">
																Cancel</button>
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
	form.head_id.value = ("<?php echo 1; ?>");
	form.ven_id.value = ("<?php echo 1; ?>");
	form.eoffice.value = ("<?php echo 1; ?>");
	//alert (form.pCityM.value);				
</script>