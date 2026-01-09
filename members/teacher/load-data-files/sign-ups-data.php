<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y = date('Y');
function requests($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where status != 10 AND MONTH(date) = $m AND YEAR(date) = $y";
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
function trials($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where MONTH(trial_date) = $m AND YEAR(trial_date) = $y";
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
function regulars($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y";
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
function lefts($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account WHERE MONTH(deactivation_date) = $m AND YEAR(deactivation_date) = $y AND dateDiff(deactivation_date,regular_date) > 30";
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
    "month": "<?php echo month("$month6"); ?>-<?php echo $year6; ?>" ,
    "request": <?php echo requests("$month6","$year6"); ?> ,
    "trial": <?php echo trials("$month6","$year6"); ?> ,
    "regular": <?php echo regulars("$month6","$year6"); ?> ,
    "left": <?php echo lefts("$month6","$year6"); ?>
    
}, {
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>" ,
    "request": <?php echo requests("$month5","$year5"); ?> ,
    "trial": <?php echo trials("$month5","$year5"); ?> ,
    "regular": <?php echo regulars("$month5","$year5"); ?> ,
    "left": <?php echo lefts("$month5","$year5"); ?>
    
},{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>" ,
    "request": <?php echo requests("$month4","$year4"); ?> ,
    "trial": <?php echo trials("$month4","$year4"); ?> ,
    "regular": <?php echo regulars("$month4","$year4"); ?> ,
    "left": <?php echo lefts("$month4","$year4"); ?>
    
},{
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>" ,
    "request": <?php echo requests("$month3","$year3"); ?> ,
    "trial": <?php echo trials("$month3","$year3"); ?> ,
    "regular": <?php echo regulars("$month3","$year3"); ?> ,
    "left": <?php echo lefts("$month3","$year3"); ?>
    
},{
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>",
    "request": <?php echo requests("$month2","$year2"); ?> ,
    "trial": <?php echo trials("$month2","$year2"); ?> ,
    "regular": <?php echo regulars("$month2","$year2"); ?> ,
    "left": <?php echo lefts("$month2","$year2"); ?>

}, {
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>",
    "request": <?php echo requests("$month1","$year1"); ?> ,
    "trial": <?php echo trials("$month1","$year1"); ?> ,
    "regular": <?php echo regulars("$month1","$year1"); ?> ,
    "left": <?php echo lefts("$month1","$year1"); ?>

}]