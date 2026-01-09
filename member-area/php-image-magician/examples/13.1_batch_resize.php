<?php

	require_once('image_lib/image_batch_class.php');
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

	$batchObj = new imageBatch('sample_images', 'png, jpg');

	$batchObj -> resizeImage(150, 100, 'crop');
	$batchObj -> addText('test', 'm');
	$batchObj -> addBorder(2, '#df0e44');

	$batchObj -> save('output_5.1', 100, 'jpg');
?>
