<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $Course_ID =base64_decode($_GET["Course_ID"]);
date_default_timezone_set($TimeZoneCustome);
$monid = date('n');
$sy = date('Y');
$monthNum  = $monid;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F');
function history($con){
require ("../includes/dbconnection.php");
$Course_ID =base64_decode($_GET["Course_ID"]);
			$sql = "SELECT course_id, date_admin FROM `class_history` WHERE date_admin = '$con' AND course_id = '$Course_ID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
				// $this_course_ID = $row['course_id'];
			$fff = $row['monitor_id'];
			$course = $row['course_id'];
			$addate = $row['date_admin'];
			echo '<a href="history-details?cour='.$course.'&adate='.$addate.'"><button class="mb-2 mr-2 btn btn-outline-info">See Details</button></a>';
				}
				}
}

function sum1($con){
require ("../includes/dbconnection.php");
$Course_ID =base64_decode($_GET["Course_ID"]);
			$sql = "SELECT history_id FROM `class_history` WHERE date_admin = '$con' AND course_id = '$Course_ID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '#fff';
			}
		elseif ($numberOfRows > 0) 
			{
				echo '#BCF5A9';
				}
}

function uuu($con){
require ("../includes/dbconnection.php");
$Course_ID =base64_decode($_GET["Course_ID"]);
			$sql = "SELECT history_id, start_time, end_time, re_status, monitor_id, teacher_id FROM class_history WHERE date_admin = '$con' AND course_id = '$Course_ID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$monitor = $row['monitor_id'];
			$teacher = $row['teacher_id'];
			$start_t = $row['start_time'];
			$end_t = $row['end_time'];
			$re_status = $row['re_status'];
			if ($re_status == 2){
$set_icon= '<i class="fa fa-check"></i>';
}
if ($monitor == 2){
$set= '<div class="ml-auto badge badge-warning">';
$na = 'Waiting';
}
elseif ($monitor == 3){
$set='<div class="ml-auto badge badge-warning">';
$na = 'Runing';
}
elseif ($monitor == 4){
$set='<div class="ml-auto badge badge-info">';
$na = 'Absent';
}
elseif ($monitor == 5){
$set='<div class="ml-auto badge badge-info">';
$na = 'Leave';
}
elseif ($monitor == 6){
$set='<div class="ml-auto badge badge-info">';
$na = 'Absent';
}
elseif ($monitor == 8){
$set='<div class="ml-auto badge badge-info">';
$na = 'Taken Advance';
}
elseif ($monitor == 7){
$set='<div class="ml-auto badge badge-danger">';
$na = 'Pending';
}
elseif ($monitor == 9){
$set='<div class="ml-auto badge badge-success">';
$na = 'Taken';
}
elseif ($monitor == 1){
$set='<div class="ml-auto badge badge-danger">';
$na = 'Pending';
}
$sql = "SELECT * FROM profile Where teacher_id = '$teacher'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
$teacher_name = $row['teacher_name'];
}
			$start_date = new DateTime("$start_t");
			$end_date = new DateTime("$end_t");
			$interval = $start_date->diff($end_date);
    echo ''.$set.''.$set_icon.' '.$interval->h.':' . $interval->i.':'.$interval->s.' '.$attend.' ('.$teacher_name.')</div> ';
	
		}
	}}


?>
<?php
$page_title = 'Lesson History';
$page_subtitle = 'History Details';
$table_name = 'Lesson History';
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
                                <div>Class History of <?php
				$Course_ID =base64_decode($_GET["Course_ID"]);
				$sql = "SELECT * FROM course HAVING course_id='$Course_ID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$hidden_pcourse = $row['course_yrSec'];
					echo ''.$hidden_pcourse.' for '.$monthName.'-'.$sy.'';
			}
			}				
				?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                <a href="#invoice" data-toggle="modal" data-target="#invoice"><button class="mb-2 mr-2 btn btn-shadow btn-danger">Search for Previous Month</button></a>
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
									 Date/Day
								</th>
								<th>
									 Classes
								</th>
								<th>
									 Details
								</th>
								</tr>
								</thead>
								
								<tbody>
								<?php
$date = ''.$sy.'-'.$monid.'-01';
$end = ''.$sy.'-'.$monid.'-' . date('t', strtotime($date)); //get end date of month
?>
<?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('Y-m-d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    ?>
    
								<tr bgcolor="<?php echo sum1("$day_num"); ?>">
								<td><?php echo $day_num; ?> - <?php echo $day_name; ?></td>
								<td><?php echo uuu("$day_num"); ?></td>
								<td><?php echo history("$day_num","$Course_ID"); ?></td>
    							</tr>
    							<?php 	
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search for Previous Month</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="history_course_search">
				<input type="hidden" id="Course_ID" name="Course_ID"  value="<?php echo $Course_ID; ?>" />
                                <div class="form-group">
                                    <label for="lastname">Month</label>
                                    <div>
                                        <select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM month ORDER BY month_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['month_id'];?>"><?php echo $row['month_name'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Year</label>
                                    <div>
                                        <select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Search</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->