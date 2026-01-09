<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['t_id'];

	$sql = "UPDATE account SET active = '1' WHERE parent_id = '$pid'";  	

	if($conn->query($sql) === TRUE){
 	
$sql = "UPDATE course SET active = 1, nature = '1', Teacher = '1' WHERE parent_id = $pid";
	if ($conn->query($sql) === TRUE) {
	header('Location: email-general?pid='.$pid.'&type=email-offleave-account-temp');
	}

}

?>