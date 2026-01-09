<?php
/**
 * Test Controller
 * Simple test controller to verify MVC framework is working
 */
class TestController extends Controller {
    
    public function index() {
        $data = [
            'title' => 'MVC Framework Test',
            'message' => 'If you see this, the MVC framework is working!',
            'timestamp' => date('Y-m-d H:i:s'),
            'routes' => [
                'GET /test' => 'Test Controller',
                'GET /admin-home' => 'Admin Home Controller'
            ]
        ];
        
        echo $this->view('test/index', $data, null); // No layout for test
    }
}

