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
		 	$hn= $_POST['head_name'];
		 	$hd= $_POST['head_note'];
		 	$hc= $_POST['ac_cat'];
			$sql = "INSERT INTO accounts_head (account_head_name, note, account_cat_id)
					VALUES('" . mysqli_real_escape_string($conn, $hn) . "','" . mysqli_real_escape_string($conn, $hd) . "','$hc')"; 
					if ($conn->query($sql) === TRUE) { 
					echo "<script>window.open('list-of-account-head','_self')</script>";
			 	}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Head Account';
$page_subtitle = 'You are adding new Head Account';
$table_name = 'Head Account';
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
                                <div class="card-body"><h5 class="card-title"><?php echo $table_name; ?></h5>
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Account Category</label>
                                    <select name="ac_cat"  id="ac_cat" class="form-control" required>
                                                    <?php 
                                                    $sql = "SELECT * FROM accounts_cat ORDER BY accounts_cat_id";
$counter = 0;
$result = mysqli_query($conn, $sql);			  	
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['accounts_cat_id'];?>"><?php echo $row['accounts_cat_name'];?></option>
                      <?php }  ?>
                                                </select></div>
                                                </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Account Head Title</label>
                                    <div>
                                        <input required type="text" placeholder="e.g. Electric Bill" name="head_name" id="head_name" class="form-control">
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