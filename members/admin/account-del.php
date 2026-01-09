<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['parent_id'];
	// sending query
	$sql = "DELETE FROM account WHERE parent_id = '$pid'";  
	if ($conn->query($sql) === TRUE) {	
	header("Location: account-list.php");
	}
?>