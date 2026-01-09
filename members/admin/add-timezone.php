<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");

$pnid =base64_decode($_GET["pT"]);

   if (isset($_POST['cmdSubmit'])) 
{
require ("../includes/dbconnection.php");
		 	$con_id= $_POST['con_id'];
			$time_diff = $_POST['tz_diff'];
			$time_name = $_POST['tz_name'];
			$time_php = $_POST['tz_php'];

			$sql = "INSERT INTO time_zone(c_id, timezone_diff, timezone_name, php_tz)
					VALUES('$con_id','$time_diff','$time_name','$time_php')"; 					
 		if ($conn->query($sql) === TRUE) {
 		header(
			 	"Location: list-of-country-timezone?con=$con_id");
			 	}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add Country';
$page_subtitle = 'You are adding a country!';
$table_name = 'Add Country';
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
															<label>Timezone Name</label>
															<div>
															<input required type="text" placeholder="e.g. Pakistan Standard Time (PST)" name="tz_name" id="tz_name" class="form-control input-circle">															</div>
												</div>
												<div class="form-group">
													<label>Timezone Difference</label>
													<div>
														<input required type="text" placeholder="e.g. -9" name="tz_diff" id="tz_diff" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label>PHP Timezone</label>
													<div>
														<input required type="text" placeholder="e.g. Asia/Pakistan" name="tz_php" id="tz_php" class="form-control input-circle">
													</div>
												</div>
												<input type="hidden" value="<?php echo $pnid; ?>" name="con_id" id="con_id" class="form-control input-circle">
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