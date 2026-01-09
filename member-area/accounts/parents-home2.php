<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("../includes/session.php");
require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

include("header.php");
  $tt = $_SESSION['is']['parent_id'];
  $tz = $_SESSION['is']['timezone_id'];
  	$result1 = mysql_query("SELECT php_tz FROM time_zone WHERE tz_id='$tz' ");
			//HAVING course_id='$pCourse'
		if (!$result1) 
			{
			die("Query to show fields from table failed1");
			}
		$timezone = MYSQL_RESULT($result1,$i,"php_tz");
			 		$p_time = $timezone;			
date_default_timezone_set($p_time);
  $today = date("Y-m-d", time(true));
  $curt = date('h:i A', time(true));
			
  function timedif($var1, $var2, $var3){
$result1 = mysql_query("SELECT * FROM timestart Where time_s_id = '$var1'");
if (!$result1) 
	{
    die("Query to show fields from table failed2");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '0';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$stime = MYSQL_RESULT($result1,$i,"time_s");
				}
				$datetime1 = new DateTime($curt);
$datetime2 = new DateTime($stime);
$interval = $datetime1->diff($datetime2);
if ($datetime1 < $datetime2){ echo $interval->format('%hh %im'); }
elseif ($var3 == 2) { echo 'This is your class time'; }
else { echo '--';}
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
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	   
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
 ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot1 = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '0';
	}
else if ($numberOfRowsot1 > 0) 
	{
	echo $numberOfRowsot1;
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
                $tt = $_SESSION['is']['parent_id'];
// sending query
   $result = mysql_query("SELECT `class_history`.*,`profile`.* FROM `class_history`,`profile` WHERE class_history.date_student = '$today' and class_history.parent_id = '$tt' and profile.teacher_id = class_history.teacher_id ORDER BY start_time_S;");
   $counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed34");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">Hurry! There is no class today...</div>';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
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
			$history_id = MYSQL_RESULT($result,$i,"history_id");
			$student_id = MYSQL_RESULT($result,$i,"course_id");
			$teacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$admin_timeS = MYSQL_RESULT($result,$i,"start_time_A");
			$admin_timeE = MYSQL_RESULT($result,$i,"end_time_A");
			$student_timeS = MYSQL_RESULT($result,$i,"start_time_S");
			$student_timeE = MYSQL_RESULT($result,$i,"end_time_S");
			$teacher_timeS = MYSQL_RESULT($result,$i,"time_start");
			$teacher_timeE = MYSQL_RESULT($result,$i,"time_end");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$adept_id = MYSQL_RESULT($result,$i,"adept_id");
			$class_type = MYSQL_RESULT($result,$i,"type");// Rescheduled, Makeup, Extra or Regular
			$status = MYSQL_RESULT($result,$i,"status");// Regular, Trial, Rescheduled or Suspended
			$mnp = MYSQL_RESULT($result,$i,"monitor_id");// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$parent_id= MYSQL_RESULT($result,$i,"parent_id");
			$a_date = MYSQL_RESULT($result,$i,"date_admin");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$s_date = MYSQL_RESULT($result,$i,"date_student");
			$restatus = MYSQL_RESULT($result,$i,"re_status");
			$g_id = MYSQL_RESULT($result,$i,"g_id");
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