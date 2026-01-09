<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y = date('Y');
// Connect to MySQL
// Fetch the data
function regulars($m)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where active = 1 AND regular_date <= '$m'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows;
		}
function all($m)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where (active = 5 OR active = 1) AND regular_date <= '$m'";
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
    "active": <?php echo regulars("$last_date6"); ?> ,
    "all": <?php echo all("$last_date6"); ?>
},{
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>",
    "active": <?php echo regulars("$last_date5"); ?> ,
    "all": <?php echo all("$last_date5"); ?>
},{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>",
    "active": <?php echo regulars("$last_date4"); ?> ,
    "all": <?php echo all("$last_date4"); ?>
},{
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>",
    "active": <?php echo regulars("$last_date3"); ?> ,
    "all": <?php echo all("$last_date3"); ?>
},{
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>",
    "active": <?php echo regulars("$last_date2"); ?> ,
    "all": <?php echo all("$last_date2"); ?>
},{
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>",
    "active": <?php echo regulars("$last_date1"); ?> ,
    "all": <?php echo all("$last_date1"); ?>
}]