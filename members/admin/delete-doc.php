<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['cid'];
$img_id =$_REQUEST['img'];
	$sql = "DELETE FROM employees_docs WHERE doc_id = '$dept_id'";
	unlink('../uploads/'.$img_id.'');
	unlink('../uploads/thumb/'.$img_id.'');  		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>