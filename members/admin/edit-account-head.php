<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	require ("../includes/dbconnection.php");
			$hn= $_POST['head_name'];
		 	$hc= $_POST['head_note'];
		 	$hi= $_POST['h_id'];
			$sql = "UPDATE accounts_head SET account_head_name = '" . mysqli_real_escape_string($conn, $hn) . "', note = '" . mysqli_real_escape_string($conn, $hc) . "' WHERE account_head_id = '$hi'"; 
							 if ($conn->query($sql) === TRUE) {
							 echo "<script>window.open('list-of-account-head','_self')</script>";
							 }
				}
    $hid =base64_decode($_GET["pT"]);
	$sql = "SELECT * FROM accounts_head where account_head_id = '$hid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$h_id = $row['account_head_id'];
			$h_cat = $row['account_cat_id'];
			$h_name = $row['account_head_name'];
			$h_note = $row['note'];
			}
			}
?>
<?php

?>
<?php
$sy = date('Y-m-d');
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
										<div class="form-group">
															<label>Account Head Title</label>
															<div>
															<input required type="text" value="<?php echo $h_name; ?>" name="head_name" id="head_name" class="form-control">															</div>
												</div>
												<div class="form-group">
													<label>Details (If any)</label>
													<div>
														<textarea class="form-control" name="head_note" id="head_note"><?php echo $h_note; ?></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $h_id; ?>" name="h_id" id="h_id" class="form-control">
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
										<!-- END FORM-->
									</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>