<?php
/**
 * Environment Variables Loader
 * Loads variables from .env file into $_ENV and $_SERVER
 */

if (!function_exists('load_env_file')) {
    /**
     * Load environment variables from .env file
     * 
     * @param string $path Path to .env file (relative to project root)
     * @return bool True if file was loaded, false otherwise
     */
    function load_env_file($path = '.env') {
        // Get the project root directory (3 levels up from this file: member-area/includes/env-loader.php)
        // If file is at: project/member-area/includes/env-loader.php
        // Then project root is 3 levels up
        $projectRoot = dirname(dirname(dirname(__FILE__)));
        $envPath = $projectRoot . DIRECTORY_SEPARATOR . $path;
        
        // Check if .env file exists
        if (!file_exists($envPath)) {
            error_log(".env file not found at: " . $envPath);
            return false;
        }
        
        // Read the file
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            error_log("Failed to read .env file: " . $envPath);
            return false;
        }
        
        // Parse each line
        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Parse KEY=VALUE format
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remove quotes if present
                if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                    (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                    $value = substr($value, 1, -1);
                }
                
                // Set environment variables
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv("$key=$value");
            }
        }
        
        return true;
    }
}

if (!function_exists('env')) {
    /**
     * Get an environment variable value
     * 
     * @param string $key Environment variable key
     * @param mixed $default Default value if key doesn't exist
     * @return mixed Environment variable value or default
     */
    function env($key, $default = null) {
        // Check $_ENV first
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        
        // Check $_SERVER
        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }
        
        // Check getenv()
        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }
        
        return $default;
    }
}

// Auto-load .env file when this file is included (only once)
if (!defined('ENV_LOADED')) {
    if (load_env_file()) {
        define('ENV_LOADED', true);
    }
}
?>

