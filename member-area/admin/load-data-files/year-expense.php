<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../../includes/dbconnection.php");
require_once("../../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection failed. Please contact the administrator.");
}

date_default_timezone_set("Africa/Cairo");

// Get and validate year_id
$y = isset($_REQUEST['year_id']) ? (int)$_REQUEST['year_id'] : date('Y');

// Fetch the data - functions must RETURN values, not echo, for JSON output
function psum($m, $y){
  global $conn;
  $m_escaped = (int)$m;
  $y_escaped = (int)$y;
  $sql = "SELECT COALESCE(SUM(amount), 0) as total FROM account_entry WHERE (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m_escaped AND YEAR(date) = $y_escaped";
  $q = mysql_query($sql);
  if ($q) {
    $row = mysql_fetch_array($q);
    return isset($row[0]) ? (float)$row[0] : 0;
  }
  return 0;
}

function rsum($m, $y){
  global $conn;
  $m_escaped = (int)$m;
  $y_escaped = (int)$y;
  $sql = "SELECT COALESCE(SUM(amount), 0) as total FROM account_entry WHERE (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m_escaped AND YEAR(date) = $y_escaped";
  $q = mysql_query($sql);
  if ($q) {
    $row = mysql_fetch_array($q);
    return isset($row[0]) ? (float)$row[0] : 0;
  }
  return 0;
}

function tot($m, $y){
  $first = psum($m, $y);
  $second = rsum($m, $y);
  $total = $second - $first;
  return $total;
}


// Set content type to JSON
header('Content-Type: application/json');

$query = "SELECT * FROM month ORDER BY month_id ASC";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Return JSON error
  echo json_encode(['error' => 'Invalid query: ' . mysql_error()]);
  exit;
}

// Build JSON array
$data = array();
while ( $row = mysql_fetch_assoc( $result ) ) {
  $revenue = rsum($row['num'], $y);
  $expense = psum($row['num'], $y);
  $surplus = tot($row['num'], $y);
  
  $data[] = array(
    'month' => $row['short_name'],
    'revenue' => $revenue,
    'expense' => $expense,
    'surplus' => $surplus
  );
}

// Output JSON
echo json_encode($data);
?>