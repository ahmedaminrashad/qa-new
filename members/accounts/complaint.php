<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $t = $_SESSION['is']['parent'];
  $tt = $_SESSION['is']['parent_id'];
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
			 header(
			 		"Location: new_complaint?pdept=". $_POST['pdept']				
		 		   );				   				   
		//	}		 	 
			}
		 //	$hidden_pdept= $_POST['hidden_pdeptid'];
?>
<?php
$page_title = 'Register a Complaint';
$page_subtitle = 'Register a Complaint';
$table_name = 'Register a Complaint';
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="new_complaint">
										<div class="form-group">
															<label>Select Student</label>
															<div>
															<select required class="form-control" name="pdept"  id="pdept" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$tt = $_SESSION['is']['parent_id'];
				$sql = "SELECT * FROM course WHERE parent_id = '$tt'";	
				$result = mysqli_query($conn, $sql);		  	
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_yrSec'];?> </option>
  <?php } ?>
</select>															</div>
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