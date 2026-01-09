<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$history_id =$_REQUEST['history_id'];
	$sql = "DELETE FROM class_history WHERE history_id = '$history_id'";  		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>