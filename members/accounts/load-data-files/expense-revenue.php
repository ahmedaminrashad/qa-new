<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y = date('Y');

function psum($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '0';
        }
}
function rsum($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '0';
        }
}
function tot($d1, $d2){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
echo $total;
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
if($month2 > $month1){$year2 = $year1-1;} else{$year2 = $year1;}
if($month3 > $month2){$year3 = $year2-1;} else{$year3 = $year2;}
if($month4 > $month3){$year4 = $year3-1;} else{$year4 = $year3;}
if($month5 > $month4){$year5 = $year4-1;} else{$year5 = $year4;}
if($month6 > $month5){$year6 = $year5-1;} else{$year6 = $year5;}
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
    "month": "<?php echo month("$month6"); ?>-<?php echo $year6; ?>",
    "revenue": <?php echo rsum("$month6","$year6"); ?> ,
    "expense": <?php echo psum("$month6","$year6"); ?> ,
    "surplus": <?php echo tot("$ddd6","$last_date6"); ?> ,
    "curve": <?php echo tot("$ddd6","$last_date6"); ?>
},{
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>",
    "revenue": <?php echo rsum("$month5","$year5"); ?> ,
    "expense": <?php echo psum("$month5","$year5"); ?> ,
    "surplus": <?php echo tot("$ddd5","$last_date5"); ?> ,
    "curve": <?php echo tot("$ddd5","$last_date5"); ?>
},{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>",
    "revenue": <?php echo rsum("$month4","$year4"); ?> ,
    "expense": <?php echo psum("$month4","$year4"); ?> ,
    "surplus": <?php echo tot("$ddd4","$last_date4"); ?> ,
    "curve": <?php echo tot("$ddd4","$last_date4"); ?>
},{
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>",
    "revenue": <?php echo rsum("$month3","$year3"); ?> ,
    "expense": <?php echo psum("$month3","$year3"); ?> ,
    "surplus": <?php echo tot("$ddd3","$last_date3"); ?> ,
    "curve": <?php echo tot("$ddd3","$last_date3"); ?>
},{
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>",
    "revenue": <?php echo rsum("$month2","$year2"); ?> ,
    "expense": <?php echo psum("$month2","$year2"); ?> ,
    "surplus": <?php echo tot("$ddd2","$last_date2"); ?> ,
    "curve": <?php echo tot("$ddd2","$last_date2"); ?>
},{
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>",
    "revenue": <?php echo rsum("$month1","$year1"); ?> ,
    "expense": <?php echo psum("$month1","$year1"); ?> ,
    "surplus": <?php echo tot("$ddd1","$last_date1"); ?> ,
    "curve": <?php echo tot("$ddd1","$last_date1"); ?>
}]