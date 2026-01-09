<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$req_id =$_REQUEST['req'];
	$sql = "UPDATE new_request SET status = 2 WHERE request_id = '$req_id'"; 		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>