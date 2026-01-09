<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  ?>
<?php
$pnid =base64_decode($_GET["course_id"]);
	$sql = "SELECT * FROM course Where course_id = $pnid";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$student_name = $row['course_yrSec'];
			$teacher_remarks = $row['remark_teacher'];
			}
			}
?>
<?php
$page_title = 'Details';
$page_subtitle = 'Details';
$table_name = 'Details;
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
							<?php 
// sending query
$pnid =base64_decode($_GET["course_id"]);
$sql = "SELECT `test_results`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `test_results`,`month`,`school_yr` WHERE test_results.m_id=month.month_id and test_results.y_id=school_yr.year_id HAVING course_id = $pnid ORDER BY m_id DESC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$test_r = $row['test_remarks'];
			$test_g = $row['test_grade'];
			$date_a = $row['taken_date_admin'];
			$year_a = $row['school_year'];
			$mon_a = $row['month_name'];
?>
<div class="alert alert-warning">
								<strong><?php echo $mon_a; ?>-<?php echo $year_a; ?></strong><br><br><?php echo $test_r; ?><br><br>
								Test Grade: <span class="label label-success">
							<?php echo $test_g; ?> </span>
								</div>
								<?php 	
		}
	}	
?>
							
						</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>