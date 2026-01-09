<?php session_start(); ?>
<?php
require ("../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$rid =$_REQUEST['r_id'];
$myArray = explode(',', $rid);
for($i=0;$i<count($myArray);$i++){
$del_id = $myArray[$i];
$sy11 = date('Y-m-d');
require ("../includes/dbconnection.php");
$cid =$_REQUEST['csrid'];
			$sql =  "UPDATE new_request SET csr_id = '$cid', status = '7' where request_id = '$del_id'";
 $sql = "INSERT INTO csr_performance(req_id, csr_id, status, date)
					VALUES('$del_id','$cid','1','$sy11')";
echo 'Allocated (<a href="'.$_SERVER["HTTP_REFERER"].'">Go back</a>)';
}
?>
