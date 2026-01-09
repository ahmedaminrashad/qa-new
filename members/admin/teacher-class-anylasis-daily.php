<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Teacher Class Search';
$page_subtitle = 'Teacher Class Search';
$table_name = 'Teacher Class Search';
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="class-report-definer-daily">
										<div class="form-group">
															<label>Date From</label>
															<div>
															<input type="date" name="date1" id="date1" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>															</div>
												</div>
												<div class="form-group">
															<label>Date To</label>
															<div>
															<input type="date" name="date2" id="date2" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>															</div>
												</div>
												<div class="form-group">
															<label>Teacher </label>
															<div>
															<select required class="form-control" name="pteacher"  id="pteacher">
															<option value="all">All </option>
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