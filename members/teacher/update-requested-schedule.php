<?php
require ("../includes/dbconnection.php");
			$ptec =base64_decode($_GET["qwert"]);
		 	$preq =base64_decode($_GET["asdfg"]);
		 	$stud =base64_decode($_GET["stud"]);
		 	$TS=base64_decode($_GET["TS"]);
		 	$TE =base64_decode($_GET["TE"]);
		 	$TD1 =base64_decode($_GET["TD1"]);
		 	$TD2 =base64_decode($_GET["TD2"]);
		 	$TD3=base64_decode($_GET["TD3"]);
		 	$TD4 =base64_decode($_GET["TD4"]);
		 	$TD5 =base64_decode($_GET["TD5"]);
		 	$TD6 =base64_decode($_GET["TD6"]);
		 	$TD7 =base64_decode($_GET["TD7"]);
		 	date_default_timezone_set("Asia/Kuwait");
$time_start = date("Y-m-d H:i:s", time());
$sql = "SELECT * FROM sched WHERE teacher_id='$ptec' AND (day_id = '$TD1' OR day_id = '$TD2' OR day_id = '$TD3' OR day_id = '$TD4' OR day_id = '$TD5' OR day_id = '$TD6' OR day_id = '$TD7') AND ((time_start <= '$TS' && time_end > '$TS') OR (time_start < '$TE' && time_end >= '$TE'))";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			
			
$sql1 = "SELECT * FROM requested_schedule WHERE requested_id = $preq";
$counter = 0;
$result1 = mysqli_query($conn, $sql1);
$numberOfRows1 = mysqli_num_rows($result1);
		if ($numberOfRows1 == 0){
echo '<script type="text/javascript"> alert("Sorry this schedule request has been deleted or already scheduled. JazakAllah");close_window();</script>';
}
else if ($numberOfRows1 > 0)
{
$sql3 = "SELECT * FROM schedule_approval WHERE requested_id = $preq AND teacher_id = $ptec";
$result3 = mysqli_query($conn, $sql3);
$numberOfRows3 = mysqli_num_rows($result3);
		if ($numberOfRows3 == 0){
	$sql3 = "INSERT INTO schedule_approval (requested_id, teacher_id, time, student_id, time_start, time_end, day1, day2, day3, day4, day5, day6, day7)
					VALUES('$preq','$ptec','$time_start','$stud','$TS','$TE','$TD1','$TD2','$TD3','$TD4','$TD5','$TD6','$TD7')";
					if ($conn->query($sql3) === TRUE) {
					echo '';
					}
					else {echo 'error'; }
			$sql = "UPDATE requested_schedule SET status = 2 WHERE requested_id = '$preq'";
					if ($conn->query($sql) === TRUE) { echo '<script type="text/javascript"> alert("We have received your request to schedule this student with you. Please wait for the approval. If Admin approves this schedule with you, you will get a confirmation message. JazakAllah");close_window();</script>'; }
}
elseif ($numberOfRows3 > 0)
{
    echo '<script type="text/javascript"> alert("You have already applied for this schedule. Please wait for admin to approve. JazakAllah");close_window();</script>';
}
}
		}
		elseif ($numberOfRows > 0) 
			{
			    echo '<script type="text/javascript"> alert("Sorry, you have a class scheduled already at the give time in one or more given days. If that classes time or days are schedled wrong then please correct your schedule so before accepting this request. Make sure every class is scheduled at correct time and days so that you will not get this issue in future. JazakAllah");close_window();</script>';

			}		 
?>
