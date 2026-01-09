<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $sy11 = date('Y-m-d');
if (isset($_POST['cmdSubmit'])) 
  	{ 	require ("../includes/dbconnection.php");
			$req_id= $_POST['reqid'];
		 	$msg= $_POST['comment'];
		 	$date= $_POST['dateid'];
		 	$sql = "INSERT INTO new_request_comments (request_id, comment, date)
					VALUES('$req_id', '" . mysqli_real_escape_string($conn, $msg) . "', '$date')"; 
		 	if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: list-of-new-request");
			 	}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
				}
?>
<?php
$sy = date('Y-m-d');
$page_title = 'Add  Note';
$page_subtitle = 'You are adding Note for new request';
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
                                    <input type="hidden" value="<?php echo $_REQUEST['req']; ?>" name="reqid" id="reqid" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy11; ?>" name="dateid" id="dateid" class="form-control input-circle">
                                <div class="form-group">
                                    <label for="firstname">Request Name</label>
                                    <div>
                                        <input type="text" value="<?php echo $_REQUEST['name']; ?>" name="con_name" id="con_name" class="form-control input-circle" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Write Note</label>
                                    <div>
                                        <textarea class="form-control input-circle" placeholder="Enter Your Note" name="comment" id="comment"></textarea>
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