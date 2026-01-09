<?php
  require ("../includes/dbconnection.php");

$apid =$_REQUEST['p_id'];
$auid =$_REQUEST['u_id'];
$adate =$_REQUEST['date'];
$atime =$_REQUEST['time'];
$auname =$_REQUEST['usname'];
$apname =$_REQUEST['psname'];
$apman =$_REQUEST['pman'];
$acom =$_REQUEST['comment'];
$atype =$_REQUEST['type'];

			$sql = "INSERT INTO comment (parent_id, user_id, date, time, username, parent_name, manager_id, comment, type)
					VALUES('$apid','$auid','$adate','$atime','$auname','$apname','$apman','$acom','$atype')"; 
 if ($conn->query($sql) === TRUE) {
  		header('Location: suspend-classes?t_id='.$apid.'&date='.$adate.'');
  		}
?>