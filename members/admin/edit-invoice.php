<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$link =base64_decode($_GET["link"]);
    $pnid =base64_decode($_GET["pT"]);
	$sql = "SELECT * FROM invoice where py_id = '$pnid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$invoive_id = $row['py_id'];
			$invoive_pid = $row['parent_id'];
			$invoive_pname = $row['parent_name'];
			$invoive_issue = $row['issue'];
			$invoive_due = $row['due'];
			$invoive_submit = $row['submit'];
			$invoive_fee = $row['fee'];
			$invoive_status = $row['status'];
			$invoive_month = $row['mon_id'];
			$invoive_year = $row['y_id'];
			$invoive_cid = $row['currency_id'];
			$invoive_add = $row['invoice_add'];
			$invoive_num = $row['order_num'];

			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	    $link =base64_decode($_GET["link"]);
$adue= $_POST['dued'];
$afee= $_POST['fee'];
$astu= $_POST['psus'];
$anid= $_POST['nid'];
$aadj= $_POST['adj'];
$aord= $_POST['ord'];
			$sql = "UPDATE invoice SET due = '$adue', fee = '$afee', status = '$astu', invoice_add = '$aadj', order_num = '$aord' WHERE py_id = '$anid'"; 
							 if ($conn->query($sql) === TRUE) {
							 echo "<script>window.open('".$link."','_self')</script>";
							 }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Invoice';
$page_subtitle = 'Edit Invoice';
$table_name = 'Edit Invoice';
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
											<div class="form-body">
												<h3 class="form-section">Invoice Details for Invoive Number
												<font color="#44B6AE"> <b> <?php echo $invoive_id; ?></b></font></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Parent Name</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_pname; ?>" name="pname" id="pname" readonly>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Issue Date</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_issue; ?>" name="pemail" id="pemail" readonly>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Due Date</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_due; ?>" name="dued" id="dued">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Submit Date</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_submit; ?>" name="pname2" id="pname2" readonly>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Fee in <?php $sql = "SELECT * FROM currency WHERE currency_id = $invoive_cid";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
$pidm = $row['currency_name'];
}
echo $pidm; ?></label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_fee; ?>" name="fee" id="fee">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Month/Year</label>
															<div>
																<input type="text" class="form-control" value="<?php $sql = "SELECT * FROM month WHERE month_id = $invoive_month";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
$pidm = $row['month_name'];
}
echo $pidm; ?> - 
<?php $sql = "SELECT * FROM school_yr WHERE year_id = $invoive_year";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
$pidm = $row['school_year'];
}
echo $pidm;?>" name="pfee" id="ppass0"  readonly>
															</div>
														</div>
													</div>
													<!--/span-->
													<input type="hidden" class="form-control" value="<?php echo $invoive_id; ?>" name="nid" id="nid">
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Adjustment</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_add; ?>" name="adj" id="adj">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>
															Order Number</label>
															<div>
																<input type="text" class="form-control" value="<?php echo $invoive_num; ?>" name="ord" id="ord">
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
															Status</label>
															<div>
															<select class="form-control" name="psus"  id="psus" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM statusp ORDER BY s_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['s_id'];?>"><?php echo $row['name'];?> </option>
  <?php } ?>
</select>
															</div>
														</div>
													</div>
													</div>
											</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
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
	form.psus.value = ("<?php echo $invoive_status; ?>");
	//alert (form.pCityM.value);				
</script>