<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Course Material';
$page_subtitle = 'Course Material All';
$table_name = 'Course Material';
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
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Regular Courses</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                <span>Addition Courses</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                <span>Learning Material</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                        <?php 
// sending query
$sql = "SELECT * FROM dept WHERE type_id = 1 ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];
?>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><?php echo $dcname; ?></a></div>
                                        <div class="card-body"><a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><img src="../uploads/thumb/<?php echo $img; ?>" alt=""></a></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-success btn-lg">Open Course</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
                                    </div>
                        </div>
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                        <div class="row">
                        <?php 
// sending query
$sql = "SELECT * FROM dept WHERE type_id = 3 ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];
?>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><?php echo $dcname; ?></a></div>
                                        <div class="card-body"><a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><img src="../uploads/thumb/<?php echo $img; ?>" alt=""></a></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="edit-course-image?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-success btn-lg">Edit Image</button></a>
                                            <a href="edit-course?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-info btn-lg">Edit Course</button></a>
                                            <a href="add-new-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-success btn-lg">Add Lesson</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
                                    </div>
                        </div>
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-2" role="tabpanel">
                        <div class="row">
                        <?php 
// sending query
$sql = "SELECT * FROM dept WHERE type_id = 2 ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];
?>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><?php echo $dcname; ?></a></div>
                                        <div class="card-body"><a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><img src="../uploads/thumb/<?php echo $img; ?>" alt=""></a></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="edit-course-image?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-success btn-lg">Edit Image</button></a>
                                            <a href="edit-course?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-info btn-lg">Edit Course</button></a>
                                            <a href="add-new-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button class="btn btn-success btn-lg">Add Lesson</button></a>
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
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>