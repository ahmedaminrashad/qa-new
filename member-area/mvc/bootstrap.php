<?php
/**
 * MVC Bootstrap File
 * Initialize the MVC framework
 */

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

// Set timezone
date_default_timezone_set("Africa/Cairo");

// Define base paths
define('MVC_PATH', __DIR__);
define('BASE_PATH', dirname(__DIR__));

// Load database connection
require_once BASE_PATH . '/includes/dbconnection.php';
require_once BASE_PATH . '/includes/mysql-compat.php';

// Load core classes
require_once MVC_PATH . '/Core/Controller.php';
require_once MVC_PATH . '/Core/Model.php';
require_once MVC_PATH . '/Core/View.php';
require_once MVC_PATH . '/Core/Router.php';

// Autoloader for Models and Controllers
spl_autoload_register(function ($class) {
    // Try Controllers
    $file = MVC_PATH . '/Controllers/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
        return;
    }
    
    // Try Models
    $file = MVC_PATH . '/Models/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
        return;
    }
});

