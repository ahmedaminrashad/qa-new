<?php 
require ("../../members/includes/dbconnection.php");
$conn= mysqli_connect($server_db,$username_db,$userpass_db,$name_db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>