<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("monitoring-functions.php");
   $link = $_SERVER['REQUEST_URI'];
   $ccc =$_REQUEST['course'];
   ?>
<?php
$page_title = 'Active Disputes';
$page_subtitle = 'Active Disputes';
$table_name = 'Active Disputes';
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
                            <div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                <a href="admin-home-disputes"><button class="mb-2 mr-2 btn btn-shadow btn-info">
                                        Active Disputes</button></a>
                                    <a href="invalid-disputes"><button class="mb-2 mr-2 btn btn-shadow btn-danger">
                                        Invalid Disputes</button></a>
                                    <a href="resolved-disputes"><button class="mb-2 mr-2 btn btn-shadow btn-success">
                                        Resolved Disputes</button></a>
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
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
								<thead>
<tr>
<th>
Parent
</th>
<th>
Student
</th>
<th>
Teacher
</th>
<th>
Class Date
</th>
<th>
Reported Date
</th>
<th>
Status
</th>
<th>
&nbsp;
</th>
<th>
&nbsp;
</th>
</tr>
								</thead>
								<tbody>
<?php 
// sending query
$tt = $_SESSION['is']['teacher_id'];
$sql = "SELECT * FROM `class_disputes` WHERE status = 1 ORDER BY reported";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){				
			$dispute_id = $row['dispute_id'];
$parent_id = $row['parent_id'];
$student_name = $row['student_name'];
$teacher_id = $row['teacher_id'];
$date = $row['date'];
$status = $row['status'];
$reported = $row['reported'];
$teacher_name = $row['teacher_name'];
$parent_name = $row['parent_name'];
$student_id = $row['student_id'];
$history_id = $row['history_id'];
?>
							
								<tr>
<td>
<a target="_blank" href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo $parent_name; ?></a>
</td>
<td>
<a target="_blank" href="student-schedule?pT=<?php echo base64_encode($student_id); ?>"><?php echo $student_name; ?></a>
</td>
<td>
<a target="_blank" href="teacher-schedule?pT=<?php echo $teacher_id; ?>"><?php echo $teacher_name; ?></a>
</td>
<td>
<a target="_blank" href="teacher_date?&teacher=<?php echo $teacher_id; ?>&date=<?php echo $date; ?>"><?php echo date('D jS F-Y', strtotime($date)); ?></a>
</td>
<td>
<?php echo date('h:i A D jS F-Y', strtotime($reported)); ?>
</td>
<td>
<?php if ($status == 1) { echo '<div class="ml-auto badge badge-info">Pending</div>'; } elseif ($status == 2) { echo '<div class="ml-auto badge badge-danger">Invalid</div>'; } elseif ($status == 3) { echo '<div class="ml-auto badge badge-success">Resolved</div>'; }?>
</td>
<td>
<a href="mark-invalid?dispute_id=<?php echo $dispute_id; ?>&user=<?php echo $ID; ?>"><button title="Mark as Invalid" type="button" style="width: 75px" class="mb-2 mr-2 btn btn-danger">Invalid</button></a>
</td>
<td>
<a href="mark-resolved?dispute_id=<?php echo $dispute_id; ?>&user=<?php echo $ID; ?>"><button title="Mark as Resolved" type="button" style="width: 75px" class="mb-2 mr-2 btn btn-success">Resolve</button></a>
</td>
</tr>
							<?php 	
	
		}
	}	
?>
								</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>