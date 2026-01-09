
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

<?php session_start(); ?>
<?php
  include("../includes/session.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'] ?? null;
  $tz = $_SESSION['is']['timezone_id'] ?? null;
  
  // Get timezone using prepared statement
  if ($tz) {
      $timezone_data = db_fetch_one("SELECT php_tz FROM time_zone WHERE tz_id = ?", [$tz], 'i');
      if ($timezone_data) {
          $p_time = $timezone_data['php_tz'];
          date_default_timezone_set($p_time);
      }
  }
  
  $today = date("Y-m-d", time(true));
  $curt = date('h:i A', time(true));
  
  // Refactored timedif function using prepared statements
  function timedif($var1, $var2, $var3) {
      global $curt;
      
      // Validate input
      if (empty($var1)) {
          echo '0';
          return;
      }
      
      // Use prepared statement
      $result = db_fetch_one("SELECT time_s FROM timestart WHERE time_s_id = ?", [$var1], 'i');
      
      if (!$result) {
          echo '0';
          return;
      }
      
      $stime = $result['time_s'];
      $datetime1 = new DateTime($curt);
      $datetime2 = new DateTime($stime);
      $interval = $datetime1->diff($datetime2);
      
      if ($datetime1 < $datetime2) {
          echo $interval->format('%hh %im');
      } elseif ($var3 == 2) {
          echo 'This is your class time';
      } else {
          echo '--';
      }
  }

	include("monitoring-functions.php");
function ttm($t1, $t2){
$startTime = new DateTime($t1);
$endTime = new DateTime($t2);
$duration = $startTime->diff($endTime); //$duration is a DateInterval object
echo $duration->format("%H:%I");
}
?>
<?php echo $main_header; ?>
<head>
    <link href="../assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
<script>
setTimeout(function(){
   window.location.reload(1);
}, 60000);
</script>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
.cards {
   display: flex;
   justify-content: space-between;
}
</style>

</head>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php 
if ($tt) {
    $invoice_count = db_fetch_all("SELECT COUNT(*) as count FROM invoice WHERE status = 1 AND parent_id = ?", [$tt], 'i');
    $numberOfRowsot = !empty($invoice_count) ? $invoice_count[0]['count'] : 0;
    
    if ($numberOfRowsot > 0) {
        echo '<span class="badge badge-default">' . htmlspecialchars($numberOfRowsot, ENT_QUOTES, 'UTF-8') . '</span>';
    }
}
 ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php 
if ($tt) {
    $invoice_data = db_fetch_all("SELECT COUNT(*) as count FROM invoice WHERE status = 1 AND parent_id = ?", [$tt], 'i');
    $numberOfRowsot1 = !empty($invoice_data) ? $invoice_data[0]['count'] : 0;
    echo htmlspecialchars($numberOfRowsot1, ENT_QUOTES, 'UTF-8');
} else {
    echo '0';
}
 ?> Invoice(s)</strong> unpaid</h3>
								<a href="ind_details">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/user-alt-128.png">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['parent']; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>List of Today's<small> Classes</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					  Below is the list of classes scheduled on <b><?php echo date("l jS F Y", time(true)); ?></b>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-12" style ="BACKGROUND-COLOR: #fffff">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
							    <div class="card">
  	<?php
                $tt = $_SESSION['is']['parent_id'] ?? null;
                
// sending query using prepared statement
   if ($tt) {
       $result_rows = db_fetch_all(
           "SELECT `class_history`.*, `profile`.* FROM `class_history`, `profile` 
            WHERE class_history.date_student = ? AND class_history.parent_id = ? 
            AND profile.teacher_id = class_history.teacher_id 
            ORDER BY start_time_S",
           [$today, $tt],
           'si'
       );
       
       $numberOfRows = count($result_rows);
       
       if ($numberOfRows == 0) {
           echo '<div class="label label-info">Hurry! There is no class today...</div>';
       } else {
           $i = 0;
           foreach($result_rows as $row)
		{		
			if($row['monitor_id']=='2') //waiting
				{
					$bgcolor ='#F5A9A9';
				}
			else if($row['monitor_id']=='3') //running
				{
					$bgcolor ='#F2F5A9';
				}		
			else if($row['monitor_id']=='4') //absent
				{
					$bgcolor ='#F9BCBC';
				}
			else if($row['monitor_id']=='5') //leave
				{
					$bgcolor ='#C3C3FA';
				}
			else if($row['monitor_id']=='6') //declined
				{
					$bgcolor ='#CEECF5';
				}
			else if($row['monitor_id']=='7') //still pending
				{
					$bgcolor ='#F5D0A9';
				}
			else if($row['monitor_id']=='8') //taken advance
				{
					$bgcolor ='#D8D8D8';
				}
			else if($row['monitor_id']=='9') //taken
				{
					$bgcolor ='#BCF5A9';
				}
			else
				{
					$bgcolor ='#fffff'; // pending
				}
			$history_id = $row['history_id'] ?? null;
			$student_id = $row['course_id'] ?? null;
			$teacher_id = $row['teacher_id'] ?? null;
			$admin_timeS = $row['start_time_A'] ?? null;
			$admin_timeE = $row['end_time_A'] ?? null;
			$student_timeS = $row['start_time_S'] ?? null;
			$student_timeE = $row['end_time_S'] ?? null;
			$teacher_timeS = $row['time_start'] ?? null;
			$teacher_timeE = $row['time_end'] ?? null;
			$dept_id = $row['dept_id'] ?? null;
			$adept_id = $row['adept_id'] ?? null;
			$class_type = $row['type'] ?? null; // Rescheduled, Makeup, Extra or Regular
			$status = $row['status'] ?? null; // Regular, Trial, Rescheduled or Suspended
			$mnp = $row['monitor_id'] ?? null; // pending, taken, absent, leave, taken advance, running, waiting or still pending
			$parent_id = $row['parent_id'] ?? null;
			$a_date = $row['date_admin'] ?? null;
			$t_date = $row['date_teacher'] ?? null;
			$s_date = $row['date_student'] ?? null;
			$restatus = $row['re_status'] ?? null;
			$g_id = $row['g_id'] ?? null;
?>								


</div>
							<div class="card"><div style="<?php echo 'background: '.$bgcolor;?>;">
							    <div class="timeline-body-content" >
									<span class="font-grey-cascade">
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
						
										<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
											    <?php  if($g_id==1){echo '<img src="https://quransquare.com/resources/newassets/images/man.png" alt="">';}else{echo '<img src="https://quransquare.com/resources/newassets/images/woman.png" alt="">';}?>
											
											</div>
											<div class="booking-info" style="margin-top: 22px;">
												<h2>
												<a >
											<?php  if($g_id==1){echo "Shaikh ";}else{echo "Sister ";}echo TeacherName("$teacher_id");?> </a>
												</h2>
												<ul class="stars list-inline" style="color: #f8be2c;margin:  0px 0px 0px 0px;">
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
												<!--	<li>
														<i class="fa fa-star-empty"></i>
													</li>-->
												</ul>
												<p>
													 <strong style="color:#000000;"><?php echo  DeptName("$dept_id"); ?></strong>
												</p>
											</div>
										</div>
									</div>
							 
							
							</tr>
										<tr>
							    <td>
								       <strong style="color:#000000;">Class Time </strong>
								      
								</td>
									<td>
								    <strong style="color:#000000;"> <?php echo date("g:i a", strtotime($student_timeS)); ?> (<?php echo ttm($teacher_timeS, $teacher_timeE); ?>) </strong>
								    </td>
							
							</tr>
								<tr>
							    <td>
								       <strong style="color:#000000;">Student Name</strong> 
								</td>
									<td>
								   <strong style="color:#000000;">   <?php echo StudentName("$student_id"); ?>  <?php //if ($class_type == 1){ echo ''; } elseif ($class_type == 2){ echo '<span class="label label-sm label-success">Extra</span>'; } elseif ($class_type == 3){ echo '<span class="label label-sm label-warning">Re-Scheduled</span>'; } ?></strong>
								    </td>
							
							</tr>
							<tr>
							    <td>
								      <strong style="color:#000000;">History </strong>
								</td>
									<td>
								     <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>"><b>History</b></a>
								    </td>
							
							</tr>
						<!--	<tr>
							    	 <td>
								      <strong style="color:#000000;">Course </strong>
								</td>
									<td>
								       <?php //echo DeptName("$dept_id"); ?>
								</td>
							</tr>-->
							<tr>
								<td>
							    	 <strong style="color:#000000;">Status </strong>
								</td>
								<td colspan="4">
									 <strong style="color:#000000;">	<?php 
								if ($status == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } 
								elseif ($status == 17){ echo '<span class="label label-sm label-danger">Suspended</span>'; } 
								elseif ($status == 18){ echo '<span class="label label-sm label-danger">Shifted</span>'; }
								elseif ($status == 19){ echo '<span class="label label-sm label-danger">Advance</span>'; } 
								elseif ($status == 20){ echo '<span class="label label-sm label-danger">Re-Scheduled</span>'; } 
								elseif ($status == 21){ echo '<span class="label label-sm label-warning">Extra</span>'; }
								else { echo '<span class="label label-sm label-success">Regular</span>'; } ?></strong>
								</td>
								
							</tr>
						
							
							</tbody>
								</table>
								</div>
								<div  style='width: 100%;'>
								  	 <strong style="color:#000000;">  <?php 
							    	if ($mnp == 1 && $status != 17){echo "<a class='invoicelink' href='#invoice' data-toggle='modal' data-target='#invoice' history-id=".$history_id." teacher-id=".$teacher_id."><button type='button'   style='width: 100%; '  class='btn blue btn-xs' title='If this is your class time, please click to join the class room.'>Join To Classroom</button></a>";} 
							    	elseif ($mnp == 9) { echo '<button type="button" style="width: 100%; " class="btn green btn-xs ">Taken</button>'; } 
							    	elseif ($mnp == 4) { echo '<button type="button" style="width: 100%; " class="btn red btn-xs ">Absent</button>'; } 
							    	elseif ($mnp == 5) { echo '<button type="button" style="width: 100%; " class="btn blue btn-xs ">On Leave</button>'; }
							    	elseif ($mnp == 6){echo   '<button type="button" style="width: 100%; " class="btn red btn-xs ">Declined</button>';}
							    	elseif ($mnp == 7){echo   '<button type="button" style="width: 100%; " class="btn red btn-xs ">Pending</button>';}
							    	elseif ($mnp == 8){echo   '<button type="button" style="width: 100%; " class="btn red btn-xs ">Advance</button>';} ?></strong>
							    <strong style="color:#000000;">	<?php if ($mnp == 2 OR $mnp == 3) {echo "<a class='invoicelink' href='#invoice' data-toggle='modal' data-target='#invoice' history-id=".$history_id." teacher-id=".$teacher_id."><button type='button' style='width: 100%;' class='btn blue btn-xs' title='Teacher is in the class, if you want to join, please click'>Join To Classroom</button></a>";} else {echo "";} ?></strong>
                                    
								</div>
						  
								</div>
							</div>
							</div>
							<?php 	
           $i++;
           }
       }
   } else {
       echo '<div class="label label-info">No parent ID found. Please contact administrator.</div>';
   }
?>
 
							
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="modal fade bs-modal-lg" id="invoice" tabindex="-1" role="dialog" style="width: auto; background: #0000;" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>


<script>
$('.invoicelink').click(function(){
    var famID=$(this).attr('history-id');
    var famAmu=$(this).attr('teacher-id');

    $.ajax({url:"classcheck.php?famID="+famID+"&famAmu="+famAmu,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>