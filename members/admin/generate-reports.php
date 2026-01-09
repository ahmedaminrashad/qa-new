<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$date1= $_POST['date1'];
		 	$date2= $_POST['date2'];
		 	$link= $_POST['link'];
		 	echo "<script>window.open('".$link."?date_id1=".$date1."&date_id2=".$date2."','_self')</script>";
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Generate Report';
$page_subtitle = 'Generate Report';
$table_name = 'Generate Report';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
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
										<div class="form-group">
															<label>From:</label>
															<div>
															<input required type="date" name="date1" id="date1" class="form-control">															
              									</div>
												</div>
										<div class="form-group">
															<label>To:</label>
															<div>
															<input required type="date" name="date2" id="date2" class="form-control">															</div>
												</div>
												<div class="form-group">
													<label>Report:</label>
													<div>
														<select required class="form-control" name="link"  id="link" onchange="javascript: return optionList49_SelectedIndex()">
												<option value="balance-sheet-generated">Balance Sheet</option>
												<option value="profit-loss-generated">Profit &amp; Loss Statment</option>
												<option value="receipt-payment-generated">Receipt &amp; Payment</option>
												<option value="depreciation-report">Depreciation Report</option>
												<option value="amortization-report">Amortization Report</option>
              									</select>
													</div>
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