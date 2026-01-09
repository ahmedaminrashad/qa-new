<?php
require ("../includes/dbconnection.php");
$Sname= $_POST['Sname'];
$Tname= $_POST['Tname'];
$line01= $_POST['line01'];
$line02= $_POST['line02'];
$date= $_POST['date'];
$studentID= $_POST['studentID'];
			$sql = "INSERT INTO certificates (student_id, student_name, teacher_name, line01, line02, date)
					VALUES('$studentID', '" . mysqli_real_escape_string($conn, $Sname) . "', '" . mysqli_real_escape_string($conn, $Tname) . "', '" . mysqli_real_escape_string($conn, $line01) . "', '" . mysqli_real_escape_string($conn, $line02) . "', '$date')"; 
					if ($conn->query($sql) === TRUE) {
					 header('Location: ' . $_SERVER['HTTP_REFERER']);
					 }
?>