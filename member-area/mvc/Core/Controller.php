<?php
/**
 * Base Controller Class
 * All controllers should extend this class
 */
class Controller {
    protected $db;
    protected $view;
    protected $model;

    public function __construct() {
        // Initialize database connection
        global $conn;
        $this->db = $conn;
        
        // Initialize view
        $this->view = new View();
        
        // Load session helper
        $this->requireAuth();
    }

    /**
     * Load a model
     */
    protected function loadModel($modelName) {
        $modelFile = __DIR__ . '/../Models/' . $modelName . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
            $modelClass = $modelName;
            $this->model = new $modelClass($this->db);
            return $this->model;
        }
        return null;
    }

    /**
     * Load a view
     */
    protected function view($viewName, $data = []) {
        return $this->view->render($viewName, $data);
    }

    /**
     * Redirect to a URL
     */
    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

    /**
     * Get POST data
     */
    protected function post($key = null, $default = null) {
        if ($key === null) {
            return $_POST;
        }
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    /**
     * Get GET data
     */
    protected function get($key = null, $default = null) {
        if ($key === null) {
            return $_GET;
        }
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    /**
     * Get REQUEST data
     */
    protected function request($key = null, $default = null) {
        if ($key === null) {
            return $_REQUEST;
        }
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    /**
     * Check if user is authenticated (override in child classes)
     */
    protected function requireAuth() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        // Include session check
        if (file_exists(__DIR__ . '/../../includes/session1.php')) {
            include(__DIR__ . '/../../includes/session1.php');
        }
    }

    /**
     * Return JSON response
     */
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

