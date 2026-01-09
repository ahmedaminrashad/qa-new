<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  include("monitoring-functions.php");
  $tech_id =$_REQUEST['teacher'];
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
function class_monitor($var1, $var2, $var3){
require ("../includes/dbconnection.php");
require ("../includes/dbconnection.php");
    $date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
    $sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE course_id = '$var1' AND teacher_id = '$var2' AND monitor_id = '$var3' AND date_teacher >= '$date_start' AND date_teacher <= '$date_end'";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
if ($total != 0){echo $total;}
else {echo $total;}
}
function class_monitor_num($var1, $var2, $var3){
require ("../includes/dbconnection.php");
    $date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
    $sql = "SELECT history_id FROM class_history WHERE course_id = '$var1' AND teacher_id = '$var2' AND monitor_id = '$var3' AND date_teacher >= '$date_start' AND date_teacher <= '$date_end'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo "(".$numberOfRows.")";
}
}

function class_paid($var1, $var2, $a)
{
require ("../includes/dbconnection.php");
    $date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
    $sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE course_id = '$var1' AND re_status != 2 AND teacher_id = '$var2' AND date_admin >= '$date_start' AND date_admin <= '$date_end' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
if ($total != 0){echo $total;}
else {echo $total;}
}
function class_paid_total($var2)
{
require ("../includes/dbconnection.php");
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND date_admin >= '$date_start' AND date_admin <= '$date_end' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
if ($total != 0){echo $total;}
else {echo $total;}
}
function class_paid_amu($var2)
{
require ("../includes/dbconnection.php");
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
$tech_id =$_REQUEST['teacher'];
$sql = "SELECT * FROM profile WHERE teacher_id = '$tech_id'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
	$rate_id = $row['hour_rate'];
	$cur_id = $row['currency'];
	}
	}

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND date_teacher >= '$date_start' AND date_teacher <= '$date_end' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;
    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
   $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;

echo "".$cur_id." ".$hoursAsDecimal*$rate_id."";
}

function class_paid_day($var1, $var2, $var4)
{
require ("../includes/dbconnection.php");
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
$tech_id =$_REQUEST['teacher'];
$sql = "SELECT * FROM profile WHERE teacher_id = '$tech_id'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
	$rate_id = $row['hour_rate'];
	$cur_id = $row['currency'];
	}
	}

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE course_id = '$var1' AND teacher_id = '$var2' AND re_status != 2 AND date_teacher >= '$date_start' AND date_teacher <= '$date_end' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;
$hms = explode(":", $hours);
   list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
   $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;

echo "".$cur_id." ".$hoursAsDecimal*$rate_id."";
}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$page_title = 'Class Details';
$page_subtitle = 'Class Details By Student';
$table_name = 'Class Details By Student';
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
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Taken
								</th>
								<th>
									 Absent
								</th>
								<th>
									 Leave
								</th>
								<th>
									 Declined
								</th>
								<th>
									 Pending
								</th>
								<th>
									 Holiday
								</th>
								<th>
									 Paid
								</th>
								<th>
									 Amount
								</th>
								<?php
// sending query
   $sql = "SELECT * FROM `class_history` WHERE teacher_id = '$tech_id' AND date_teacher >= '$date_start' AND date_teacher <= '$date_end' GROUP BY course_id";
   $counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$sched_id = $row['history_id'];
			$teacher_id = $row['teacher_id'];
			$student_id = $row['course_id'];
			$parent_id = $row['parent_id'];
			$monitor = $row['monitor_id'];// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = $row['dept_id'];
			$wa = $row['activation'];
			$status = $row['status'];// Regular, Trial, Rescheduled or Suspended
			$re_status = $row['re_status'];
			$his_date = $row['date_admin'];
?>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo StudentName("$student_id"); ?>
								</td>
								<td><?php echo class_monitor("$student_id","$tech_id", "9"); ?> <?php echo class_monitor_num("$student_id","$tech_id", "9"); ?></td>
								<td><?php echo class_monitor("$student_id","$tech_id", "4"); ?> <?php echo class_monitor_num("$student_id","$tech_id", "4"); ?></td>
								<td><?php echo class_monitor("$student_id","$tech_id", "5"); ?> <?php echo class_monitor_num("$student_id","$tech_id", "5"); ?></td>
								<td><?php echo class_monitor("$student_id","$tech_id", "6"); ?> <?php echo class_monitor_num("$student_id","$tech_id", "6"); ?></td>
								<td><?php echo class_monitor("$student_id","$tech_id", "1"); ?> <?php echo class_monitor_num("$student_id","$tech_id", "1"); ?></td>
								<td><?php echo class_monitor("$student_id","$tech_id", "21"); ?> <?php echo class_monitor_num("$student_id","$tech_id", "21"); ?></td>
								<td><?php echo class_paid("$student_id","$tech_id","2"); ?></td>
								<td><?php echo class_paid_day("$student_id", "$tech_id", "$his_date"); ?></td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr>
								<td colspan="8" style="text-align:right">
									 <span class="caption-subject bold font-green-sharp">Total</span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_paid_total("$tech_id"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_paid_amu("$tech_id"); ?></span>
								</td>
							</tr>
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.month_id.value = ("<?php echo $mm_id; ?>");
	form.year_id.value = ("<?php echo $yy_id; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
function goBack() {
    window.history.back();
}
</script>