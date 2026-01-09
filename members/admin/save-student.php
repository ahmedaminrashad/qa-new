<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
error_reporting(E_ALL);
$g =$_REQUEST['t_id'];
$cv =$_REQUEST['cp_id'];
$mang =$_REQUEST['man_id'];
$trial =$_REQUEST['trial_id'];
$tz11 =$_REQUEST['time_id'];
$cur_id1 =$_REQUEST['cur_id'];
$csr_id1 =$_REQUEST['csr_id'];

$sql = "SELECT * FROM time_zone WHERE tz_id = $tz11";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$tzy_parent = $row['timezone_diff'];
			$tzname_tech = $row['timezone_name'];
			$tzy_id = $row['tz_id'];
			$tzy_php = $row['php_tz'];
				}
				}
header(
			 	"Location: add-student-account?par_id=".$g."&con_id=".$cv."&man_id=".$mang."&trial_id=".$trial."&time_id=".$tz11."&time_name=".$tzname_tech."&time_dif=".$tzy_parent."&time_php=".$tzy_php."&cur_id=".$cur_id1."&csr_id=".$csr_id1."");
exit();
?>