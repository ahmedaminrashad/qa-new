<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$cn= $_POST['con_name'];
		 	$ca= $_POST['con_ab'];
		 	$sql = "INSERT INTO country (c_a, c_name) VALUES('$cn', '$ca')"; 
		 	if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: list-of-country");
			 	}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
				}
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
                                    <label for="firstname">Country Name</label>
                                    <div>
                                        <input type="text" class="form-control" id="con_name" name="con_name" placeholder="E.G Kuwait" required/>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Country Abbreviation</label>
                                    <div>
                                        <input type="text" class="form-control" id="con_ab" name="con_ab" placeholder="E.G KU" required/>
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