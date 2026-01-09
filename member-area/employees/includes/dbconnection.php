<?php
/**
 * Database Connection - Uses main connection from includes/
 */
$possible_paths = [
    __DIR__ . '/../../includes/dbconnection.php',
    dirname(dirname(__DIR__)) . '/includes/dbconnection.php',
];

foreach ($possible_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        return;
    }
}

// Fallback: local connection
require_once(__DIR__ . '/../../includes/dbconnection.php');
?>