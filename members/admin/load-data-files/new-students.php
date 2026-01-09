<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y = date('Y');
function rate($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM course Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y AND nature = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
$active =  number_format($numberOfRows, 0);
$sql = "SELECT * FROM course Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
$regular =  number_format($numberOfRows, 0);
			 $a = $active/$regular;
			 if ($a > 0)
			 {
			 echo number_format($a,2);
			 }
			 else { echo 0; }
		}
function students($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM course Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y AND nature = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
		}
function regulars($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM course Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
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
$ddd7 = ''.$year7.'-'.$month7.'-01';
$ddd8 = ''.$year8.'-'.$month8.'-01';
$ddd9 = ''.$year9.'-'.$month9.'-01';
$ddd10 = ''.$year10.'-'.$month10.'-01';
$ddd11 = ''.$year11.'-'.$month11.'-01';
$ddd12 = ''.$year12.'-'.$month12.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
$last_date2 = date("Y-m-t", strtotime($ddd2));
$last_date3 = date("Y-m-t", strtotime($ddd3));
$last_date4 = date("Y-m-t", strtotime($ddd4));
$last_date5 = date("Y-m-t", strtotime($ddd5));
$last_date6 = date("Y-m-t", strtotime($ddd6));
$last_date7 = date("Y-m-t", strtotime($ddd7));
$last_date8 = date("Y-m-t", strtotime($ddd8));
$last_date9 = date("Y-m-t", strtotime($ddd9));
$last_date10 = date("Y-m-t", strtotime($ddd10));
$last_date11 = date("Y-m-t", strtotime($ddd11));
$last_date12 = date("Y-m-t", strtotime($ddd12));
?>
[{
    "month": "<?php echo month("$month12"); ?>-<?php echo $year12; ?>" ,
    "family": <?php echo regulars("$month12","$year12"); ?> ,
    "rate": <?php echo rate("$month12","$year12"); ?> ,
    "student": <?php echo students("$month12","$year12"); ?>
    
},{
    "month": "<?php echo month("$month11"); ?>-<?php echo $year11; ?>" ,
    "family": <?php echo regulars("$month11","$year11"); ?> ,
    "rate": <?php echo rate("$month11","$year11"); ?> ,
    "student": <?php echo students("$month11","$year11"); ?>
    
},{
    "month": "<?php echo month("$month10"); ?>-<?php echo $year10; ?>" ,
    "family": <?php echo regulars("$month10","$year10"); ?> ,
    "rate": <?php echo rate("$month10","$year10"); ?> ,
    "student": <?php echo students("$month10","$year10"); ?>
    
},{
    "month": "<?php echo month("$month9"); ?>-<?php echo $year9; ?>" ,
    "family": <?php echo regulars("$month9","$year9"); ?> ,
    "rate": <?php echo rate("$month9","$year9"); ?> ,
    "student": <?php echo students("$month9","$year9"); ?>
    
},{
    "month": "<?php echo month("$month8"); ?>-<?php echo $year8; ?>" ,
    "family": <?php echo regulars("$month8","$year8"); ?> ,
    "rate": <?php echo rate("$month8","$year8"); ?> ,
    "student": <?php echo students("$month8","$year8"); ?>
    
},{
    "month": "<?php echo month("$month7"); ?>-<?php echo $year7; ?>" ,
    "family": <?php echo regulars("$month7","$year7"); ?> ,
    "rate": <?php echo rate("$month7","$year7"); ?> ,
    "student": <?php echo students("$month7","$year7"); ?>
    
},{
    "month": "<?php echo month("$month6"); ?>-<?php echo $year6; ?>" ,
    "family": <?php echo regulars("$month6","$year6"); ?> ,
    "rate": <?php echo rate("$month6","$year6"); ?> ,
    "student": <?php echo students("$month6","$year6"); ?>
    
}, {
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>" ,
    "family": <?php echo regulars("$month5","$year5"); ?> ,
    "rate": <?php echo rate("$month5","$year5"); ?> ,
    "student": <?php echo students("$month5","$year5"); ?>
    
},{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>" ,
    "family": <?php echo regulars("$month4","$year4"); ?> ,
    "rate": <?php echo rate("$month4","$year4"); ?> ,
    "student": <?php echo students("$month4","$year4"); ?>
    
},{
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>" ,
    "family": <?php echo regulars("$month3","$year3"); ?> ,
    "rate": <?php echo rate("$month3","$year3"); ?> ,
    "student": <?php echo students("$month3","$year3"); ?>
    
},{
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>",
    "family": <?php echo regulars("$month2","$year2"); ?> ,
    "rate": <?php echo rate("$month2","$year2"); ?> ,
    "student": <?php echo students("$month2","$year2"); ?>

}, {
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>",
    "family": <?php echo regulars("$month1","$year1"); ?> ,
    "rate": <?php echo rate("$month1","$year1"); ?> ,
    "student": <?php echo students("$month1","$year1"); ?>

}]