<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y = date('Y');

function tajweed($m, $y)
{
require ("../../includes/dbconnection.php");
$c_id=$_REQUEST['c_id'];
$sql = "SELECT * FROM test_results Where course_id = '$c_id' AND status_id = '2' AND MONTH(test_date) = $m AND YEAR(test_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '0.00';
}
else {
	while($row = mysqli_fetch_assoc($result)){		
		
			$tajweed = $row['tajweed_marks'];
			echo number_format($tajweed, 2);		 
			}
			}
	}
function reading($m, $y)
{
require ("../../includes/dbconnection.php");
$c_id=$_REQUEST['c_id'];
$sql = "SELECT * FROM test_results Where course_id = '$c_id' AND status_id = '2' AND MONTH(test_date) = $m AND YEAR(test_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '0.00';
}
else {
	while($row = mysqli_fetch_assoc($result)){		
		
			$tajweed = $row['reading_marks'];
			echo number_format($tajweed, 2);		 
			}
			}
	}
function hifz($m, $y)
{
require ("../../includes/dbconnection.php");
$c_id=$_REQUEST['c_id'];
$sql = "SELECT * FROM test_results Where course_id = '$c_id' AND status_id = '2' AND MONTH(test_date) = $m AND YEAR(test_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '0.00';
}
else {
	while($row = mysqli_fetch_assoc($result)){		
		
			$tajweed = $row['hifz_marks'];
			echo number_format($tajweed, 2);		 
			}
			}
	}
function avg($m, $y)
{
require ("../../includes/dbconnection.php");
$c_id=$_REQUEST['c_id'];
$sql = "SELECT * FROM test_results Where course_id = '$c_id' AND status_id = '2' AND MONTH(test_date) = $m AND YEAR(test_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '0.00';
}
else {
	while($row = mysqli_fetch_assoc($result)){		
		
			$tajweed = $row['tajweed_marks'];
					$reading = $row['reading_marks'];
					$hifz = $row['hifz_marks'];
					$dept_id = $row['dept_id'];	
			  		echo number_format(($tajweed+$reading+$hifz)/$dept_id, 2);		 
			}
			}
	}
function month($var)
  {
  require ("../../includes/dbconnection.php");
 $sql = "SELECT * FROM month WHERE month_id = $var";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){		
		
			$m_id = $row['month_id'];
			$m_name = $row['month_name'];
			$m_num = $row['num'];
			$s_name = $row['short_name'];
			 echo $s_name;		 
			}
	}
date_default_timezone_set("Africa/Cairo");
$year1 = date('Y');
$month1 = date('m');
$month2 = date('m', strtotime('-1 month', strtotime(date("F") . "1")));
$month3 = date('m', strtotime('-2 month', strtotime(date("F") . "1")));
$month4 = date('m', strtotime('-3 month', strtotime(date("F") . "1")));
$month5 = date('m', strtotime('-4 month', strtotime(date("F") . "1")));
$month6 = date('m', strtotime('-5 month', strtotime(date("F") . "1")));
$month7 = date('m', strtotime('-6 month', strtotime(date("F") . "1")));
$month8 = date('m', strtotime('-7 month', strtotime(date("F") . "1")));
$month9 = date('m', strtotime('-8 month', strtotime(date("F") . "1")));
$month10 = date('m', strtotime('-9 month', strtotime(date("F") . "1")));
$month11 = date('m', strtotime('-10 month', strtotime(date("F") . "1")));
$month12 = date('m', strtotime('-11 month', strtotime(date("F") . "1")));
if($month2 > $month1){$year2 = $year1-1;} else{$year2 = $year1;}
if($month3 > $month2){$year3 = $year2-1;} else{$year3 = $year2;}
if($month4 > $month3){$year4 = $year3-1;} else{$year4 = $year3;}
if($month5 > $month4){$year5 = $year4-1;} else{$year5 = $year4;}
if($month6 > $month5){$year6 = $year5-1;} else{$year6 = $year5;}
if($month7 > $month6){$year7 = $year6-1;} else{$year7 = $year6;}
if($month8 > $month7){$year8 = $year7-1;} else{$year8 = $year7;}
if($month9 > $month8){$year9 = $year8-1;} else{$year9 = $year8;}
if($month10 > $month9){$year10 = $year9-1;} else{$year10 = $year9;}
if($month11 > $month10){$year11 = $year10-1;} else{$year11 = $year10;}
if($month12 > $month11){$year12 = $year12-1;} else{$year12 = $year11;}
?>
[{
    "month": "<?php echo month("$month12"); ?>-<?php echo $year12; ?>" ,
    "tajweed": <?php echo tajweed("$month12","$year12"); ?> ,
    "reading": <?php echo reading("$month12","$year12"); ?> ,
    "hifz": <?php echo hifz("$month12","$year12"); ?> ,
    "avg": <?php echo avg("$month12","$year12"); ?>
    
}, {
    "month": "<?php echo month("$month11"); ?>-<?php echo $year11; ?>" ,
    "tajweed": <?php echo tajweed("$month11","$year11"); ?> ,
    "reading": <?php echo reading("$month11","$year11"); ?> ,
    "hifz": <?php echo hifz("$month11","$year11"); ?> ,
    "avg": <?php echo avg("$month11","$year11"); ?>
    
},{
    "month": "<?php echo month("$month10"); ?>-<?php echo $year10; ?>" ,
    "tajweed": <?php echo tajweed("$month10","$year10"); ?> ,
    "reading": <?php echo reading("$month10","$year10"); ?> ,
    "hifz": <?php echo hifz("$month10","$year10"); ?> ,
    "avg": <?php echo avg("$month10","$year10"); ?>
    
},{
    "month": "<?php echo month("$month9"); ?>-<?php echo $year9; ?>" ,
    "tajweed": <?php echo tajweed("$month9","$year9"); ?> ,
    "reading": <?php echo reading("$month9","$year9"); ?> ,
    "hifz": <?php echo hifz("$month9","$year9"); ?> ,
    "avg": <?php echo avg("$month9","$year9"); ?>
    
},{
    "month": "<?php echo month("$month8"); ?>-<?php echo $year8; ?>" ,
    "tajweed": <?php echo tajweed("$month8","$year8"); ?> ,
    "reading": <?php echo reading("$month8","$year8"); ?> ,
    "hifz": <?php echo hifz("$month8","$year8"); ?> ,
    "avg": <?php echo avg("$month8","$year8"); ?>

}, {
    "month": "<?php echo month("$month7"); ?>-<?php echo $year7; ?>" ,
    "tajweed": <?php echo tajweed("$month7","$year7"); ?> ,
    "reading": <?php echo reading("$month7","$year7"); ?> ,
    "hifz": <?php echo hifz("$month7","$year7"); ?> ,
    "avg": <?php echo avg("$month7","$year7"); ?>

}, {
    "month": "<?php echo month("$month6"); ?>-<?php echo $year6; ?>" ,
    "tajweed": <?php echo tajweed("$month6","$year6"); ?> ,
    "reading": <?php echo reading("$month6","$year6"); ?> ,
    "hifz": <?php echo hifz("$month6","$year6"); ?> ,
    "avg": <?php echo avg("$month6","$year6"); ?>

}, {
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>" ,
    "tajweed": <?php echo tajweed("$month5","$year5"); ?> ,
    "reading": <?php echo reading("$month5","$year5"); ?> ,
    "hifz": <?php echo hifz("$month5","$year5"); ?> ,
    "avg": <?php echo avg("$month5","$year5"); ?>

}, {
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>" ,
    "tajweed": <?php echo tajweed("$month4","$year4"); ?> ,
    "reading": <?php echo reading("$month4","$year4"); ?> ,
    "hifz": <?php echo hifz("$month4","$year4"); ?> ,
    "avg": <?php echo avg("$month4","$year4"); ?>

}, {
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>" ,
    "tajweed": <?php echo tajweed("$month3","$year3"); ?> ,
    "reading": <?php echo reading("$month3","$year3"); ?> ,
    "hifz": <?php echo hifz("$month3","$year3"); ?> ,
    "avg": <?php echo avg("$month3","$year3"); ?>

}, {
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>" ,
    "tajweed": <?php echo tajweed("$month2","$year2"); ?> ,
    "reading": <?php echo reading("$month2","$year2"); ?> ,
    "hifz": <?php echo hifz("$month2","$year2"); ?> ,
    "avg": <?php echo avg("$month2","$year2"); ?>

}, {
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>" ,
    "tajweed": <?php echo tajweed("$month1","$year1"); ?> ,
    "reading": <?php echo reading("$month1","$year1"); ?> ,
    "hifz": <?php echo hifz("$month1","$year1"); ?> ,
    "avg": <?php echo avg("$month1","$year1"); ?>

}]