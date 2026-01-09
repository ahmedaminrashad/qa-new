<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['cid'];
	$sql = "DELETE FROM voucher WHERE voucher_id = '$dept_id'";
	$sql = "DELETE FROM account_entry WHERE voucher_id = '$dept_id'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>