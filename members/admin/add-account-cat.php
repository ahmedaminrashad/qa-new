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
		 	$cn= $_POST['cat_name'];
		 	$cs= $_POST['cat_status'];
			$sql = "INSERT INTO accounts_cat (accounts_cat_name, status) VALUES('" . mysqli_real_escape_string($cn) . "','$cs')"; 
					 if ($conn->query($sql) === TRUE) { 
					 header(
			 	"Location: list-of-account-head");
			 	}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'New Account Category';
$page_subtitle = 'You are adding a New Account Category!';
$table_name = 'Account Category';
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
                                    <label for="firstname">Category Name</label>
                                    <div>
                                        <select required class="form-control" name="cat_name"  id="cat_name">
                      							<option value="1">Furniture etc</option>
              									</select>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Category Status</label>
                                    <div>
                                        <select required class="form-control" name="vou_type"  id="vou_type">
												<option value="2">Fixed Asset</option>
												<option value="1">Current Asset</option>
              									</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Details (If any)</label>
                                    <div>
                                        <textarea class="form-control" placeholder="Enter Note (if any)" name="head_note" id="head_note"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Sign up</button>
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