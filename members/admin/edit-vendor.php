<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");

    $vid =base64_decode($_GET["pT"]);
	$sql = "SELECT * FROM vendor where vendor_id = '$vid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$v_id = $row['vendor_id'];
			$v_name = $row['vendor_name'];
			$v_contact = $row['contact'];
			$v_address = $row['address'];
			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	require ("../includes/dbconnection.php");
			$vn= $_POST['ven_name'];
		 	$vc= $_POST['ven_contact'];
		 	$va= $_POST['ven_address'];
		 	$vi= $_POST['v_id'];
			$sql = "UPDATE vendor SET vendor_name = '" . mysqli_real_escape_string($conn, $vn) . "', contact = '$vc', address = '" . mysqli_real_escape_string($conn, $va) . "' where vendor_id = '$vi'"; 
							 if ($conn->query($sql) === TRUE) {
							 echo "<script>window.open('list-of-vendor','_self')</script>";
							 }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Vendor';
$page_subtitle = 'Edit Vendor';
$table_name = 'Edit Vendor';
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
															<label>Vendor Name</label>
															<div>
															<input required type="text" value="<?php echo $v_name; ?>" name="ven_name" id="ven_name" class="form-control">															</div>
												</div>
												<div class="form-group">
													<label>Contact Details</label>
													<div>
														<input required type="text" value="<?php echo $v_contact; ?>" name="ven_contact" id="ven_contact" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label>Address</label>
													<div>
														<textarea class="form-control" name="ven_address" id="ven_address"><?php echo $v_address; ?></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $v_id; ?>" name="v_id" id="v_id" class="form-control">
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