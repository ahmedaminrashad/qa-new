<?php
/**
 * Database Connection - Uses main connection from includes/
 */
require_once(__DIR__ . '/../../includes/dbconnection.php');

// Error reporting is handled by main dbconnection.php
// This file is kept for backward compatibility only
date_default_timezone_set("Africa/Cairo");
$TimeZoneCustome = 'Africa/Cairo';

// Connection is now handled by main dbconnection.php via $conn variable
// No need for separate mysql_connect/mysql_select_db calls
?>