<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$cid =$_REQUEST['c_id'];
$cname =$_REQUEST['cname'];
$course_name =$_REQUEST['course'];
$did =$_REQUEST['did'];
	$sql = "SELECT * FROM lesson_pages WHERE lesson_id = '$cid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$lid = $row['lesson_id'];
			$ldept = $row['dept_id'];
			$lpos = $row['position_id'];
			$img = $row['image_name'];
			$lname = $row['lesson_name'];
			$ldes = $row['lesson_des'];
			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  $acname= $_POST['lesson'];
  $adesi= $_POST['des'];
  $aposi= $_POST['pos'];
  $acid= $_POST['ccid'];
  $abid= $_POST['bid'];
  $abname= $_POST['bname'];

			mysql_query( "UPDATE lesson_pages SET lesson_name = '$acname', lesson_des = '$adesi', position_id = '$aposi' WHERE lesson_id = '$acid'") or die(mysql_error()); 
							 header("Location: course-material-lesson?c_id=$abid&cname=$abname");
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Lesson';
$page_subtitle = 'Edit Lesson';
$table_name = 'Edit Lesson';
?>
<?php echo $main_header; ?>
<head>
    <script>
      $(document).ready(function() {
        $(".add").click(function() {
          $('<div><input class="files" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" >Remove</span></div>').appendTo(".contents");

        });
        $('.contents').on('click', '.rem', function() {
          $(this).parent("div").remove();
        });

      });
    </script>
  </head>
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
															<label>Lesson Name*</label>
															<div>
																<input required type="text" value="<?php echo $lname; ?>" name="lesson" id="lesson" class="form-control">	
														</div>
													</div>
													<!--/span-->
												<div class="form-group">
															<label>Position*</label>
															<div>
																<input required type="number" value="<?php echo $lpos; ?>" name="pos" id="pos" class="form-control">	
														</div>
													</div>
													<!--/span-->
												<div class="form-group">
															<label>Description*</label>
															<div>
															<textarea required type="text" name="des" id="des" class="form-control"><?php echo $ldes; ?></textarea>														
															</div>
													</div>
													<input type="hidden" value="<?php echo $cid; ?>" name="ccid" id="ccid" class="form-control">
													<input type="hidden" value="<?php echo $did; ?>" name="bid" id="bid" class="form-control">
													<input type="hidden" value="<?php echo $course_name; ?>" name="bname" id="bname" class="form-control">
													<!--/span-->
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