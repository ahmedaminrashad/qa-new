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
// Database configuration
$dbhost = 'localhost';
$dbuser = 'u444867886_system';
$dbpass = 'GT0o^=/v;8yH';
$db = 'u444867886_system';
$dbHost = $dbhost;
$dbUsername = $dbuser;
$dbPassword = $dbpass;
$dbName = $db;

// Get connection object and set the charset
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
$conn->set_charset("utf8");
// Get All Table Names From the Database
$tables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$sqlScript = "";
foreach ($tables as $table) {
    
    // Prepare SQLscript for creating table structure
    // $query = "SHOW CREATE TABLE `$table`";
    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_row($result);
    
    // $sqlScript .= "\n\n" . $row[1] . ";\n\n";
    
    
    $query = "SELECT * FROM `$table`";
    $result = mysqli_query($conn, $query);
    
    $columnCount = mysqli_num_fields($result);
    
    // Prepare SQLscript for dumping data for each table
    for ($i = 0; $i < $columnCount; $i ++) {
        while ($row = mysqli_fetch_row($result)) {
            $sqlScript .= "INSERT INTO `$table` VALUES(";
            for ($j = 0; $j < $columnCount; $j ++) {
                $row[$j] = $row[$j];
                
                if (isset($row[$j])) {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    
    $sqlScript .= "\n"; 
}

if(!empty($sqlScript))
{
    // Save the SQL script to a backup file
    $backup_file_name = 'qarabic_'.date('Y-m-d').'.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler); 

    // Download the SQL backup file to the browser
    header('Content-type: application/octet-stream');
    // It will be called downloaded.pdf
    header("Content-Disposition: attachment; filename=".$backup_file_name."");
    // The PDF source is in original.pdf
    readfile($backup_file_name);
}
?>