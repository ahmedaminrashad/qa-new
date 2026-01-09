<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("monitoring-functions.php");
$m =$_REQUEST['month'];
$isd =$_REQUEST['issue'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
$hidden_pdept= $_POST['hidden_pdept'];
			 header(
			 		"Location: iup?month=". $_POST['mon']
			 		."&due=". $_POST['dd']
			 		."&year=". $_POST['y']				
		 		   );			   				   	 	 
			}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Confirm Invoice';
$page_subtitle = 'Confirm Invoice!';
$table_name = 'Confirm Invoice';
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="iup">
                                    <input type="hidden" name="pteacher" size="20" value="<?php echo $pT; ?>">
                                    <input type="hidden" name="mmm" size="20" value="<?php echo $m; ?>">
                                    <input type="hidden" name="yyy" size="20" value="<?php echo $y; ?>">
                                <div class="form-group">
													<label>Month</label>
													<div>
														<input type="text" name="month" id="month" class="form-control" value="<?php $sql = "SELECT * FROM month WHERE month_id = $m";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
	$pid = $row['month_name'];
	echo $pid;?>" readonly>

													</div>
												</div>
										<div class="form-group">
													<label>Year</label>
													<div>
														<input type="text" name="year" id="year" class="form-control" value="<?php $sql = "SELECT * FROM school_yr WHERE year_id = $y";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
	$pd = $row['school_year'];
	echo $pd;?>" readonly>
													</div>
												</div>
												<div class="form-group">
													<label>Due Date</label>
													<div>
														<input type="text" name="due" id="due" class="form-control" value="<?php echo $dd; ?>" readonly>
													</div>
												</div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Confim</button>
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