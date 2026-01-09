<?php session_start(); ?>
<?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
$apid =$_REQUEST['p_id'];
$auid =$_REQUEST['u_id'];
$adate =$_REQUEST['date'];
$atime =$_REQUEST['time'];
$auname =$_REQUEST['usname'];
$apname =$_REQUEST['psname'];
//$apman =$_REQUEST['pman'];
$acom =$_REQUEST['comment'];
$atype =$_REQUEST['type'];
require ("../includes/dbconnection.php");
			$sql = "INSERT INTO comment (parent_id, user_id, date, time, username, parent_name, manager_id, comment, type) VALUES('$apid','$auid','$adate','$atime','$auname','$apname','$auid','$acom','$atype')" or die(mysqli_error()); 
 if ($conn->query($sql) === TRUE) {		
 		echo "<script>window.open('deactivate-account?t_id=".$apid."&date=".$atime."','_self')</script>";
 		}
 		else {echo "<script>window.open('deactivate-account?t_id=".$apid."&date=".$atime."','_self')</script>";}
?>