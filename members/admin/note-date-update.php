<?php

require ("../includes/dbconnection.php");
date_default_timezone_set($TimeZoneCustome);
$time_start = date("h:i:s A", time(true));
?>
<?php
$note_id =$_REQUEST['note_id'];
$date =$_REQUEST['date'];
$note =$_REQUEST['note'];

$sql = "UPDATE diary_notes SET reminder = '$date', note_text = '" . mysql_real_escape_string($note) . "' WHERE note_id = '$note_id'";
if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
