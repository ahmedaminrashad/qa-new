<?php
require ("../includes/dbconnection.php");
if ($_POST['checkbox1'] == 1){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '1', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
if ($_POST['checkbox2'] == 2){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '2', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
if ($_POST['checkbox3'] == 3){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '3', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
if ($_POST['checkbox4'] == 4){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '4', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
if ($_POST['checkbox5'] == 5){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '5', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
if ($_POST['checkbox6'] == 6){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '6', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
if ($_POST['checkbox7'] == 7){
$t_id =$_REQUEST['t_id'];
$STime =$_REQUEST['STime'];
$ETime =$_REQUEST['ETime'];
$des =$_REQUEST['des'];
			$sql = "INSERT INTO book_time (teacher_id, day_id, start_time, end_time, des)
					VALUES('$t_id', '7', '$STime', '$ETime', '$des')";
					if ($conn->query($sql) === TRUE) {
					echo '';
					}
}
					header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
