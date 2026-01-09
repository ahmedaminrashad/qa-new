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
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM profile WHERE teacher_name like '" . $_POST["keyword"] . "%' ORDER BY teacher_name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["teacher_id"]; ?>');"><?php echo $country["teacher_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>