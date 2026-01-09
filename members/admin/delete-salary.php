<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$req_id =$_REQUEST['sal_id'];
	$sql = "DELETE FROM teacher_salary WHERE salary_id = '$req_id'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>