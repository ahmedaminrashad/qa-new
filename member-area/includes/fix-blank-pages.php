<?php
/**
 * Script to fix blank page issues by adding error reporting and mysql compatibility
 * to all PHP files in member-area
 * 
 * Usage: php fix-blank-pages.php
 */

// Find all PHP files recursively
function findPHPFiles($dir, &$files = []) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            // Skip vendor directories and other non-essential directories
            if (strpos($item, 'vendor') === false && 
                strpos($item, 'node_modules') === false &&
                strpos($item, '.git') === false) {
                findPHPFiles($path, $files);
            }
        } elseif (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $files[] = $path;
        }
    }
    return $files;
}

// Check if file already has error reporting
function hasErrorReporting($content) {
    $patterns = [
        '/error_reporting\(/i',
        '/ini_set\([\'"]display_errors/i',
        '/require.*init\.php/i',
        '/require.*mysql-compat\.php/i'
    ];
    
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $content)) {
            return true;
        }
    }
    return false;
}

// Get the relative path to includes/init.php
function getInitPath($filePath, $baseDir) {
    $relativePath = str_replace($baseDir . '/', '', $filePath);
    $depth = substr_count($relativePath, '/');
    
    if ($depth == 0) {
        return 'includes/init.php';
    } elseif ($depth == 1) {
        return '../includes/init.php';
    } elseif ($depth >= 2) {
        return str_repeat('../', $depth) . 'includes/init.php';
    }
    return '../includes/init.php';
}

// Add init include to file
function addInitInclude($filePath, $content) {
    $baseDir = dirname(__FILE__);
    $initPath = getInitPath($filePath, $baseDir);
    
    // Skip if already has includes/init.php
    if (strpos($content, 'includes/init.php') !== false) {
        return false;
    }
    
    // Find the opening PHP tag
    if (preg_match('/^<\?php\s*\n/', $content, $matches, PREG_OFFSET_CAPTURE)) {
        $pos = $matches[0][1] + strlen($matches[0][0]);
        
        // Check if there's already a require/include after opening tag
        $nextLines = substr($content, $pos, 200);
        if (preg_match('/^\s*(require|include)/', $nextLines)) {
            // Add before existing includes
            $insert = "require_once(__DIR__ . '/" . $initPath . "');\n";
        } else {
            // Add after opening tag
            $insert = "require_once(__DIR__ . '/" . $initPath . "');\n\n";
        }
        
        $newContent = substr_replace($content, $insert, $pos, 0);
        return $newContent;
    } elseif (preg_match('/^<\?php\s+/', $content)) {
        // Opening tag with content on same line
        $newContent = preg_replace(
            '/^(<\?php\s+)/',
            "$1require_once(__DIR__ . '/" . $initPath . "');\n\n",
            $content
        );
        return $newContent;
    }
    
    return false;
}

// Main execution
$baseDir = dirname(__FILE__);
$memberAreaDir = dirname($baseDir);

echo "Scanning for PHP files...\n";
$phpFiles = findPHPFiles($memberAreaDir);

echo "Found " . count($phpFiles) . " PHP files\n";
echo "Processing files...\n\n";

$updated = 0;
$skipped = 0;
$errors = [];

foreach ($phpFiles as $file) {
    // Skip certain files
    if (strpos($file, 'init.php') !== false ||
        strpos($file, 'mysql-compat.php') !== false ||
        strpos($file, 'fix-blank-pages.php') !== false ||
        strpos($file, 'show-errors.php') !== false ||
        strpos($file, 'vendor/') !== false) {
        continue;
    }
    
    $content = file_get_contents($file);
    if ($content === false) {
        $errors[] = "Could not read: $file";
        continue;
    }
    
    // Skip if already has error reporting
    if (hasErrorReporting($content)) {
        $skipped++;
        continue;
    }
    
    // Try to add init include
    $newContent = addInitInclude($file, $content);
    
    if ($newContent && $newContent !== $content) {
        // Backup original
        $backupFile = $file . '.backup.' . date('Y-m-d_H-i-s');
        if (copy($file, $backupFile)) {
            if (file_put_contents($file, $newContent) !== false) {
                $updated++;
                echo "Updated: " . str_replace($memberAreaDir . '/', '', $file) . "\n";
            } else {
                $errors[] = "Could not write: $file";
            }
        } else {
            $errors[] = "Could not backup: $file";
        }
    }
}

echo "\n=== Summary ===\n";
echo "Updated: $updated files\n";
echo "Skipped (already fixed): $skipped files\n";
echo "Errors: " . count($errors) . "\n";

if (!empty($errors)) {
    echo "\nErrors:\n";
    foreach ($errors as $error) {
        echo "  - $error\n";
    }
}

echo "\nDone!\n";

?>

