<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
function Teachers($var, $var2){
    require ("../includes/dbconnection.php");
$sql = "SELECT * FROM schedule_approval Where requested_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<button class="mb-2 mr-2 btn btn-outline-danger"><i class="fa fa-user"></i> 0</button>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<a class="split" href="#invoice" data-toggle="modal" data-target="#invoice" data="'.$var.'" name="'.$var2.'"><button class="mb-2 mr-2 btn btn-outline-success"><i class="fa fa-user"></i> '.$numberOfRows.'</button>';
			}
}
?>
<?php
$page_title = 'List of Requested Schedule';
$page_subtitle = 'List of Requested Schedule';
$table_name = 'List of Requested Schedule';
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
#
</th>
<th>
Student Name
</th>
<th>
Time-Zone
</th>
<th>
Desired Time
</th>
<th>
Monday
</th>
<th>
Tuesday
</th>
<th>
Wednesday
</th>
<th>
Thursday
</th>
<th>
Friday
</th>
<th>
Saturday
</th>
<th>
Sunday
</th>
<th>
Teachers
</th>
<th>

</th>
</tr>
</thead>
<tbody>
<?php
// sending query
$sql = "SELECT * FROM requested_schedule ORDER BY requested_id ASC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$requested_id = $row['requested_id'];
$status = $row['status'];
$student_id = $row['student_id'];
$student_name = $row['student_name'];
$student_Tzone = $row['student_Tzone'];
$start_time = $row['start_time'];
$end_time = $row['end_time'];
$needs = $row['needs'];
$day1 = $row['day1'];
$day2 = $row['day2'];
$day3 = $row['day3'];
$day4 = $row['day4'];
$day5 = $row['day5'];
$day6 = $row['day6'];
$day7 = $row['day7'];
?>
<tr bgcolor="<?php if ($status == 1) { echo '#FC9393'; } elseif ($status == 2) { echo '#66cc66'; } ?>">
<td>
<?php echo ++$counter; ?>
</td>
<td>
<span title="<?php echo $needs; ?>"><?php echo $student_name; ?></span>
</td>
<td>
<?php echo $student_Tzone; ?>
</td>
<td>
<?php echo date("h:i a", strtotime($start_time)); ?> - <?php echo date("h:i a", strtotime($end_time)); ?>
</td>
<?php if ($day1 == 1) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Monday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day2 == 2) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Tuesday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day3 == 3) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Wednesday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day4 == 4) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Thursday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day5 == 5) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Friday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day6 == 6) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Saturday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day7 == 7) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Sunday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<td>
<?php echo Teachers("$requested_id", "$student_name"); ?>
</td>
<td>
<a href="delete-requested?req=<?php echo $requested_id; ?>"><button class="mb-2 mr-2 btn btn-outline-danger"><i class="fa fa-ban"></i> Delete</button></a>
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.split').click(function(){
    var famData=$(this).attr('data');
    var famName=$(this).attr('name');

    $.ajax({url:"teacher-details.php?famData="+famData+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>