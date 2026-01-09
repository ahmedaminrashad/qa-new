<?php
/**
 * Auto Route Generator
 * Automatically generates routes for all controllers in Controllers directory
 * 
 * Usage: php AUTO_ROUTE_GENERATOR.php
 */

$controllersDir = __DIR__ . '/Controllers';
$indexFile = __DIR__ . '/index.php';

// Get all controller files
$controllers = glob($controllersDir . '/*Controller.php');

echo "Auto Route Generator\n";
echo "===================\n\n";

$existingRoutes = file_get_contents($indexFile);
$newRoutes = [];

foreach ($controllers as $controllerFile) {
    $className = basename($controllerFile, '.php');
    
    // Extract controller name (remove 'Controller' suffix)
    $routeName = str_replace('Controller', '', $className);
    
    // Convert PascalCase to kebab-case
    $routeName = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $routeName));
    
    // Check if route already exists
    if (strpos($existingRoutes, "/$routeName'") !== false || 
        strpos($existingRoutes, "'$routeName'") !== false) {
        echo "⏭️  Route for $className already exists\n";
        continue;
    }
    
    // Generate route
    $controllerShort = str_replace('Controller', '', $className);
    $newRoutes[] = "\$router->get('/$routeName', '{$controllerShort}@index');";
    
    echo "✅ Generated route: /$routeName -> {$controllerShort}@index\n";
}

if (!empty($newRoutes)) {
    echo "\nAdd these routes to index.php:\n";
    echo "===============================\n";
    foreach ($newRoutes as $route) {
        echo "$route\n";
    }
} else {
    echo "\n✅ All routes already exist!\n";
}

echo "\nDone!\n";

