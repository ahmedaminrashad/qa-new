<?
require ("../includes/dbconnection.php");
$famID=$_GET['famData'];
$famName=$_GET['famName'];
function TeacherName($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$hidden_tt = $row['teacher_name'];
	
			  		echo $hidden_tt;
			}
			}
}
function TeacherGroup($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$hidden_tt = $row['group_id'];
	
			  		echo $hidden_tt;
			}
			}
}
function StudentName($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM course Where course_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$hidden_tt = $row['course_yrSec'];
					$pt_tt = $row['parent_id'];
	
			  		echo $hidden_tt;
			}
			}
}
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CLass</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
									<div class="table-responsive">
                                        <table class="mb-0 table">
								<thead>
								<tr>
<th>
#
</th>
<th>
Teacher Name
</th>
<th>
Teacher Time
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
Action
</th>
</tr>
								</thead>
								<tbody>
								<?php
// sending query
$sql = "SELECT * FROM schedule_approval WHERE requested_id = $famID ORDER BY time ASC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$approval_id = $row['approval_id'];
$requested_id = $row['requested_id'];
$teacher_id = $row['teacher_id'];
$time = $row['time'];
$student_id = $row['student_id'];
$time_start = $row['time_start'];
$time_end = $row['time_end'];
$day1= $row['day1'];
$day2= $row['day2'];
$day3= $row['day3'];
$day4= $row['day4'];
$day5= $row['day5'];
$day6= $row['day6'];
$day7= $row['day7'];
?>
								<tr>
<td>
<?php echo ++$counter; ?>
</td>
<td>
<span><a href="teacher-schedule?pT=<?php echo $teacher_id; ?>"><?php echo TeacherName("$teacher_id"); ?></a></span>
</td>
<td>
<?php echo date("h:i a", strtotime($time_start)); ?> to <?php echo date("h:i a", strtotime($time_end)); ?>
</td>
<?php if ($day1 == 1) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Monday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day2 == 2) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Tuesday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day3 == 3) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Wednesday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day4 == 4) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Thursday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day5 == 5) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Friday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day6 == 6) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Saturday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<?php if ($day7 == 7) { echo '<td bgcolor="#575D06"><font style="color:#ffffff">Sunday</font></td>'; } else { echo '<td bgcolor="#D5D907"><font style="color:#ffffff">--</font></td>'; } ?>
<td>
<a href="schedule-action-file?teacherID=<?php echo $teacher_id; ?>&studentID=<?php echo $student_id; ?>&STime=<?php echo $time_start; ?>&ETime=<?php echo $time_end; ?>&checkbox1=<?php echo $day1; ?>&checkbox2=<?php echo $day2; ?>&checkbox3=<?php echo $day3; ?>&checkbox4=<?php echo $day4; ?>&checkbox5=<?php echo $day5; ?>&checkbox6=<?php echo $day6; ?>&checkbox7=<?php echo $day7; ?>&reqid=<?php echo $requested_id; ?>&group=<?php echo TeacherGroup("$teacher_id"); ?>&StudentName=<?php echo StudentName("$student_id"); ?>"><button type="button" class="btn red btn-xs" title="Schedule Now"><i class="fa fa-user"></i> Schedule</button></a>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>