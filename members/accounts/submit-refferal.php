<?php
  require ("../includes/dbconnection.php");
date_default_timezone_set($TimeZoneCustome);
$sy11 = date('Y-m-d');
$date11 = date('h:i A', time());
$new_name =$_REQUEST['name'];
$new_email =$_REQUEST['email'];
$new_phone =$_REQUEST['phone'];
$new_skype =$_REQUEST['skype'];
$new_relation =$_REQUEST['relation'];
$new_comments =$_REQUEST['comments'];
$new_pid =$_REQUEST['p_id'];
$new_pname =$_REQUEST['p_name'];
$sql = "INSERT INTO new_request (name, email, phone, skype, message, date, time, site_id, parent_id, parent_name)
					VALUES('" . mysqli_real_escape_string($conn, $new_name) . "','$new_email','" . mysqli_real_escape_string($conn, $new_phone) . "','" . mysqli_real_escape_string($conn, $new_skype) . "','" . mysqli_real_escape_string($conn, $new_comments) . "','$sy11','$date11','0','$new_pid','$new_pname')";
if ($conn->query($sql) === TRUE) {
header("Location: refer-a-friend?msg=1");
}
?>