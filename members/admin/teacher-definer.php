<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include("../includes/dbconnection.php");
	$student_ID= $_POST['studentID'];
			$student_Name= $_POST['studentNA'];
			$student_Tzone= $_POST['studentTZ'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			if ($_POST['checkbox1'] == 1) { $day1 = $_POST['checkbox1']; } else { $day1 = 0; }
			if ($_POST['checkbox2'] == 2) { $day2 = $_POST['checkbox2']; } else { $day2 = 0; }
			if ($_POST['checkbox3'] == 3) { $day3 = $_POST['checkbox3']; } else { $day3 = 0; }
			if ($_POST['checkbox4'] == 4) { $day4 = $_POST['checkbox4']; } else { $day4 = 0; }
			if ($_POST['checkbox5'] == 5) { $day5 = $_POST['checkbox5']; } else { $day5 = 0; }
			if ($_POST['checkbox6'] == 6) { $day6 = $_POST['checkbox6']; } else { $day6 = 0; }
			if ($_POST['checkbox7'] == 7) { $day7 = $_POST['checkbox7']; } else { $day7 = 0; }
			$needs = $_POST['needs'];
			$TeacherID = $_POST['TeacherID'];
			$sql = "INSERT INTO requested_schedule (student_id, student_name, student_Tzone, start_time, end_time, needs, day1, day2, day3, day4, day5, day6, day7)
					VALUES('$student_ID','$student_Name','$student_Tzone','$start_time','$end_time','$needs','$day1','$day2','$day3','$day4','$day5','$day6','$day7')";
					if ($conn->query($sql) === TRUE) {
					$id = mysqli_insert_id($conn);
					}
			if ($TeacherID == 1)
{
    header("Location: msg-file01?studentID=".$student_ID."&studentNA=".$student_Name."&studentTZ=".$student_Tzone."&STime=".$start_time."&ETime=".$end_time."&needs=".$needs."&checkbox1=".$day1."&checkbox2=".$day2."&checkbox3=".$day3."&checkbox4=".$day4."&checkbox5=".$day5."&checkbox6=".$day6."&checkbox7=".$day7."&id=".$id."");
}
elseif ($TeacherID == 2)
{
    header("Location: msg-file02?studentID=".$student_ID."&studentNA=".$student_Name."&studentTZ=".$student_Tzone."&STime=".$start_time."&ETime=".$end_time."&needs=".$needs."&checkbox1=".$day1."&checkbox2=".$day2."&checkbox3=".$day3."&checkbox4=".$day4."&checkbox5=".$day5."&checkbox6=".$day6."&checkbox7=".$day7."&id=".$id."");
}
elseif ($TeacherID == 3)
{
    header("Location: msg-file03?studentID=".$student_ID."&studentNA=".$student_Name."&studentTZ=".$student_Tzone."&STime=".$start_time."&ETime=".$end_time."&needs=".$needs."&checkbox1=".$day1."&checkbox2=".$day2."&checkbox3=".$day3."&checkbox4=".$day4."&checkbox5=".$day5."&checkbox6=".$day6."&checkbox7=".$day7."&id=".$id."");
}
elseif ($TeacherID == 4)
{
    header("Location: msg-file04?studentID=".$student_ID."&studentNA=".$student_Name."&studentTZ=".$student_Tzone."&STime=".$start_time."&ETime=".$end_time."&needs=".$needs."&checkbox1=".$day1."&checkbox2=".$day2."&checkbox3=".$day3."&checkbox4=".$day4."&checkbox5=".$day5."&checkbox6=".$day6."&checkbox7=".$day7."&id=".$id."");
}
else
{
    header("Location: msg-file05?tech=".$rd."&studentID=".$student_ID."&studentNA=".$student_Name."&studentTZ=".$student_Tzone."&STime=".$start_time."&ETime=".$end_time."&needs=".$needs."&checkbox1=".$day1."&checkbox2=".$day2."&checkbox3=".$day3."&checkbox4=".$day4."&checkbox5=".$day5."&checkbox6=".$day6."&checkbox7=".$day7."&id=".$id."");
}
?>
