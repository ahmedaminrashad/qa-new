<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? $this->escape($title) : 'MVC Test'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        .success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .info {
            background: #e7f3ff;
            border: 1px solid #b3d9ff;
            color: #004085;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:hover {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo isset($title) ? $this->escape($title) : 'MVC Framework'; ?></h1>
        
        <div class="success">
            <strong>✓ Success!</strong><br>
            <?php echo isset($message) ? $this->escape($message) : 'MVC Framework is operational'; ?>
        </div>
        
        <div class="info">
            <strong>Framework Information:</strong><br>
            <strong>Timestamp:</strong> <?php echo isset($timestamp) ? $this->escape($timestamp) : date('Y-m-d H:i:s'); ?><br>
            <strong>PHP Version:</strong> <?php echo PHP_VERSION; ?><br>
            <strong>MVC Path:</strong> <?php echo defined('MVC_PATH') ? MVC_PATH : 'Not defined'; ?>
        </div>
        
        <?php if (isset($routes) && is_array($routes)): ?>
        <h2>Available Routes</h2>
        <table>
            <thead>
                <tr>
                    <th>Route</th>
                    <th>Controller</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routes as $route => $controller): ?>
                <tr>
                    <td><code><?php echo $this->escape($route); ?></code></td>
                    <td><?php echo $this->escape($controller); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
        
        <div class="info">
            <strong>Next Steps:</strong>
            <ul>
                <li>Check that database connection is working</li>
                <li>Test the AdminHomeController at <code>/admin-home</code></li>
                <li>Create new controllers following the examples</li>
                <li>Start migrating existing pages to MVC pattern</li>
            </ul>
        </div>
    </div>
</body>
</html>

