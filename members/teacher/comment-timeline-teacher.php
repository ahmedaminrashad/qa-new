<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $sid  =$_REQUEST['studentid'];
?>
<?php
$page_title = 'Teacher Notes Timeline';
$page_subtitle = 'Teacher Notes Timeline';
$table_name = 'Teacher Notes Timeline';
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
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
							<?php 
// sending query
$sql = "SELECT * FROM note_student WHERE course_id = $sid ORDER BY note_id DESC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$anid = $row['note_id'];
			$anote = $row['note_text'];
			$astatus = $row['status'];
			$adate = $row['date'];
			$atime = $row['time'];
			$asid = $row['course_id'];
			$atid = $row['teacher_id'];
			$asname = $row['student_name'];
			$atname = $row['teacher_name'];
			$apid = $row['parent_id'];
			$ardate = $row['read_date'];
			$artime = $row['read_time'];
			$afb = $row['feed_back'];
?>
								<div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title"><?php echo $atname; ?></h4>
                                                            <p><strong><?php echo $asname; ?>:</strong> <?php echo $anote; ?></p>
                                                            <p><?php if ($astatus > 1){echo '<strong>FeedBack</strong> '.$afb.'';} else {echo '';} ?></p>
                                                            <p><?php if ($astatus == 1){echo '<div class="ml-auto badge badge-danger">Pending</div>';} elseif ($astatus > 1){echo '<div class="ml-auto badge badge-success">Cleared On '.$ardate.' ('.$artime.')</div>';} ?></p>
                                                            <span class="vertical-timeline-element-date"><?php echo $adate; ?></span>
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
                    </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>