<?php
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
date_default_timezone_set($TimeZoneCustome);
  $pT =base64_decode($_GET["tid"]);
			$sql = "SELECT * FROM profile WHERE teacher_id='$pT' ";
			$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$link = $row['link'];
			}
			}
			header("Location: ".$link."");
?>