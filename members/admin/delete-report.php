<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['ID'];
	$sql = "DELETE FROM reports WHERE report_id = '$dept_id'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>