<?php
/**
 * View Class
 * Handles rendering of views
 */
class View {
    private $viewPath;
    private $layoutPath;
    private $data = [];

    public function __construct() {
        $this->viewPath = __DIR__ . '/../Views/';
        $this->layoutPath = __DIR__ . '/../Views/layouts/';
    }

    /**
     * Render a view
     * @param string $viewName Name of the view file (without .php)
     * @param array $data Data to pass to the view
     * @param string $layout Layout file to use (optional, null to skip layout)
     */
    public function render($viewName, $data = [], $layout = null) {
        $this->data = $data;
        
        // Extract data array to variables
        extract($data);
        
        // Start output buffering
        ob_start();
        
        // Include the view file
        $viewFile = $this->viewPath . str_replace('.', '/', $viewName) . '.php';
        if (file_exists($viewFile)) {
            // Make $this available in view for escape method
            $view = $this;
            include $viewFile;
        } else {
            throw new Exception("View file not found: $viewFile");
        }
        
        // Get the content
        $content = ob_get_clean();
        
        // If layout is specified, wrap content in layout
        if ($layout) {
            $layoutFile = $this->layoutPath . $layout . '.php';
            if (file_exists($layoutFile)) {
                ob_start();
                // Make $content available to layout
                extract($data);
                include $layoutFile;
                return ob_get_clean();
            }
        }
        
        return $content;
    }

    /**
     * Include a partial view
     */
    public function partial($partialName, $data = []) {
        extract($data);
        $partialFile = $this->viewPath . 'partials/' . $partialName . '.php';
        if (file_exists($partialFile)) {
            // Make escape method available
            $escape = [$this, 'escape'];
            include $partialFile;
        }
    }

    /**
     * Escape output for XSS prevention
     */
    public function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Get a data value
     */
    public function get($key, $default = null) {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }
}

