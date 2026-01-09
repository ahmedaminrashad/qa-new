<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

<?php 

        $result = mysql_query("SELECT * FROM account");
		if (!$result) 
			{
			die("Query to show fields from table failed 00");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		 if ($numberOfRows > 0) 
			{
			$i=0;
			echo $numberOfRows;
			while ($row = mysql_fetch_array($result))
				{	
				         $parent_name = $row['parent_name'];
						 $parent_id = $row['parent_id'];
				         $var = mysql_query("UPDATE `account` SET `email` = 'aaaaaaaa@aaaam.com' , `mobile` = '5555555555555' WHERE `account`.`parent_id` = '$parent_id'");
			             echo $parent_name.'<br>';		
         	             $i++;	 
		     	}
			}
		
?>