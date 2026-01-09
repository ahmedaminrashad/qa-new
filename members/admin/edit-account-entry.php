<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$hid =base64_decode($_GET["pT"]);
	$sql = "SELECT * FROM account_entry where entry_id = '$hid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$e_id = $row['entry_id'];
			$edate = $row['date'];
			$evou_id = $row['voucher_id'];
			$edes = $row['description'];
			$even_id = $row['vendor_id'];
			$eac_cat = $row['ac_cat_id'];
			$eac_head = $row['account_head'];
			$ebank_id = $row['bank_id'];
			$eoffice_id = $row['office_id'];
			$etax = $row['tax'];
			}
			}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
  $sql = "SELECT * FROM accounts_cat";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)){
    $categories[] = array("id" => $row['accounts_cat_id'], "val" => $row['accounts_cat_name']);
  }

  $sql = "SELECT * FROM accounts_head";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)){
    $subcats[$row['account_cat_id']][] = array("id" => $row['account_head_id'], "val" => $row['account_head_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php echo $main_header; ?>
<head>
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
<body onload='loadCategories()'>
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
												<h3 class="form-section"><font color="#44B6AE">
												Entry Details</font></h3>
												<div class="row">
													<div>
														<div class="form-group">
															<label>
															Voucher</strong></label>
															<div class="col-md-9">
																<input type="text" class="form-control" value="<?php echo $voun; ?>" readonly>															</div>
														</div>
													</div>
													<!--/span-->
													<div>
														<div class="form-group">
															<label>
															Category</strong></label>
															<div class="col-md-9">
																<select class="form-control" name="cat_id" id="categoriesSelect"></select>															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div>
														<div class="form-group">
															<label>
															Vendor</strong></label>
															<div class="col-md-9">
																<select required class="form-control" name="ven_id"  id="ven_id" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM vendor ORDER BY vendor_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['vendor_id'];?>"><?php echo $row['vendor_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
														</div>
													</div>
													<!--/span-->
													<div>
														<div class="form-group">
															<label>
															Head</strong></label>
																<div class="col-md-9">
															<select class="form-control" name="head_id" id="subcatsSelect"></select>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div>
														<div class="form-group">
															<label>
															Amount</strong></label>
																<div class="col-md-9">
															<input type="text" class="form-control" name="amu" id="amu">
															</div>
														</div>
													</div>
													<div>
														<div class="form-group">
															<label>
															Date</strong></label>
															<div class="col-md-9">
																<input type="date" class="form-control" name="edate" id="edate">
															</div>
														</div>
													</div>
												<!--/span-->
												</div>
												<div class="row">
													<div>
														<div class="form-group">
													<label>
															Bank Account</strong></label>
													<div class="col-md-9">
														<input type="text" class="form-control" value="<?php echo $voubna; ?>" readonly>
													</div>
														</div>
													</div>
													<div>
														<div class="form-group">
													<label>
															Office</strong></label>
													<div class="col-md-9">
														<select required class="form-control" name="eoffice"  id="eoffice" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM branch_office ORDER BY office_id ");			  	
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
													<div>
														<div class="form-group">
															<label>
															Tax Provision</strong></label>
																<div class="col-md-9">
															<input type="text" class="form-control" value="0" name="taxp" id="taxp">
															</div>
														</div>
													</div>
													<div>
														<div class="form-group">
													<label>
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
													<div>
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