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
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
$aname =$_REQUEST['name'];
$aemail =$_REQUEST['email'];
$aphone =$_REQUEST['phone'];
$askype =$_REQUEST['skype'];
$acity =$_REQUEST['city'];
if (isset($_POST['cmdSubmit'])) 
  	{
  				$pname= $_POST['pname'];
			$pemail= $_POST['pemail'];
			$puser= $_POST['puser'];
			$ppass= $_POST['ppass'];
			$pcon = $_POST['pcon'];
			$pcity= $_POST['pname4'];
			$ptele= $_POST['pname1'];
			$pmob= $_POST['pname2'];
			$pskype= $_POST['pname3'];
			$pfee= $_POST['pfee'];
			$pman = $_POST['pman'];
			$pcur = $_POST['pcurrency'];
			$pmod = $_POST['pmode'];
			$pd = $_POST['pdate'];
			$bl = $_POST['pbelong'];
			$tz = $_POST['ptime'];
			$triald = $_POST['trialdate'];
			$ainvoice =$_REQUEST['invoice'];
			$acycle =$_REQUEST['indate'];
			$agroup =$_REQUEST['group'];

$result = mysql_query ("SELECT * FROM account")or die(mysql_error());
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
			$test_parent_id = MYSQL_RESULT($result,$i,"parent_id");
			$test_email = MYSQL_RESULT($result,$i,"email");
			if ($test_email == $pemail){
			   $result = mysql_query("SELECT * FROM account HAVING parent_id = '$test_parent_id'
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
			$aa_pid = MYSQL_RESULT($result,$i,"parent_id");
			$aa_parent = MYSQL_RESULT($result,$i,"parent_name");
			$aa_email = MYSQL_RESULT($result,$i,"email");
	$i++;	 
			}
			}
			$note = '<div class="alert alert-danger">* An account with email <b>' . $aa_email. '</b> already exist in database with name <b>' . $aa_parent. '</b></div>';
			$conflict = true;
			end;
			}
	$i++;	 
			}
			}
if ($conflict != true){
			mysql_query ("INSERT INTO account(parent_name, email, username, userpass, c_id, telephone, mobile, skype, fee, city, m_id, currency_id, mode_id, date, belong, timezone, trial_date, csr_id, invoice_type, payment_cycle, group_id)
					VALUES('$pname','$pemail','$puser','$ppass','$pcon','$ptele','$pmob','$pskype','$pfee','$pcity','$pman','$pcur','$pmod','$pd','$bl','$tz','$triald','$ID','$ainvoice','$acycle','$agroup')") or die(mysql_error()); 
				if(mysql_query){
				mysql_query ("INSERT INTO new_request(name, status, csr_id, message, date)
					VALUES('$pname','5','$ID','From Call','$pd')") or die(mysql_error());
				mysql_query ("INSERT INTO csr_performance(req_id, csr_id, status, date)
					VALUES('0','$ID','1','$pd')") or die(mysql_error());
 		header(
			 	"Location: new-account-email?name=".$pname."&email=".$pemail."&user=".$puser."&pass=".$ppass."");
						}
}
}

?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM country";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['c_id'], "val" => $row['c_a']);
  }

  $query = "SELECT * FROM time_zone";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['c_id']][] = array("id" => $row['tz_id'], "val" => $row['timezone_name'].$row['timezone_diff']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: http://www.tarteeltechnologies.com/
Contact: info@tarteeltechnologies.com
-->
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
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
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
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>
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
        var c_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[c_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[c_id][i].val,subcats[c_id][i].id);
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
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add <small>New Parent</small></h1>
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
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">
							Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE BREADCRUMB -->
			<?php echo $note; ?>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add Parent Login Account
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
											<i class="fa fa-plus"></i>Add Parent 
											Details
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
												Person Bio Data</font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Parent Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" maxlength="16" value="<?php echo $aname; ?>" name="pname" id="pname" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Email</label>
															<div class="col-md-9">
																<input type="email" class="form-control" value="<?php echo $aemail; ?>" name="pemail" id="pemail" required>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															TelePhone</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $aphone; ?>" name="pname1" id="pname1">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Mobile</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add Cell Number" name="pname2" id="pname2">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Skype ID</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $askype; ?>" name="pname3" id="pname3">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Fee</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Add lump sum fee of Family" name="pfee" id="ppass0" required>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Country</label>
															<div class="col-md-9">
															<select required class="form-control" name="pcon" id="categoriesSelect"></select>															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															City</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $acity; ?>" name="pname4" id="pname4" required>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Time Zone</label>
															<div class="col-md-9">
															<select required class="form-control" name="ptime" id="subcatsSelect"></select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Data</label>
															<div class="col-md-9">
																<input type="date" class="form-control" placeholder="dd-mm-yy" name="pdate" id="pdate" required>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Manager</label>
															<div class="col-md-9">
															<select required class="form-control" name="pman"  id="pman" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 5 or super_rights = 1) and active = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Payment Mode</label>
															<div class="col-md-9">
																<select required class="form-control" name="pmode"  id="pmode" onchange="javascript: return optionList492_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM payment_mode ORDER BY mode_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['mode_id'];?>"><?php echo $row['mode_name'];?> </option>
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
															<label class="control-label col-md-3">
															Invoice Type</label>
															<div class="col-md-9">
															<select required class="form-control" name="invoice"  id="invoice">
                      							<option value="1">Non-Recurring</option>
												<option value="2">Recurring</option>
               													</select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Invoice Cycle</label>
															<div class="col-md-9">
																<select required class="form-control" name="indate"  id="indate">
                      							<option value="1">1st of every month</option>
												<option value="15">15th of every month</option>
               													</select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Belong to</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Belong to..." name="pbelong" id="pbelong">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Currency</label>
															<div class="col-md-9">
															<select required class="form-control" name="pcurrency"  id="pcurrency" onchange="javascript: return optionList491_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM currency ORDER BY currency_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['currency_id'];?>"><?php echo $row['currency_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<h3 class="form-section"><font color="#44B6AE">
												Login Details</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Username</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Login Name" name="puser" id="puser" required>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Userpass</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Login Password" name="ppass" id="ppass" required>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<h3 class="form-section"><font color="#44B6AE">
												Trial Date</font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Trial End Date</label>
															<div class="col-md-9">
																<input type="date" class="form-control" name="trialdate" id="trialdate" required>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Group ID</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="group" id="group" required>
															</div>
														</div>
													</div>
												</div>
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
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
													<div class="col-md-6">
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