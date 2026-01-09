<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
  $new_msg =$_REQUEST['msg'];
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
$date = date('h:i a', time());
$syw = date('Y');
?>
<?php
$page_title = 'Refer a Friend or Family';
$page_subtitle = 'Refer a Friend or Family';
$table_name = 'Refer a Friend or Family';
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
                            <?php if ($new_msg == 1) { echo '<div class="alert alert-success">Your referral has been submitted successfully.</div>'; }
						elseif ($new_msg == 2) { echo '<div class="alert alert-success">Your referral has been submitted successfully. Also a copy of email has been sent to the given email.</div>'; }
						else { echo '<div class="alert alert-danger"><strong>Note!</strong> Each friend/family referred by you will be your contribution to spreading Words of Allah. At '.$site_nameC.' you will get a discount of 20% in your next invoice.</div>'; } ?>
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
										<form id="form1" class="col-md-10 mx-auto" method="post" action="submit-refferal">
										<input type="hidden" name="p_id" size="20" value="<?php echo $_SESSION['is']['parent_id']; ?>">
										<input type="hidden" name="p_name" size="20" value="<?php echo $_SESSION['is']['parent']; ?>">
										<div class="form-group">
													<label>Name*</label>
													<div>
														<input type="text" name="name" id="name" class="form-control" required>
													</div>
												</div>
										<div class="form-group">
													<label>Email*</label>
													<div>
														<input type="email" name="email" id="email" class="form-control" required>
													</div>
												</div>
										<div class="form-group">
													<label>Phone*</label>
													<div>
														<input type="text" name="phone" id="phone" class="form-control" required>
													</div>
												</div>
										<div class="form-group">
													<label>Skype</label>
													<div>
														<input type="text" name="skype" id="skype" class="form-control">
													</div>
												</div>
										<div class="form-group">
													<label>Your Relation</label>
													<div>
														<input type="text" name="relation" id="relation" class="form-control">
													</div>
												</div>
										<div class="form-group">
													<label>Any Comment</label>
													<div>
														<textarea class="form-control" name="comments" id="comments"></textarea>													</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
													    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
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