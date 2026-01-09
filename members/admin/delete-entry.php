<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['cid'];
	$sql = "DELETE FROM account_entry WHERE entry_id = '$dept_id'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>