<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y = date('Y');
function pending($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "select sum(fee) from invoice where status = 2 and mon_id = $m and y_id = $y and currency_id = 4";
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
function tinvoice($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "select sum(fee) from invoice where mon_id = $m and y_id = $y and currency_id = 4";
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
if($month4 > $month2){$year4 = $year3-1;} else{$year4 = $year3;}
if($month5 > $month2){$year5 = $year4-1;} else{$year5 = $year4;}
if($month6 > $month2){$year6 = $year5-1;} else{$year6 = $year5;}
$sy = date('Y');
if($sy == "2014") 
        {
            $y1 = 1;
        }
    elseif($sy == "2015")
        {
           $y1 = 2;
        } 
    elseif($sy == "2016") 
        {
            $y1 = 3;
        }
    elseif($sy == "2017") 
        {
            $y1 = 4;
        } 
    elseif($sy == "2018") 
        {
            $y1 = 5;
        }
    elseif($sy == "2019") 
        {
            $y1 = 6;
        }
    elseif($sy == "2020") 
        {
            $y1 = 7;
        }
if($month2 > $month1){$y2 = $y1-1;} else{$y2 = $y1;}
if($month3 > $month2){$y3 = $y2-1;} else{$y3 = $y2;}
if($month4 > $month2){$y4 = $y3-1;} else{$y4 = $y3;}
if($month5 > $month2){$y5 = $y4-1;} else{$y5 = $y4;}
if($month6 > $month2){$y6 = $y5-1;} else{$y6 = $y5;}
$monthin1 = (string)((int)"$month1");
$monthin2 = (string)((int)"$month2");
$monthin3 = (string)((int)"$month3");
$monthin4 = (string)((int)"$month4");
$monthin5 = (string)((int)"$month5");
$monthin6 = (string)((int)"$month6");
?>
[{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>" ,
    "pending": <?php echo pending("$monthin4","$y4"); ?> ,
    "tinvoice": <?php echo tinvoice("$monthin4","$y4"); ?>

}, {
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>" ,
    "pending": <?php echo pending("$monthin3","$y3"); ?> ,
    "tinvoice": <?php echo tinvoice("$monthin3","$y3"); ?>

}, {
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>" ,
    "pending": <?php echo pending("$monthin2","$y2"); ?> ,
    "tinvoice": <?php echo tinvoice("$monthin2","$y2"); ?>

}, {
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>" ,
    "pending": <?php echo pending("$monthin1","$y1"); ?> ,
    "tinvoice": <?php echo tinvoice("$monthin1","$y1"); ?>

}]