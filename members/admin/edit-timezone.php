<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
    $pnid =base64_decode($_GET["pT"]);
	$sql = "SELECT `time_zone`.*, `country`.`c_a` FROM `time_zone`,`country` WHERE time_zone.c_id=country.c_id HAVING tz_id = $pnid";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$atz_id = $row['tz_id'];
			$acon_id = $row['c_a'];
			$adiff = $row['timezone_diff'];
			$aname = $row['timezone_name'];
			$aphp = $row['php_tz'];
			$acid = $row['c_id'];
			}
			}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Timezone';
$page_subtitle = 'Edit Timezone';
$table_name = 'Edit Timezone';
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="save-timezone">
										<div class="form-group">
															<label>Country Name</label>
															<div>
															<input readonly type="text" value="<?php echo $acon_id; ?>" name="con_name" id="con_name" class="form-control">															</div>
												</div>
												<div class="form-group">
													<label>Timezone Name</label>
													<div>
														<input required type="text" value="<?php echo $aname; ?>" name="tzname" id="tzname" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label>Time Difference</label>
													<div>
														<input required type="text" value="<?php echo $adiff; ?>" name="tzdiff" id="tzdiff" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label>PHP Timezone</label>
													<div>
														<input required type="text" value="<?php echo $aphp; ?>" name="tzphp" id="tzphp" class="form-control">
													</div>
													<input type="hidden" value="<?php echo $atz_id; ?>" name="tzid" id="tzid" class="form-control">
													<input type="hidden" value="<?php echo $acid; ?>" name="tcid" id="tcid" class="form-control">
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