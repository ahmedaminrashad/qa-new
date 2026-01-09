<?php
  require ("../includes/dbconnection.php");
//$date = date('Y-m-d', time());
//$day = date('N', time());
$teacher =$_REQUEST['teacher'];
  $date =$_REQUEST['date'];
  $day =$_REQUEST['day'];
  $time =$_REQUEST['time'];
$sql = "DELETE FROM class_history WHERE status < 18 AND monitor_id = 1 AND date_admin = '$date'";
if ($conn->query($sql) === TRUE) {
    $sql = "SELECT * FROM sched WHERE aday_id = '$day'";
    $result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		$id = $row['sched_id'];
		$dif=$row['day_id']-$row['aday_id'];
		if($dif == 6){$a1 = -1;}
		elseif($dif == -6){$a1 = 1;}
		else {$a1 = $dif;}
		$difs=$row['sday_id']-$row['aday_id'];
		if($difs == 6){$a2 = -1;}
		elseif($difs == -6){$a2 = 1;}
		else {$a2 = $difs;}
		$teacher_day = date('Y-m-d',strtotime("".$date." ".$a1." days"));
		$student_day = date('Y-m-d',strtotime("".$date." ".$a2." days"));
		$sql = "UPDATE sched SET create_date_admin = '$date', create_date_teacher = '$teacher_day', create_date_student = '$student_day' WHERE sched_id = '$id'";
		if ($conn->query($sql) === TRUE) {
		echo '';
		}
		}
	}
	}
	if ($conn->query($sql) === TRUE) {
	$sql = "INSERT INTO class_history(uni, parent_id, course_id, teacher_id, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration, dept_id, adept_id, status, date_admin, date_student, date_teacher)
	SELECT sched_id, parent_id, course_id, teacher_id, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration, dept_id, adept_id, status, create_date_admin, create_date_student, create_date_teacher
	FROM sched WHERE aday_id = $day AND NOT EXISTS  (SELECT * FROM class_history WHERE class_history.date_admin = sched.create_date_admin AND class_history.uni = sched.sched_id);";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}
	if (!empty($teacher) && !empty($date) && !empty($time)) 
  		{
  		header('Location: teacher_date_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && !empty($date) && !empty($time)) 
  		{
  		header('Location: date_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && !empty($date) && empty($time)) 
  		{
  		header('Location: teacher_date?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && !empty($date) && empty($time)) 
  		{
  		header('Location: date?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  else { header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=1');
  	}
?>