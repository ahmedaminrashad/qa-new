<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//error_reporting(E_STRICT | E_ALL);
include("../includes/dbconnection.php");
include("../includes/email_details.php");
include("../includes/01-var.php");
include("../includes/main-var.php");
$mysql = mysqli_connect($server_db, $username_db, $userpass_db);
mysqli_select_db($mysql, $name_db);
$result = mysqli_query($mysql, "SELECT * FROM profile Where (cat_id = 8 OR  teacher_rights = 1) AND active = 1 AND g_id = 1 AND inout_id = 1 AND schedule_status = 1");

foreach ($result as $row) {
    $ptec =$row['teacher_id'];
		 	
		 	 $student_ID= $_REQUEST['studentID'];
			$student_Name= $_REQUEST['studentNA'];
			$student_Tzone= $_REQUEST['studentTZ'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day1 = $_REQUEST['checkbox1'];
			$day2 = $_REQUEST['checkbox2'];
			$day3 = $_REQUEST['checkbox3'];
			$day4 = $_REQUEST['checkbox4'];
			$day5 = $_REQUEST['checkbox5'];
			$day6 = $_REQUEST['checkbox6'];
			$day7 = $_REQUEST['checkbox7'];
			$needs = $_REQUEST['needs'];
			$reid = $_REQUEST['id'];
		 	
		 	$sta1 = $row['st1'];
		 	$eta1 = $row['et1'];
		 	$sta2 = $row['st2'];
		 	$eta2 = $row['et2'];
		 	$sta3 = $row['st3'];
		 	$eta3 = $row['et3'];
		 	if ($row['g_id'] == 1) { $gender = 'Brother'; } else { $gender = 'Sister'; }
		 	 
        $local_tz = new DateTimeZone($student_Tzone);
$local = new DateTime('now', $local_tz);

$user_tz = new DateTimeZone("Africa/Cairo");
$user = new DateTime('now', $user_tz);

$local_offset = $local->getOffset() / 3600;
$user_offset = $user->getOffset() / 3600;

$Sdiff = $user_offset - $local_offset;
$tech_startTime = date('H:i:s',strtotime($start_time));
$stud_startTime = date('H:i:s',strtotime($Sdiff. 'hour',strtotime($start_time)));
$tech_startEnd = date('H:i:s',strtotime($end_time));
$stud_startEnd1 = date('H:i:s',strtotime($Sdiff. 'hour',strtotime($end_time)));
if ($stud_startEnd1 == '00:00:00') { $stud_startEnd = '23:59:59'; } else { $stud_startEnd = $stud_startEnd1; }
$time1 = date("h:i a", strtotime($stud_startTime));
$time2 = date("h:i a", strtotime($stud_startEnd));
if ($day1 == 1) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day1-1; if ($a == 0) {$studentDay1 = 7;} else {$studentDay1 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day1+1; if ($a == 8) {$studentDay1 = 1;} else {$studentDay1 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay1 = $day1;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay1 = $day1;}
if ($Sdiff == 0) {$studentDay1 = $day1;}
}
if ($day2 == 2) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day2-1; if ($a == 0) {$studentDay2 = 7;} else {$studentDay2 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day2+1; if ($a == 8) {$studentDay2 = 1;} else {$studentDay2 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay2 = $day2;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay2 = $day2;}
if ($Sdiff == 0) {$studentDay2 = $day2;}
}
if ($day3 == 3) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day3-1; if ($a == 0) {$studentDay3 = 7;} else {$studentDay3 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day3+1; if ($a == 8) {$studentDay3 = 1;} else {$studentDay3 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay3 = $day3;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay3 = $day3;}
if ($Sdiff == 0) {$studentDay3 = $day3;}
}
if ($day4 == 4) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day4-1; if ($a == 0) {$studentDay4 = 7;} else {$studentDay4 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day4+1; if ($a == 8) {$studentDay4 = 1;} else {$studentDay4 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay4 = $day4;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay4 = $day4;}
if ($Sdiff == 0) {$studentDay4 = $day4;}
}
if ($day5 == 5) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day5-1; if ($a == 0) {$studentDay5 = 7;} else {$studentDay5 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day5+1; if ($a == 8) {$studentDay5 = 1;} else {$studentDay5 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay5 = $day5;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay5 = $day5;}
if ($Sdiff == 0) {$studentDay5 = $day5;}
}
if ($day6 == 6) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day6-1; if ($a == 0) {$studentDay6 = 7;} else {$studentDay6 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day6+1; if ($a == 8) {$studentDay6 = 1;} else {$studentDay6 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay6 = $day6;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay6 = $day6;}
if ($Sdiff == 0) {$studentDay6 = $day6;}
}
if ($day7 == 7) {
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day7-1; if ($a == 0) {$studentDay7 = 7;} else {$studentDay7 = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day7+1; if ($a == 8) {$studentDay7 = 1;} else {$studentDay7 = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay7 = $day7;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay7 = $day7;}
if ($Sdiff == 0) {$studentDay7 = $day7;}
}
//echo "Student TZone: ".$student_Tzone."<br>";
//echo "Student Deff: ".$Sdiff."<br>";
//echo "Student Time: ".$tech_startTime."<br>";
//echo "Teacher Time: ".$stud_startTime."<br>";
//echo "Student Day1: ".$day1."<br>";
//echo "Student Day2: ".$day2."<br>";
//echo "Student Day3: ".$day3."<br>";
//echo "Student Day4: ".$day4."<br>";
//echo "Student Day5: ".$day5."<br>";
//echo "Student Day6: ".$day6."<br>";
//echo "Student Day7: ".$day7."<br>";
//echo "Teacher Day1: ".$studentDay1."<br>";
//echo "Teacher Day2: ".$studentDay2."<br>";
//echo "Teacher Day3: ".$studentDay3."<br>";
//echo "Teacher Day4: ".$studentDay4."<br>";
//echo "Teacher Day5: ".$studentDay5."<br>";
//echo "Teacher Day6: ".$studentDay6."<br>";
//echo "Teacher Day7: ".$studentDay7."<br>";
if ($studentDay1 == 1) {$SD1 = 'Monday'; }
elseif ($studentDay1 == 2) {$SD1 = 'Tuesday'; }
elseif ($studentDay1 == 3) {$SD1 = 'Wednesday'; }
elseif ($studentDay1 == 4) {$SD1 = 'Thursday'; }
elseif ($studentDay1 == 5) {$SD1 = 'Friday'; }
elseif ($studentDay1 == 6) {$SD1 = 'Saturday'; }
elseif ($studentDay1 == 7) {$SD1 = 'Sunday'; }
if ($studentDay2 == 1) {$SD2 = 'Monday'; }
elseif ($studentDay2 == 2) {$SD2 = 'Tuesday'; }
elseif ($studentDay2 == 3) {$SD2 = 'Wednesday'; }
elseif ($studentDay2 == 4) {$SD2 = 'Thursday'; }
elseif ($studentDay2 == 5) {$SD2 = 'Friday'; }
elseif ($studentDay2 == 6) {$SD2 = 'Saturday'; }
elseif ($studentDay2 == 7) {$SD2 = 'Sunday'; }
if ($studentDay3 == 1) {$SD3 = 'Monday'; }
elseif ($studentDay3 == 2) {$SD3 = 'Tuesday'; }
elseif ($studentDay3 == 3) {$SD3 = 'Wednesday'; }
elseif ($studentDay3 == 4) {$SD3 = 'Thursday'; }
elseif ($studentDay3 == 5) {$SD3 = 'Friday'; }
elseif ($studentDay3 == 6) {$SD3 = 'Saturday'; }
elseif ($studentDay3 == 7) {$SD3 = 'Sunday'; }
if ($studentDay4 == 1) {$SD4 = 'Monday'; }
elseif ($studentDay4 == 2) {$SD4 = 'Tuesday'; }
elseif ($studentDay4 == 3) {$SD4 = 'Wednesday'; }
elseif ($studentDay4 == 4) {$SD4 = 'Thursday'; }
elseif ($studentDay4 == 5) {$SD4 = 'Friday'; }
elseif ($studentDay4 == 6) {$SD4 = 'Saturday'; }
elseif ($studentDay4 == 7) {$SD4 = 'Sunday'; }
if ($studentDay5 == 1) {$SD5 = 'Monday'; }
elseif ($studentDay5 == 2) {$SD5 = 'Tuesday'; }
elseif ($studentDay5 == 3) {$SD5 = 'Wednesday'; }
elseif ($studentDay5 == 4) {$SD5 = 'Thursday'; }
elseif ($studentDay5 == 5) {$SD5 = 'Friday'; }
elseif ($studentDay5 == 6) {$SD5 = 'Saturday'; }
elseif ($studentDay5 == 7) {$SD5 = 'Sunday'; }
if ($studentDay6 == 1) {$SD6 = 'Monday'; }
elseif ($studentDay6 == 2) {$SD6 = 'Tuesday'; }
elseif ($studentDay6 == 3) {$SD6 = 'Wednesday'; }
elseif ($studentDay6 == 4) {$SD6 = 'Thursday'; }
elseif ($studentDay6 == 5) {$SD6 = 'Friday'; }
elseif ($studentDay6 == 6) {$SD6 = 'Saturday'; }
elseif ($studentDay6 == 7) {$SD6 = 'Sunday'; }
if ($studentDay7 == 1) {$SD7 = 'Monday'; }
elseif ($studentDay7 == 2) {$SD7 = 'Tuesday'; }
elseif ($studentDay7 == 3) {$SD7 = 'Wednesday'; }
elseif ($studentDay7 == 4) {$SD7 = 'Thursday'; }
elseif ($studentDay7 == 5) {$SD7 = 'Friday'; }
elseif ($studentDay7 == 6) {$SD7 = 'Saturday'; }
elseif ($studentDay7 == 7) {$SD7 = 'Sunday'; }
if ($SD1 == 'Monday') {$SDN1 = 1;}
elseif ($SD1 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD1 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD1 == 'Thursday') {$SDN4 = 4;}
elseif ($SD1 == 'Friday') {$SDN5 = 5;}
elseif ($SD1 == 'Saturday') {$SDN6 = 6;}
elseif ($SD1 == 'Sunday') {$SDN7 = 7;}
if ($SD2 == 'Monday') {$SDN1 = 1;}
elseif ($SD2 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD2 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD2 == 'Thursday') {$SDN4 = 4;}
elseif ($SD2 == 'Friday') {$SDN5 = 5;}
elseif ($SD2 == 'Saturday') {$SDN6 = 6;}
elseif ($SD2 == 'Sunday') {$SDN7 = 7;}
if ($SD3 == 'Monday') {$SDN1 = 1;}
elseif ($SD3 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD3 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD3 == 'Thursday') {$SDN4 = 4;}
elseif ($SD3 == 'Friday') {$SDN5 = 5;}
elseif ($SD3 == 'Saturday') {$SDN6 = 6;}
elseif ($SD3 == 'Sunday') {$SDN7 = 7;}
if ($SD4 == 'Monday') {$SDN1 = 1;}
elseif ($SD4 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD4 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD4 == 'Thursday') {$SDN4 = 4;}
elseif ($SD4 == 'Friday') {$SDN5 = 5;}
elseif ($SD4 == 'Saturday') {$SDN6 = 6;}
elseif ($SD4 == 'Sunday') {$SDN7 = 7;}
if ($SD5 == 'Monday') {$SDN1 = 1;}
elseif ($SD5 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD5 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD5 == 'Thursday') {$SDN4 = 4;}
elseif ($SD5 == 'Friday') {$SDN5 = 5;}
elseif ($SD5 == 'Saturday') {$SDN6 = 6;}
elseif ($SD5 == 'Sunday') {$SDN7 = 7;}
if ($SD6 == 'Monday') {$SDN1 = 1;}
elseif ($SD6 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD6 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD6 == 'Thursday') {$SDN4 = 4;}
elseif ($SD6 == 'Friday') {$SDN5 = 5;}
elseif ($SD6 == 'Saturday') {$SDN6 = 6;}
elseif ($SD6 == 'Sunday') {$SDN7 = 7;}
if ($SD7 == 'Monday') {$SDN1 = 1;}
elseif ($SD7 == 'Tuesday') {$SDN2 = 2;}
elseif ($SD7 == 'Wednesday') {$SDN3 = 3;}
elseif ($SD7 == 'Thursday') {$SDN4 = 4;}
elseif ($SD7 == 'Friday') {$SDN5 = 5;}
elseif ($SD7 == 'Saturday') {$SDN6 = 6;}
elseif ($SD7 == 'Sunday') {$SDN7 = 7;}

$result1 = mysql_query("SELECT * FROM TimeTable Where TimeID = $sta1");
					$STC1 = MYSQL_RESULT($result1,$i,"TimeName");

			if ($eta1 == 97) { $ETC1 = '00:00:00'; }
			else { $result2 = mysql_query("SELECT * FROM TimeTable Where TimeID = $eta1");

					$ETCO1 = MYSQL_RESULT($result2,$i,"TimeName");
					$secs = strtotime("00:15:00")-strtotime("00:00:00");
                    $ETCF1 = date("H:i:s",strtotime($ETCO1)+$secs);
					if ($ETCF1 == '00:00:00') { $ETC1 = '23:59:59';} else { $ETC1 = $ETCF1; }
			}
			
			$result3 = mysql_query("SELECT * FROM TimeTable Where TimeID = $sta2");

					$STC2 = MYSQL_RESULT($result3,$i,"TimeName");
			
			if ($eta2 == 97) { $ETC2 = '00:00:00'; }
			else { $result4 = mysql_query("SELECT * FROM TimeTable Where TimeID = $eta2");

					$ETCO2 = MYSQL_RESULT($result4,$i,"TimeName");
					$secs = strtotime("00:15:00")-strtotime("00:00:00");
                    $ETCF2 = date("H:i:s",strtotime($ETCO2)+$secs);
					if ($ETCF2 == '00:00:00') { $ETC2 = '23:59:59';} else { $ETC2 = $ETCF2; }
			}
			
			$result5 = mysql_query("SELECT * FROM TimeTable Where TimeID = $sta3");

					$STC3 = MYSQL_RESULT($result5,$i,"TimeName");
			
			if ($eta3 == 97) { $ETC3 = '00:00:00'; }
			else { $result6 = mysql_query("SELECT * FROM TimeTable Where TimeID = $eta3");

					$ETCO3 = MYSQL_RESULT($result6,$i,"TimeName");
					$secs = strtotime("00:15:00")-strtotime("00:00:00");
                    $ETCF3 = date("H:i:s",strtotime($ETCO3)+$secs);
					if ($ETCF3 == '00:00:00') { $ETC3 = '23:59:59';} else { $ETC3 = $ETCF3; }
			}

    
    
    if((($STC1 <= $stud_startTime && $ETC1 > $stud_startTime) && ($STC1 < $stud_startEnd && $ETC1 >= $stud_startEnd)) OR (($STC2 <= $stud_startTime && $ETC2 > $stud_startTime) && ($STC2 < $stud_startEnd && $ETC2 >= $stud_startEnd)) OR (($STC3 <= $stud_startTime && $ETC3 > $stud_startTime) && ($STC3 < $stud_startEnd && $ETC3 >= $stud_startEnd))) 
    {
   
   $time_start = date("Y-m-d H:i:s", time(true));
$sql = "SELECT * FROM sched WHERE teacher_id='$ptec' AND (day_id = '$SDN1' OR day_id = '$SDN2' OR day_id = '$SDN3' OR day_id = '$SDN4' OR day_id = '$SDN5' OR day_id = '$SDN6' OR day_id = '$SDN7') AND ((time_start <= '$stud_startTime' && time_end > '$stud_startTime') OR (time_start < '$stud_startEnd' && time_end >= '$stud_startEnd'))";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
		//echo ''.$row['teacher_name'].'<br>Start Time 1: '.$STC1.'<br>';
    //echo 'End Time 1: '.$ETC1.'<br>';
    //echo 'Start Time 2: '.$STC2.'<br>';
    //echo 'End Time 2: '.$ETC2.'<br>';
   //echo 'Start Time 3: '.$STC3.'<br>';
   // echo 'End Time 3: '.$ETC3.'<br>';
    //echo 'Give Time Start: '.$stud_startEnd.'<br>';
    //echo 'Give TimeEnd: '.$stud_startEnd.'<br><br>';
	$sql = "INSERT INTO schedule_approval (requested_id, teacher_id, time, student_id, time_start, time_end, day1, day2, day3, day4, day5, day6, day7)
					VALUES('$reid','$ptec','$time_start','$student_ID','$stud_startTime','$stud_startEnd','$SDN1','$SDN2','$SDN3','$SDN4','$SDN5','$SDN6','$SDN')";
					if ($conn->query($sql) === TRUE) {
					echo ''; }
			$sql = "UPDATE requested_schedule SET status = 2 WHERE requested_id = '$reid'";
if ($conn->query($sql) === TRUE) {
					echo ''; }
		}
   
            
    }

			


}
header('Location: list-of-requested-schedule');
?>