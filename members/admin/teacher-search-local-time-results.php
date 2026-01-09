<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $time1 =$_REQUEST['time1'];
  $time2 =$_REQUEST['time2'];
  function table($tech){
  require ("../includes/dbconnection.php");
      $time1 =$_REQUEST['time1'];
  $time2 =$_REQUEST['time2'];
      $sql = "SELECT * FROM TimeTable WHERE (TimeID >= '$time1' AND TimeID <= '$time2') OR (TimeID >= '$time1' AND TimeID <= '$time2') OR (TimeID >= '$time1' AND TimeID <= '$time2')";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
				$ID = $row['TimeID'];
			$name = $row['TimeName'];
			$list = $row['TimeList'];
			echo '<tr><td>'.$list.'</td>';
				$sql1 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '1' and time_start <= '$name' and time_end > '$name'";
			//HAVING course_id='$pCourse'
		$result1 = mysqli_query($conn, $sql1);
$numberOfRows1 = mysqli_num_rows($result1);
		if ($numberOfRows1 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="1"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows1 > 0) 
			{
			while ($row1 = mysqli_fetch_assoc($result1)){
					$sched = $row1['sched_id'];
					$TID = $row1['teacher_id'];
					$SID = $row1['course_id'];
					$hidden_pcourse = $row1['course_yrSec'];
					$hidden_pt = $row1['teacher_name'];
					$hidden_pday = $row1['day_id'];
					$tt1 = $row1['time_start'];
					$tt2 = $row1['time_end'];
					$trial = $row1['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td>';

			}
			}
			$sql2 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '2' and time_start <= '$name' and time_end > '$name'";
			$result2 = mysqli_query($conn, $sql2);
$numberOfRows2 = mysqli_num_rows($result2);
		if ($numberOfRows2 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="2"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows2 > 0) 
			{
			while ($row2 = mysqli_fetch_assoc($result2)){
					$sched = $row2['sched_id'];
					$TID = $row2['teacher_id'];
					$SID = $row2['course_id'];
					$hidden_pcourse = $row2['course_yrSec'];
					$hidden_pt = $row2['teacher_name'];
					$hidden_pday = $row2['day_id'];
					$tt1 = $row2['time_start'];
					$tt2 = $row2['time_end'];
					$trial = $row2['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td>';

			}
			}
				$sql3 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '3' and time_start <= '$name' and time_end > '$name'";
			$result3 = mysqli_query($conn, $sql3);
$numberOfRows3 = mysqli_num_rows($result3);
		if ($numberOfRows3 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="3"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows3 > 0) 
			{
			while ($row3 = mysqli_fetch_assoc($result3)){
					$sched = $row3['sched_id'];
					$TID = $row3['teacher_id'];
					$SID = $row3['course_id'];
					$hidden_pcourse = $row3['course_yrSec'];
					$hidden_pt = $row3['teacher_name'];
					$hidden_pday = $row3['day_id'];
					$tt1 = $row3['time_start'];
					$tt2 = $row3['time_end'];
					$trial = $row3['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td>';

			}
			}
				$sql4 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '4' and time_start <= '$name' and time_end > '$name'";
			$result4 = mysqli_query($conn, $sql4);
$numberOfRows4 = mysqli_num_rows($result4);
		if ($numberOfRows4 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="4"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows4 > 0) 
			{
			while ($row4 = mysqli_fetch_assoc($result4)){
					$sched = $row4['sched_id'];
					$TID = $row4['teacher_id'];
					$SID = $row4['course_id'];
					$hidden_pcourse = $row4['course_yrSec'];
					$hidden_pt = $row4['teacher_name'];
					$hidden_pday = $row4['day_id'];
					$tt1 = $row4['time_start'];
					$tt2 = $row4['time_end'];
					$trial = $row4['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td>';

			}
			}
				$sql5 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '5' and time_start <= '$name' and time_end > '$name'";
			$result5 = mysqli_query($conn, $sql5);
$numberOfRows5 = mysqli_num_rows($result5);
		if ($numberOfRows5 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="5"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows5 > 0) 
			{
			while ($row5 = mysqli_fetch_assoc($result5)){
					$sched = $row5['sched_id'];
					$TID = $row5['teacher_id'];
					$SID = $row5['course_id'];
					$hidden_pcourse = $row5['course_yrSec'];
					$hidden_pt = $row5['teacher_name'];
					$hidden_pday = $row5['day_id'];
					$tt1 = $row5['time_start'];
					$tt2 = $row5['time_end'];
					$trial = $row5['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td>';

			}
			}
				$sql6 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '6' and time_start <= '$name' and time_end > '$name'";
			$result6 = mysqli_query($conn, $sql6);
$numberOfRows6 = mysqli_num_rows($result6);
		if ($numberOfRows6 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="6"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows6 > 0) 
			{
			while ($row6 = mysqli_fetch_assoc($result6)){
					$sched = $row6['sched_id'];
					$TID = $row6['teacher_id'];
					$SID = $row6['course_id'];
					$hidden_pcourse = $row6['course_yrSec'];
					$hidden_pt = $row6['teacher_name'];
					$hidden_pday = $row6['day_id'];
					$tt1 = $row6['time_start'];
					$tt2 = $row6['time_end'];
					$trial = $row6['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td>';

			}
			}
				$sql7 = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING teacher_id='$tech' and day_id = '7' and time_start <= '$name' and time_end > '$name'";
			$result7 = mysqli_query($conn, $sql7);
$numberOfRows7 = mysqli_num_rows($result7);
		if ($numberOfRows7 == 0){
			echo '<td bgcolor="#CECE0F"><a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$tech.'" time-id="'.$name.'" day-id="7"><font color="#FFFFFF">--</font></a></td>';
			}
		elseif ($numberOfRows7 > 0) 
			{
			while ($row7 = mysqli_fetch_assoc($result7)){
					$sched = $row7['sched_id'];
					$TID = $row7['teacher_id'];
					$SID = $row7['course_id'];
					$hidden_pcourse = $row7['course_yrSec'];
					$hidden_pt = $row7['teacher_name'];
					$hidden_pday = $row7['day_id'];
					$tt1 = $row7['time_start'];
					$tt2 = $row7['time_end'];
					$trial = $row7['status'];
			  		echo '<td bgcolor="#989800"><a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a></td></tr>';

			}
			}
		}
	}
  }
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Teacher Schedule Results';
$page_subtitle = 'Teacher Schedule Results';
$table_name = 'Teacher Schedule Results';
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
$time1 =$_REQUEST['time1'];
  $time2 =$_REQUEST['time2'];
$gd = $_POST["pgender"];
$ld = $_POST["plocal"];
$sql = "SELECT * FROM profile WHERE (st1 <= '$time1' AND et1 >= '$time2') OR (st2 <= '$time1' AND et2 >= '$time2') OR (st3 <= '$time1' AND et3 >= '$time2') HAVING (cat_id = 8 or teacher_rights = 1) and inout_id = '$ld' AND active =1 AND schedule_status = 1 AND training = 1 AND g_id = '$gd'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
		
				$profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];		
			$pT = $row['teacher_id'];
			$rg_level = $row['level'];
?>
							<div class="table-responsive">
							<table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
									<th col width="150"><?php echo $tname; ?></th>
									<th>MONDAY</th>
									<th>TUESDAY</th>
									<th>WEDNESDAY</th>
									<th>THURSDAY</th>
									<th>FRIDAY</th>
									<th>SATURDAY</th>
									<th>SUNDAY</th>
								</tr>
								</thead>
<tbody>
<?php 
echo table("$profile_no");
	
?>
</tbody>

							</table>
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
$('.add').click(function(){
    var TeacherID=$(this).attr('teacher-id');
     var TimeID=$(this).attr('time-id');
     var DayID=$(this).attr('day-id');

    $.ajax({url:"01-add-schedule.php?TeacherID="+TeacherID+"&TimeID="+TimeID+"&DayID="+DayID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.edit').click(function(){
    var famID=$(this).attr('data-id');
     var TechID=$(this).attr('tech-id');
     var SutID=$(this).attr('sut-id');

    $.ajax({url:"01-edit-schedule.php?famID="+famID+"&TechID="+TechID+"&SutID="+SutID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>