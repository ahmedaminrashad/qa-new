<?php
require ("../includes/dbconnection.php");
$apid =$_REQUEST['p_id'];
$auid =$_REQUEST['u_id'];
$adate =$_REQUEST['date'];
$atime =$_REQUEST['time'];
$auname =$_REQUEST['usname'];
$apname =$_REQUEST['psname'];
$apman =$_REQUEST['u_id'];
$acom =$_REQUEST['comment'];
$atype =$_REQUEST['type'];

$sql = "INSERT INTO comment (parent_id, user_id, date, time, username, parent_name, manager_id, comment, type) VALUES('$apid','$auid','$adate','$atime','$auname','$apname','$apman','" . mysqli_real_escape_string($conn, $acom) . "','$atype')" or die(mysqli_error()); 					
 if ($conn->query($sql) === TRUE) {
 		header('Location: ' . $_SERVER['HTTP_REFERER']);
 		}
?>