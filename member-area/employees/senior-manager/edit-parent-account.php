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
   $link =$_REQUEST['link'];
   $pnid =base64_decode($_GET["parent_id"]);
	$result = mysql_query("SELECT * FROM account where parent_id = '$pnid'");
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
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$puser = MYSQL_RESULT($result,$i,"username");
			$ppass = MYSQL_RESULT($result,$i,"userpass");
			$pc11 = MYSQL_RESULT($result,$i,"c_id");
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$ps = MYSQL_RESULT($result,$i,"skype");
			$pfe = MYSQL_RESULT($result,$i,"fee");
			$pcity = MYSQL_RESULT($result,$i,"city");
			$pcur = MYSQL_RESULT($result,$i,"m_id");
			$pman = MYSQL_RESULT($result,$i,"currency_id");
			$pdate = MYSQL_RESULT($result,$i,"date");
			$ppayment = MYSQL_RESULT($result,$i,"mode_id");
			$pbelong = MYSQL_RESULT($result,$i,"belong");
			$ptz = MYSQL_RESULT($result,$i,"timezone");
			$active_s = MYSQL_RESULT($result,$i,"active");
			$ptdate = MYSQL_RESULT($result,$i,"trial_date");
			$pinvoice = MYSQL_RESULT($result,$i,"invoice_type");
			$pcycle = MYSQL_RESULT($result,$i,"payment_cycle");
			$pgroup = MYSQL_RESULT($result,$i,"group_id");
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$apname= $_POST['pname'];
			$apemail= $_POST['pemail'];
			$apuser= $_POST['puser'];
			$appass= $_POST['ppass'];
			$apc= $_POST['pcon'];
			$apt= $_POST['pname1'];
			$apm= $_POST['pname2'];
			$aps= $_POST['pname3'];
			$apf= $_POST['pfee'];
			$apcity= $_POST['pname4'];
			$aman = $_POST['pman'];
			$acur = $_POST['pcurrency'];
			$amod = $_POST['pmode'];
			$ad = $_POST['pdate'];
			$abl = $_POST['pbelong'];
			$atz = $_POST['ptime'];
			$link2= $_POST['link1'];
			$pppid1= $_POST['pppid'];
			$ainvoice =$_REQUEST['invoice'];
			$acycle =$_REQUEST['indate'];
			$agroup =$_REQUEST['group'];

			mysql_query( "UPDATE account SET parent_name = '$apname', email = '$apemail', username = '$apuser', userpass = '$appass', c_id = '$apc', telephone = '$apt', mobile = '$apm', skype = '$aps', fee = '$apf', city = '$apcity', m_id = '$aman', currency_id = '$acur', mode_id = '$amod', date = '$ad', belong = '$abl', timezone = '$atz', invoice_type = '$ainvoice', payment_cycle = '$acycle', group_id = '$agroup' WHERE parent_id = '$pppid1'") or die(mysql_error()); 
							 header("Location: update_student?spid=$pppid1&scon=$apc&sman=$aman&stimezone=$atz&date=$ad&act=$active_s&skypes=$aps&link=$link2");
				}
?>
<?php
date_default_timezone_set("Africa/Cairo");
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
				<h1>Edit<small> Parent Account</small></h1>
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
					<a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Edit Parent Account
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
											<i class="fa fa-plus"></i>Edit 
											Parent Details
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
												<h3 class="form-section">Person 
												Bio Data of<font color="#44B6AE"> <b><?php 
$result = mysql_query("SELECT * FROM account HAVING parent_id = $pnid");	
$pname = MYSQL_RESULT($result,$i,"parent_name");
echo $pname;	
?></b></font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Parent Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pname; ?>" name="pname" id="pname">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pemail; ?>" name="pemail" id="pemail">
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
																<input type="text" class="form-control" value="<?php echo $pt; ?>" name="pname1" id="pname1">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Mobile</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pm; ?>" name="pname2" id="pname2">
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
																<input type="text" class="form-control" value="<?php echo $ps; ?>" name="pname3" id="pname3">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Fee</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pfe; ?>" name="pfee" id="ppass0">
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
															<select class="form-control" name="pcon"  id="pcon" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM country ORDER BY c_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															City</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pcity; ?>" name="pname4" id="pname4">
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
															<select class="form-control" name="ptime"  id="ptime" onchange="javascript: return optionList49_SelectedIndex()">
															<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM time_zone ORDER BY tz_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['tz_id'];?>"><?php echo $row['timezone_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Data</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pdate; ?>" name="pdate" id="pdate">
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
																<select class="form-control" name="pmode"  id="pmode" onchange="javascript: return optionList492_SelectedIndex()">
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
																<input type="text" class="form-control" value="<?php echo $pbelong; ?>" name="pbelong" id="pbelong">
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
												<h3 class="form-section">Login 
												Details of<font color="#44B6AE"> <b><?php 
$result = mysql_query("SELECT * FROM account HAVING parent_id = $pnid");	
$pname = MYSQL_RESULT($result,$i,"parent_name");
echo $pname;	
?></b></font></h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Username</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $puser; ?>" name="puser" id="puser">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Userpass</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $ppass; ?>" name="ppass" id="ppass">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">
															Group ID</label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $pgroup; ?>" name="group" id="group">
															</div>
														</div>
													</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $link; ?>" name="link1" id="link1">
												<input type="hidden" class="form-control" value="<?php echo $pnid; ?>" name="pppid" id="pppid">
												<!--/row-->
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pcon.value = ("<?php echo $pc11; ?>");
	form.pcurrency.value = ("<?php echo $pman; ?>");
	form.pman.value = ("<?php echo $pcur; ?>");
	form.pmode.value = ("<?php echo $ppayment; ?>");
	form.ptime.value = ("<?php echo $ptz; ?>");
	form.indate.value = ("<?php echo $pcycle; ?>");
	form.invoice.value = ("<?php echo $pinvoice; ?>");
	//alert (form.pCityM.value);				
</script>