<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['n_id'];
	
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());

	$sql = "UPDATE note_student SET status = '2', read_date = '$sy11', read_time = '$date11' WHERE note_id = '$pid'";  	

	if ($conn->query($sql) === TRUE) {
	header("Location: make-regular-parent?ppid=$pid&ddid=$did&frr=$frs");
	}
?>