<?php
function today($var1, $var2)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM class_history WHERE date_admin = '$var1' and monitor_id = '$var2'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
	echo $numberOfRows;
	}
}
function time1($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM timestart Where time_s_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){		
		
			$s_name = $row['time_s'];
			 echo $s_name;		 
			}
}
function StudentName($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM course Where course_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){		
		
			$s_name = $row['course_yrSec'];
			 echo $s_name;		 
			}
}
function TeacherName($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){		
		
			$s_name = $row['teacher_name'];
			 echo $s_name;		 
			}
}
function MonitorName($var, $var1, $var2){
require ("../includes/dbconnection.php");
if ($var2 == 2){ $all = '<i class="fa fa-clock-o"></i>'; }
else { $all = ''; }
$sql = "SELECT * FROM monitor Where mnt_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while($row = mysqli_fetch_assoc($result)){
					$hidden_tt = $row['mnt_name'];
	
			  		if ($var1 == 11){
			  		echo '<div class="ml-auto badge badge-warning">'.$all.' On Trial ('.$hidden_tt.')</div>';
			  		}
			  		elseif ($var1 == 17){
			  		echo '<div class="ml-auto badge badge-danger">'.$all.' Suspended ('.$hidden_tt.')</div>';
			  		}
			  		elseif ($var1 == 18){
			  		echo '<div class="ml-auto badge badge-danger">'.$all.' Shifted ('.$hidden_tt.')</div>';
			  		}
			  		elseif ($var1 == 19){
			  		echo '<div class="ml-auto badge badge-info">'.$all.' Advance ('.$hidden_tt.')</div>';
			  		}
			  		elseif ($var1 == 20){
			  		echo '<div class="ml-auto badge badge-warning">'.$all.' Re-Scheduled ('.$hidden_tt.')</div>';
			  		}
			  		else {
			  		echo '<div class="ml-auto badge badge-success">'.$all.' Regular ('.$hidden_tt.')</div>';
			  		}}
			}
}
function DeptName($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM dept Where dept_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){		
		
			$s_name = $row['department'];
			 echo $s_name;		 
			}
}
function timediff($var, $var1){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM timestart Where time_s_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){		
		
			$s_name = $row['time_s'];
			$am = $s_name;
$pm = $var1;
$minutes_diff = round(abs(strtotime($pm) - strtotime($am)) / 60);
echo $minutes_diff;		 
			}
}
?>