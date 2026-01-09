<?php
  require ("../includes/dbconnection.php");  
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
date_default_timezone_set("Africa/Cairo");
$time_start = date(" g:i:A", time(true));
$date = date('Y-m-d', time());
$mon = date('n');
$sy = date('Y');
if($sy == "2014") 
        {
            $y = 1;
        }
    elseif($sy == "2015")
        {
           $y = 2;
        } 
    elseif($sy == "2016") 
        {
            $y = 3;
        }
    elseif($sy == "2017") 
        {
            $y = 4;
        } 
    elseif($sy == "2018") 
        {
            $y = 5;
        }
    elseif($sy == "2019") 
        {
            $y = 6;
        }
    elseif($sy == "2020") 
        {
            $y = 7;
        }
?>
<?php
	$oid =$_REQUEST['sale_id'];
	$price =$_REQUEST['item_list_amount'];
	$result = mysql_query("SELECT * FROM account where order_num = '$oid'");
	if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$m_id = MYSQL_RESULT($result,$i,"m_id");
			$pc11 = MYSQL_RESULT($result,$i,"c_id");
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$ps = MYSQL_RESULT($result,$i,"skype");
			$pcur = MYSQL_RESULT($result,$i,"currency_id");
			$ppayment = MYSQL_RESULT($result,$i,"mode_id");
			mysql_query("INSERT INTO invoice(parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, order_num)
						VALUES('$pid','$pname','$price','$date','$date','$date','2','$mon','$y','$pemail','$pt','$pm','$ps','$pc11','$pcur','$ppayment','$m_id','$oid')") or die(mysql_error());
			} 

exit;

?>