<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['pteacher'];
	$pidname =$_REQUEST['pname'];
	$sta =$_REQUEST['sts'];
	$stalog =$_REQUEST['stlog'];
	$date = date('d-m-Y', time());
	$sql = "SELECT * FROM course Where Teacher = $pid";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			$sql = "UPDATE profile SET active = '$sta', dept_id = '$stalog', deactive = '$date' WHERE teacher_id = '$pid'";
			if ($conn->query($sql) === TRUE) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<center style=" margin-top: 200px; font-size: larger; color: #FF0000; vertical-align: middle;">You are not allowed to deactivate teacher <b>'.$pidname.'</b>. Total number of students with him/her is '.$numberOfRows.'. <a href="list-of-teachers"><button type="button" class="btn red btn-xs">Go Back</button></a></center>';
			}	
?>