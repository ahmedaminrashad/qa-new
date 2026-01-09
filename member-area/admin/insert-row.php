<?php
	require_once("dbcontroller.php");
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
	$db_handle = new DBController();
	$family = "";
	$user_name = "";
	$note = "";
	$status = "";

	if(!empty($_POST["date"])) {
		$date = $db_handle->cleanData($_POST["date"]);
	}
	if(!empty($_POST["note"])) {
		$note = $db_handle->cleanData($_POST["note"]);
	}

	$sql = "INSERT INTO diary_notes (user,note,user_name,date) VALUES ('" . $user_id . "','" . $note . "','" . $user_name . "','" . $date . "')";
	$product_id = $db_handle->executeInsert($sql);

	if(!empty($product_id)) {
		$sql = "SELECT * from diary_notes WHERE note_id = '$product_id' ";
		$productResult = $db_handle->readData($sql);
	}
?>
<?php 
	if(!empty($productResult)) { 
?>
<tr>
	<td><?php echo $productResult[0]["date"]; ?></td>
	<td><?php echo $productResult[0]["note"]; ?></td>
</tr>
<?php
	}
?>	
