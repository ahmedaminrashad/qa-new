<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");

    $pnid =base64_decode($_GET["pT"]);
	$sql = "SELECT * FROM country where c_id = '$pnid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$country_id = $row['c_id'];
			$country_abb = $row['c_name'];
			$country_name = $row['c_a'];
			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	require ("../includes/dbconnection.php");
			$con_ename= $_POST['con_name'];
			$con_eabb= $_POST['con_ab'];
			$con_id1= $_POST['con_id'];

			$sql = "UPDATE country SET c_name = '$con_eabb', c_a = '$con_ename' where c_id = '$con_id1'"; 
							 if ($conn->query($sql) === TRUE) {
							 header("Location: list-of-country");
							 }
				}
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
															<label>Country Name</label>
															<div>
															<input required type="text" value="<?php echo $country_name; ?>" name="con_name" id="con_name" class="form-control">															</div>
												</div>
												<div class="form-group">
													<label>Country Abbreviation</label>
													<div>
														<input required type="text" value="<?php echo $country_abb; ?>" name="con_ab" id="con_ab" class="form-control">
													</div>
												</div>
												<input type="hidden" value="<?php echo $country_id; ?>" name="con_id" id="con_id" class="form-control">
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