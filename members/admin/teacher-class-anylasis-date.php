<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$tech_id =$_REQUEST['teacher'];
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
function class_monitor($var2, $var3, $var4){
    require ("../includes/dbconnection.php");
    $sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND monitor_id = '$var3' AND date_teacher = '$var4' AND re_status = 1";
$result = mysqli_query($conn, $sql);
$totalRow = mysqli_fetch_array($result);
$total = $totalRow['total'];
echo $total;
}
function class_monitor_num($var2, $var3, $var4){
    require ("../includes/dbconnection.php");
    $sql = "SELECT history_id FROM class_history WHERE teacher_id = '$var2' AND monitor_id = '$var3' AND date_teacher = '$var4' AND re_status = 1";
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
function class_paid($var2, $a, $var4)
{
    require ("../includes/dbconnection.php");
    $date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
    $sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND date_teacher = '$var4' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$result = mysqli_query($conn, $sql);
$totalRow = mysqli_fetch_array($result);
$total = $totalRow['total'];
echo $total;
}
function class_paid_total($var2)
{
    require ("../includes/dbconnection.php");
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];

$sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND date_teacher >= '$date_start' AND date_teacher <= '$date_end' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$result = mysqli_query($conn, $sql);
$totalRow = mysqli_fetch_array($result);
$total = $totalRow['total'];
echo $total;
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

$sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND date_teacher >= '$date_start' AND date_teacher <= '$date_end' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$result = mysqli_query($conn, $sql);
$totalRow = mysqli_fetch_array($result);
$total = $totalRow['total'];
$hours=$total;

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;

echo "".$cur_id." ".$hoursAsDecimal*$rate_id."";
}

function class_paid_day($var2, $a, $var4)
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

$sql="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND date_teacher = '$var4' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$result = mysqli_query($conn, $sql);
$totalRow = mysqli_fetch_array($result);
$total = $totalRow['total'];
$hours=$total;

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;

echo "".$cur_id." ".$hoursAsDecimal*$rate_id."";
}
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$page_title = 'Teacher Class Analysis';
$page_subtitle = 'Teacher Class Analysis By Date';
$table_name = 'Teacher Class Search';
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
                                <div class="card-body"><h5 class="card-title"><?php $date1=date_create($date_start); echo date_format($date1,"D jS F Y"); ?> To <?php $date2=date_create($date_end); echo date_format($date2,"D jS F Y"); ?></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
								<thead>
								<tr>
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
								</tr>
								</thead>
								<tbody>
								<?php
// sending query
   $sql = "SELECT * FROM `class_history` WHERE teacher_id = '$tech_id' AND date_teacher >= '$date_start' AND date_teacher <= '$date_end' GROUP BY date_teacher";
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
			$admin_time = $row['atime_s_id'];
			$student_time = $row['stime_s_id'];
			$teacher_time = $row['time_s_id'];
			$teacher_id = $row['teacher_id'];
			$student_id = $row['course_id'];
			$parent_id = $row['parent_id'];
			$monitor = $row['monitor_id'];// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = $row['dept_id'];
			$pstr = $row['time_s_id'];
			$wa = $row['activation'];
			$status = $row['status'];// Regular, Trial, Rescheduled or Suspended
			$re_status = $row['re_status'];
			$his_date = $row['date_admin'];
?>
								<tr>
								<td>
									 <a href="teacher_date?&teacher=<?php echo $tech_id; ?>&date=<?php echo $his_date; ?>" target="_blank"><?php echo date('jS M-Y (D)',strtotime($his_date)); ?></a>
								</td>
								<td><?php echo class_monitor("$tech_id", "9", "$his_date"); ?> <?php class_monitor_num("$tech_id", "9", "$his_date"); ?></td>
								<td><?php echo class_monitor("$tech_id", "4", "$his_date"); ?> <?php class_monitor_num("$tech_id", "4", "$his_date"); ?></td>
								<td><?php echo class_monitor("$tech_id", "5", "$his_date"); ?> <?php class_monitor_num("$tech_id", "5", "$his_date"); ?></td>
								<td><?php echo class_monitor("$tech_id", "6", "$his_date"); ?> <?php class_monitor_num("$tech_id", "6", "$his_date"); ?></td>
								<td><?php echo class_monitor("$tech_id", "1", "$his_date"); ?> <?php class_monitor_num("$tech_id", "1", "$his_date"); ?></td>
								<td><?php echo class_monitor("$tech_id", "21", "$his_date"); ?> <?php class_monitor_num("$tech_id", "21", "$his_date"); ?></td>
								<td><?php echo class_paid("$tech_id","2", "$his_date"); ?></td>
								<td><?php echo class_paid_day("$tech_id","2", "$his_date"); ?></td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr>
								<td colspan="7" style="text-align:right">
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="teacher-class-anylasis-search">
				<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />
                                <div class="form-group">
<label>Month</label>
<div>
<select required class="form-control" name="month_id"  id="month_id">

<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM month ORDER BY month_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<label>Year</label>
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
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
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