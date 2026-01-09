<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$req_id =$_REQUEST['req'];
	$sql = "DELETE FROM new_request WHERE request_id = '$req_id'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "DELETE FROM new_request_comments WHERE request_id = '$req_id'";  		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>