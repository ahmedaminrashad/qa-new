<?php 
error_reporting(0);
date_default_timezone_set("Asia/Riyadh");
$username_db='u444867886_newsys';
$userpass_db='aBcd123**';
$name_db='u444867886_newsys';
$server_db='localhost';
$TimeZoneCustome='Asia/Riyadh';
	// Create connection
$conn= mysqli_connect($server_db,$username_db,$userpass_db,$name_db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>