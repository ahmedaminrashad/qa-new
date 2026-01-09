<?php

require ("../includes/dbconnection.php");
date_default_timezone_set($TimeZoneCustome);
$time_start = date("h:i:s A", time(true));
?>
<?php
$note_id =$_REQUEST['note_id'];

$sql = "UPDATE diary_notes SET status = '2' WHERE note_id = '$note_id'";
if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
