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

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
header('Content-Type: application/json; charset=utf-8');

/*$result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '2024-06-09' AND teacher_id = '21' ORDER BY start_time_A");
header('Content-Type: application/json; charset=utf-8');
 while($row = mysql_fetch_assoc($result))
{
    print_r($row);

}*/

$result = mysql_query("SELECT * FROM `sched` WHERE teacher_id='21'");
while($row = mysql_fetch_assoc($result))
{
    print_r($row);

}