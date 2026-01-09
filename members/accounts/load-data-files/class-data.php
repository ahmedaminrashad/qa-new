<?php
// Fetch the data
function taken($m, $y, $var3)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '$var3' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows;
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
if($month12 > $month11){$year12 = $year11-1;} else{$year12 = $year11;}
$ddd1 = ''.$year1.'-'.$month1.'-01';
$ddd2 = ''.$year2.'-'.$month2.'-01';
$ddd3 = ''.$year3.'-'.$month3.'-01';
$ddd4 = ''.$year4.'-'.$month4.'-01';
$ddd5 = ''.$year5.'-'.$month5.'-01';
$ddd6 = ''.$year6.'-'.$month6.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
$last_date2 = date("Y-m-t", strtotime($ddd2));
$last_date3 = date("Y-m-t", strtotime($ddd3));
$last_date4 = date("Y-m-t", strtotime($ddd4));
$last_date5 = date("Y-m-t", strtotime($ddd5));
$last_date6 = date("Y-m-t", strtotime($ddd6));
?>
[{
    "month": "<?php echo month("$month12"); ?>-<?php echo $year12; ?>" ,
    "taken": <?php echo taken("$month12","$year12","9"); ?> ,
    "absent": <?php echo taken("$month12","$year12","4"); ?> ,
    "declined": <?php echo taken("$month12","$year12","6"); ?> ,
    "leave": <?php echo taken("$month12","$year12","5"); ?> ,
    "pending": <?php echo taken("$month12","$year12","1"); ?>
    
},{
    "month": "<?php echo month("$month11"); ?>-<?php echo $year11; ?>" ,
    "taken": <?php echo taken("$month11","$year11","9"); ?> ,
    "absent": <?php echo taken("$month11","$year11","4"); ?> ,
    "declined": <?php echo taken("$month11","$year11","6"); ?> ,
    "leave": <?php echo taken("$month11","$year11","5"); ?> ,
    "pending": <?php echo taken("$month11","$year11","1"); ?>
    
},{
    "month": "<?php echo month("$month10"); ?>-<?php echo $year10; ?>" ,
    "taken": <?php echo taken("$month10","$year10","9"); ?> ,
    "absent": <?php echo taken("$month10","$year10","4"); ?> ,
    "declined": <?php echo taken("$month10","$year10","6"); ?> ,
    "leave": <?php echo taken("$month10","$year10","5"); ?> ,
    "pending": <?php echo taken("$month10","$year10","1"); ?>
    
},{
    "month": "<?php echo month("$month9"); ?>-<?php echo $year9; ?>" ,
    "taken": <?php echo taken("$month9","$year9","9"); ?> ,
    "absent": <?php echo taken("$month9","$year9","4"); ?> ,
    "declined": <?php echo taken("$month9","$year9","6"); ?> ,
    "leave": <?php echo taken("$month9","$year9","5"); ?> ,
    "pending": <?php echo taken("$month9","$year9","1"); ?>
    
},{
    "month": "<?php echo month("$month8"); ?>-<?php echo $year8; ?>" ,
    "taken": <?php echo taken("$month8","$year8","9"); ?> ,
    "absent": <?php echo taken("$month8","$year8","4"); ?> ,
    "declined": <?php echo taken("$month8","$year8","6"); ?> ,
    "leave": <?php echo taken("$month8","$year8","5"); ?> ,
    "pending": <?php echo taken("$month8","$year8","1"); ?>
    
},{
    "month": "<?php echo month("$month7"); ?>-<?php echo $year7; ?>" ,
    "taken": <?php echo taken("$month7","$year7","9"); ?> ,
    "absent": <?php echo taken("$month7","$year7","4"); ?> ,
    "declined": <?php echo taken("$month7","$year7","6"); ?> ,
    "leave": <?php echo taken("$month7","$year7","5"); ?> ,
    "pending": <?php echo taken("$month7","$year7","1"); ?>
    
},{
    "month": "<?php echo month("$month6"); ?>-<?php echo $year6; ?>" ,
    "taken": <?php echo taken("$month6","$year6","9"); ?> ,
    "absent": <?php echo taken("$month6","$year6","4"); ?> ,
    "declined": <?php echo taken("$month6","$year6","6"); ?> ,
    "leave": <?php echo taken("$month6","$year6","5"); ?> ,
    "pending": <?php echo taken("$month6","$year6","1"); ?>
    
}, {
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>" ,
    "taken": <?php echo taken("$month5","$year5","9"); ?> ,
    "absent": <?php echo taken("$month5","$year5","4"); ?> ,
    "declined": <?php echo taken("$month5","$year5","6"); ?> ,
    "leave": <?php echo taken("$month5","$year5","5"); ?> ,
    "pending": <?php echo taken("$month5","$year5","1"); ?>
    
},{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>" ,
    "taken": <?php echo taken("$month4","$year4","9"); ?> ,
    "absent": <?php echo taken("$month4","$year4","4"); ?> ,
    "declined": <?php echo taken("$month4","$year4","6"); ?> ,
    "leave": <?php echo taken("$month4","$year4","5"); ?> ,
    "pending": <?php echo taken("$month4","$year4","1"); ?>
    
},{
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>" ,
    "taken": <?php echo taken("$month3","$year3","9"); ?> ,
    "absent": <?php echo taken("$month3","$year3","4"); ?> ,
    "declined": <?php echo taken("$month3","$year3","6"); ?> ,
    "leave": <?php echo taken("$month3","$year3","5"); ?> ,
    "pending": <?php echo taken("$month3","$year3","1"); ?>
    
},{
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>",
    "taken": <?php echo taken("$month2","$year2","9"); ?> ,
    "absent": <?php echo taken("$month2","$year2","4"); ?> ,
    "declined": <?php echo taken("$month2","$year2","6"); ?> ,
    "leave": <?php echo taken("$month2","$year2","5"); ?> ,
    "pending": <?php echo taken("$month2","$year2","1"); ?>

}, {
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>",
    "taken": <?php echo taken("$month1","$year1","9"); ?> ,
    "absent": <?php echo taken("$month1","$year1","4"); ?> ,
    "declined": <?php echo taken("$month1","$year1","6"); ?> ,
    "leave": <?php echo taken("$month1","$year1","5"); ?> ,
    "pending": <?php echo taken("$month1","$year1","1"); ?>

}]