<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['teacher_id'];
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Find Class Details';
$page_subtitle = 'Find Class Details';
$table_name = 'Find Class Details';
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="class-report-definer">
										<div class="form-group">
															<label>From</label>
															<div>
															<input type="date" name="date1" id="date1" max="<?php echo $sy; ?>" class="form-control" required>															</div>
												</div>
												<div class="form-group">
															<label>To</label>
															<div>
															<input type="date" name="date2" id="date2" max="<?php echo $sy; ?>" class="form-control" required>															</div>
												</div>
												<div class="form-group">
															<label>Report Type</label>
															<div>
															<select required class="form-control" name="type"  id="type" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="1">Group by Student</option>
												<option value="2">Group by Date</option>
              									</select>
															</div>
												</div>
												<input type="hidden" name="pteacher" id="pteacher" value="<?php echo $tt; ?>" class="form-control" required>
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