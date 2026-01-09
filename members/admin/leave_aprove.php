<?php
  require ("../includes/dbconnection.php");  
$time_start = date(" g:i:A", time(true));
?>
<?php
	$pid =$_REQUEST['leave_id'];
	$date = date('d-m-Y', time());
	$sql = "UPDATE applica SET status = '9', objection = 'Nil' WHERE leave_id = '$pid'";  	
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>