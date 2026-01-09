<?php
/**
 * Router Class
 * Handles URL routing and dispatches requests to appropriate controllers
 */
class Router {
    private $routes = [];
    private $namedRoutes = []; // Store routes by name
    private $params = [];
    private $basePath = '';

    public function __construct($basePath = '') {
        $this->basePath = rtrim($basePath, '/');
    }

    /**
     * Add a route
     * @param string $method HTTP method (GET, POST, etc.)
     * @param string $pattern URL pattern
     * @param string $handler Controller@method or closure
     * @param string|null $name Route name (optional)
     */
    public function addRoute($method, $pattern, $handler, $name = null) {
        $route = [
            'method' => strtoupper($method),
            'pattern' => $pattern,
            'handler' => $handler
        ];
        
        $this->routes[] = $route;
        
        // Store named route for easy access
        if ($name !== null) {
            $this->namedRoutes[$name] = $route;
        }
    }

    /**
     * Add GET route
     * @param string $pattern URL pattern
     * @param string $handler Controller@method or closure
     * @param string|null $name Route name (optional)
     */
    public function get($pattern, $handler, $name = null) {
        $this->addRoute('GET', $pattern, $handler, $name);
    }

    /**
     * Add POST route
     * @param string $pattern URL pattern
     * @param string $handler Controller@method or closure
     * @param string|null $name Route name (optional)
     */
    public function post($pattern, $handler, $name = null) {
        $this->addRoute('POST', $pattern, $handler, $name);
    }
    
    /**
     * Generate URL from route name
     * @param string $name Route name
     * @param array $params Parameters to replace in route pattern
     * @return string Generated URL
     */
    public function url($name, $params = []) {
        if (!isset($this->namedRoutes[$name])) {
            throw new Exception("Route name '{$name}' not found");
        }
        
        $route = $this->namedRoutes[$name];
        $url = $route['pattern'];
        
        // Replace {param} with actual values
        foreach ($params as $key => $value) {
            $url = str_replace('{' . $key . '}', $value, $url);
        }
        
        return $this->basePath . $url;
    }
    
    /**
     * Get route name from pattern (for display/debugging)
     * @param string $pattern Route pattern
     * @return string|null Route name if found
     */
    public function getRouteName($pattern) {
        foreach ($this->namedRoutes as $name => $route) {
            if ($route['pattern'] === $pattern) {
                return $name;
            }
        }
        return null;
    }

    /**
     * Dispatch the request
     */
    public function dispatch() {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        // Remove base path if exists
        if ($this->basePath && strpos($requestUri, $this->basePath) === 0) {
            $requestUri = substr($requestUri, strlen($this->basePath));
        }
        
        // Remove query string
        $requestUri = strtok($requestUri, '?');
        
        // Remove index.php if present
        if (strpos($requestUri, '/index.php') !== false) {
            $requestUri = str_replace('/index.php', '', $requestUri);
        }
        
        // Normalize URI
        $requestUri = '/' . trim($requestUri, '/');
        if ($requestUri === '/') {
            $requestUri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }

            $pattern = $this->convertPattern($route['pattern']);
            
            if (preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches); // Remove full match
                $this->params = $matches;
                
                return $this->callHandler($route['handler']);
            }
        }

        // Try to match by controller/action pattern
        $result = $this->dispatchByPattern($requestUri, $requestMethod);
        
        // If still no match, show 404
        if ($result === false) {
            http_response_code(404);
            echo "<!DOCTYPE html><html><head><title>404 - Not Found</title></head><body>";
            echo "<h1>404 - Page Not Found</h1>";
            echo "<p>The requested page could not be found.</p>";
            echo "<p><strong>Requested URI:</strong> " . htmlspecialchars($requestUri) . "</p>";
            echo "<p><strong>Available Routes:</strong></p><ul>";
            foreach ($this->routes as $route) {
                $routeName = $this->getRouteName($route['pattern']);
                $displayName = $routeName ? " <strong>[{$routeName}]</strong>" : '';
                echo "<li>" . htmlspecialchars($route['method'] . ' ' . $route['pattern']) . $displayName . "</li>";
            }
            echo "</ul></body></html>";
            return false;
        }
        
        return $result;
    }

    /**
     * Convert route pattern to regex
     */
    private function convertPattern($pattern) {
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $pattern);
        $pattern = '#^' . $pattern . '$#';
        return $pattern;
    }

    /**
     * Dispatch by controller/action pattern (e.g., /admin-home -> AdminHomeController@index)
     */
    private function dispatchByPattern($uri, $method) {
        $parts = explode('/', trim($uri, '/'));
        $controllerName = isset($parts[0]) ? ucfirst(str_replace('-', '', ucwords($parts[0], '-'))) : 'Index';
        $action = isset($parts[1]) ? $parts[1] : 'index';
        
        $controllerClass = $controllerName . 'Controller';
        $controllerFile = __DIR__ . '/../Controllers/' . $controllerClass . '.php';
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (method_exists($controller, $action)) {
                    return call_user_func_array([$controller, $action], array_slice($parts, 2));
                }
            }
        }
        
        return false; // Let dispatch() handle 404
    }

    /**
     * Call the handler
     */
    private function callHandler($handler) {
        if (is_string($handler) && strpos($handler, '@') !== false) {
            list($controller, $action) = explode('@', $handler);
            $controllerClass = $controller . 'Controller';
            $controllerFile = __DIR__ . '/../Controllers/' . $controllerClass . '.php';
            
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                if (class_exists($controllerClass)) {
                    $controllerInstance = new $controllerClass();
                    if (method_exists($controllerInstance, $action)) {
                        return call_user_func_array([$controllerInstance, $action], $this->params);
                    }
                }
            }
        } elseif (is_callable($handler)) {
            return call_user_func_array($handler, $this->params);
        }
        
        return false;
    }

    /**
     * Get route parameters
     */
    public function getParams() {
        return $this->params;
    }
}

