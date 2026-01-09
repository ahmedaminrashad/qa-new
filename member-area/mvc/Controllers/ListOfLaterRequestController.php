<?php
/**
 * ListOfLaterRequest Controller
 * Migrated from list-of-later-request.php
 */
class ListOfLaterRequest extends Controller {
    
    public function index() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        
        // Register helper functions if needed
        $this->registerHelperFunctions();
        
        // Prepare data for view
        $data = [];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/list-of-later-request', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        // Add helper functions here if needed
    }
    
    /**
     * Render view using legacy header/footer system
     */
    private function renderLegacyView($viewName, $data = []) {
        extract($data);
        
        // Change to admin directory context for relative paths in header-main.php
        $originalDir = getcwd();
        $adminDir = __DIR__ . '/../../admin';
        
        // Include legacy header
        if (file_exists($adminDir . '/header-main.php')) {
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            include($adminDir . '/header-main.php');
            if ($originalDir) {
                chdir($originalDir);
            }
        }
        
        // Include the actual view content
        $viewFile = __DIR__ . '/../../admin/' . str_replace('admin/', '', $viewName) . '.php';
        if (file_exists($viewFile)) {
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            extract($data);
            include($viewFile);
            if ($originalDir) {
                chdir($originalDir);
            }
        } else {
            throw new Exception("View file not found: $viewFile");
        }
    }
}