<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$profile_no =$_REQUEST['pteacher'];

	$sql = "DELETE FROM profile WHERE teacher_id = '$profile_no'";
	if ($conn->query($sql) === TRUE) {
	header("Location: facultylist-a.php");
	}
?>