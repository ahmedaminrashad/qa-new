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
		 	$issue= $_POST['issue'];
		 	$end= $_POST['end'];
		 	$cat= $_POST['cat'];
		 	$msg= mysqli_real_escape_string($conn, $_POST['msg']);
		 	$sql = "INSERT INTO announcement (ann_date, ann_cat, ann_msg, ann_end)
					VALUES('$issue', '$cat', '$msg', '$end')"; 
		 	if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: current-announcement");
			 	}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
				}
?>
<?php
$page_title = 'Add Announcement';
$page_subtitle = 'You are adding an Announcement!';
$table_name = 'Add Announcement';
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
                                    <label for="firstname">Shown From Date: </label>
                                    <div>
                                        <input required type="date" name="issue" id="issue" class="form-control"/>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Till this date: </label>
                                    <div>
                                        <input required type="date" name="end" id="end" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Select Level: </label>
                                    <div>
                                        <select required class="form-control" name="cat"  id="cat" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="17">All</option>
                      							<option value="2">Directors</option>
												<option value="3">Secretary</option>
												<option value="4">Senior Managers</option>
												<option value="5">Floor Managers</option>
												<option value="7">CSRs</option>
												<option value="8">Teachers</option>
												<option value="9">Accountants</option>
              									</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Announcement</label>
                                    <div>
                                        <textarea class="form-control input-circle" placeholder="Enter Your Announcement" name="msg" id="msg"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Create Announcement</button>
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