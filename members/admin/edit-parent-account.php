<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
   $link =$_REQUEST['link'];
   $pnid =base64_decode($_GET["parent_id"]);
	$sql = "SELECT * FROM account where parent_id = '$pnid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$puser = $row['username'];
			$ppass = $row['userpass'];
			$pc11 = $row['c_id'];
			$pt = $row['telephone'];
			$pm = $row['mobile'];
			$ps = $row['skype'];
			$pfe = $row['fee'];
			$pcity = $row['city'];
			$pcur = $row['m_id'];
			$pman = $row['currency_id'];
			$pdate = $row['date'];
			$ppayment = $row['mode_id'];
			$pbelong = $row['belong'];
			$ptz = $row['timezone'];
			$active_s = $row['active'];
			$ptdate = $row['trial_date'];
			$pinvoice = $row['invoice_type'];
			$pcycle = $row['payment_cycle'];
			$pgroup = $row['group_id'];
			}
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

			$sql = "UPDATE account SET parent_name = '$apname', email = '$apemail', username = '$apuser', userpass = '$appass', c_id = '$apc', telephone = '$apt', mobile = '$apm', skype = '$aps', fee = '$apf', city = '$apcity', m_id = '$aman', currency_id = '$acur', mode_id = '$amod', date = '$ad', belong = '$abl', timezone = '$atz', invoice_type = '$ainvoice', payment_cycle = '$acycle', group_id = '$agroup', rate = '$apf' WHERE parent_id = '$pppid1'"; 
							 if ($conn->query($sql) === TRUE) {
							     echo "<script>window.open('update_student?spid=".$pppid1."&scon=".$apc."&sman=".$aman."&stimezone=".$atz."&date=".$ad."&act=".$active_s."&skypes=".$aps."&link=".$link2."','_self')</script>";
							 }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Account Profile';
$page_subtitle = 'Edit Account Profile';
$table_name = 'Edit Account Profile';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php //echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
											<div class="form-body">
												<h3 class="form-section">Person 
												Bio Data of<font color="#44B6AE"> <b><?php 
echo $pname;	
?></b></font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Parent Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $pname; ?>" name="pname" id="pname">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Email</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $pemail; ?>" name="pemail" id="pemail">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															TelePhone</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $pt; ?>" name="pname1" id="pname1">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Mobile</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $pm; ?>" name="pname2" id="pname2">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Skype ID</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $ps; ?>" name="pname3" id="pname3">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Fee</label>
															<div>
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
															<label>
															Country</label>
															<div>
															<select class="form-control" name="pcon"  id="pcon" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM country ORDER BY c_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															City</label>
															<div>
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
															<label>
															Time Zone</label>
															<div>
															<select class="form-control" name="ptime"  id="ptime" onchange="javascript: return optionList49_SelectedIndex()">
															<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM time_zone ORDER BY tz_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['tz_id'];?>"><?php echo $row['timezone_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Data</label>
															<div>
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
															<label>
															Manager</label>
															<div>
															<select required class="form-control" name="pman"  id="pman" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE (cat_id = 5 or super_rights = 1) and active = 1 ORDER BY teacher_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Payment Mode</label>
															<div>
																<select class="form-control" name="pmode"  id="pmode" onchange="javascript: return optionList492_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM payment_mode ORDER BY mode_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['mode_id'];?>"><?php echo $row['mode_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Invoice Type</label>
															<div>
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
															<label>
															Invoice Cycle</label>
															<div>
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
															<label>
															Belong to</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $pbelong; ?>" name="pbelong" id="pbelong">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Currency</label>
															<div>
															<select required class="form-control" name="pcurrency"  id="pcurrency" onchange="javascript: return optionList491_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM currency ORDER BY currency_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['currency_id'];?>"><?php echo $row['currency_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<h3 class="form-section">Login 
												Details of</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Username</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $puser; ?>" name="puser" id="puser">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Userpass</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $ppass; ?>" name="ppass" id="ppass">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Group ID</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $pgroup; ?>" name="group" id="group">
															</div>
														</div>
													</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $link; ?>" name="link1" id="link1">
												<input type="hidden" class="form-control" value="<?php echo $pnid; ?>" name="pppid" id="pppid">
												<!--/row-->
											</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
							</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
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