<?php

  require ("../includes/dbconnection.php"); 
  
$Sname= $_POST['Sname'];
$Tname= $_POST['Tname'];
$line01= $_POST['line01'];
$line02= $_POST['line02'];
$date= $_POST['date'];
$cerID= $_POST['cerID'];
$sql = "UPDATE certificates SET student_name = '" . mysqli_real_escape_string($conn, $Sname) . "', teacher_name = '" . mysqli_real_escape_string($conn, $Tname) . "', line01 = '" . mysqli_real_escape_string($conn, $line01) . "', line02 = '" . mysqli_real_escape_string($conn, $line02) . "', date = '$date' WHERE cer_id = '$cerID'";  	

if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>
