<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $cid =$_REQUEST['c_id'];
  $cidn =$_REQUEST['cname'];
?>
<?php 
$sql = "SELECT * FROM dept HAVING dept_id='$cid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$cname = $row['name'];
				}	
				}		
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Course: '.$cidn.'';
$page_subtitle = '<a href="course-material">Course Material</a> -- '.$cidn.'';
$table_name = 'Lesson Page';
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
                    <div class="row">
								<?php 
// sending query
$sql = "SELECT * FROM lesson_pages WHERE dept_id = $cid ORDER BY position_id ASC;";
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
?>
									<div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><a href="lesson-page?c_id=<?php echo $lid; ?>&did=<?php echo $cid; ?>&course=<?php echo $cidn; ?>&lesson=<?php echo $lname; ?>"><?php echo $lname; ?> </a></div>
                                        <div class="card-body"><a href="lesson-page?c_id=<?php echo $lid; ?>&did=<?php echo $cid; ?>&course=<?php echo $cidn; ?>&lesson=<?php echo $lname; ?>"><img src="../uploads/thumb/<?php echo $img; ?>" alt=""></a></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="lesson-page?c_id=<?php echo $lid; ?>&did=<?php echo $cid; ?>&course=<?php echo $cidn; ?>&lesson=<?php echo $lname; ?>"><button class="btn btn-success btn-lg">One Lessons</button></a>
                                        </div>
                                    </div>
                                    </div>
									<?php 	
		}
	}	
?>
								</div>
                        </div>
                     </div>
                    <!-- Table Row End -->
                    
                <!-- App inner end -->
<?php echo $footer; ?>