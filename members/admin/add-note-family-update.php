<?php
require ("../includes/dbconnection.php");
$date = date('Y-m-d');
$reminder= $_POST['date'];
$pid= $_POST['pid'];
$note= $_POST['note'];
$user_id= $_POST['user'];
$teacher_id= $_POST['pteacher'];
$sql = "INSERT INTO diary_notes (parent_id, teacher_id, user_id, date, reminder, note_text) VALUES('$pid', '$teacher_id', '$user_id', '$date', '$reminder', '" . mysqli_real_escape_string($conn, $note) . "')" or die(mysqli_error());
if ($conn->query($sql) === TRUE) {
        echo "<script>window.open('parent-accounts-profile?parent_id=".base64_encode($pid)."','_self')</script>";
    }
?>