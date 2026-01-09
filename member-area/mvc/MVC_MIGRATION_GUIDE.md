# MVC Migration Guide

## Overview
This guide explains how to migrate the existing member-area application to an MVC (Model-View-Controller) architecture.

## Directory Structure

```
member-area/
├── mvc/                          # New MVC framework
│   ├── Core/                     # Core framework classes
│   │   ├── Controller.php       # Base controller
│   │   ├── Model.php            # Base model
│   │   ├── View.php             # View renderer
│   │   └── Router.php           # URL router
│   ├── Controllers/             # Controllers (handles requests)
│   ├── Models/                  # Models (database logic)
│   ├── Views/                   # Views (HTML templates)
│   │   └── layouts/            # Layout templates
│   ├── bootstrap.php            # Framework initialization
│   └── index.php               # Entry point
├── admin/                       # Existing admin files (to be migrated)
├── accounts/                    # Existing account files (to be migrated)
└── includes/                    # Shared includes
```

## Migration Steps

### Step 1: Create a Controller

Create a controller in `mvc/Controllers/` directory:

```php
<?php
class AdminHomeController extends Controller {
    
    public function index() {
        // Get data
        $data_date = $this->request('date', date('Y-m-d'));
        
        // Load model if needed
        // $classModel = $this->loadModel('ClassHistory');
        // $classes = $classModel->findAll(['date_admin' => $data_date]);
        
        // Prepare data for view
        $data = [
            'data_date' => $data_date,
            'title' => 'Admin Home'
        ];
        
        // Render view
        echo $this->view('admin/home/index', $data);
    }
}
```

### Step 2: Create a Model (if needed)

Create a model in `mvc/Models/` directory:

```php
<?php
class ClassHistoryModel extends Model {
    protected $table = 'class_history';
    protected $primaryKey = 'history_id';
    
    public function getByDate($date) {
        $sql = "SELECT * FROM {$this->table} WHERE date_admin = ?";
        $result = $this->query($sql, [$date]);
        $rows = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
}
```

### Step 3: Create a View

Create a view in `mvc/Views/admin/home/index.php`:

```php
<?php
// Extract variables from $data array
extract($data);
?>

<h1><?php echo $this->escape($title); ?></h1>
<p>Date: <?php echo $this->escape($data_date); ?></p>

<!-- Your HTML content here -->
```

### Step 4: Create a Layout (optional)

Create a layout in `mvc/Views/layouts/default.php`:

```php
<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? $this->escape($title) : 'Admin Panel'; ?></title>
</head>
<body>
    <?php echo $content; ?>
</body>
</html>
```

### Step 5: Add Route

In `mvc/index.php`, add your route:

```php
$router->get('/admin-home', 'AdminHome@index');
```

## Migration Examples

### Example 1: Simple Page Migration

**Before (admin-home.php):**
```php
<?php
include("../includes/session1.php");
require("../includes/dbconnection.php");
include("header.php");
$data_date = $_REQUEST['date'] ?? date('Y-m-d');
?>
<!-- HTML content -->
```

**After (Controller):**
```php
class AdminHomeController extends Controller {
    public function index() {
        $data_date = $this->request('date', date('Y-m-d'));
        echo $this->view('admin/home/index', ['data_date' => $data_date]);
    }
}
```

### Example 2: Database Query Migration

**Before:**
```php
$result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date'");
while($row = mysql_fetch_assoc($result)) {
    // Process row
}
```

**After (in Model):**
```php
class ClassHistoryModel extends Model {
    protected $table = 'class_history';
    
    public function findByDate($date) {
        return $this->findAll(['date_admin' => $date]);
    }
}
```

**After (in Controller):**
```php
$model = $this->loadModel('ClassHistory');
$classes = $model->findByDate($data_date);
echo $this->view('admin/home/index', ['classes' => $classes]);
```

## Benefits of MVC

1. **Separation of Concerns**: Business logic, data access, and presentation are separated
2. **Reusability**: Models and views can be reused across different controllers
3. **Maintainability**: Code is easier to maintain and debug
4. **Testability**: Each component can be tested independently
5. **Security**: Centralized input validation and output escaping

## Migration Priority

1. **High Priority**: Frequently used pages (admin-home, dashboard, etc.)
2. **Medium Priority**: CRUD operations (add, edit, delete pages)
3. **Low Priority**: Static or rarely used pages

## Best Practices

1. **Controllers should be thin**: Keep business logic in models
2. **Models handle all database operations**: Controllers just coordinate
3. **Views are for presentation only**: No database queries in views
4. **Always escape output**: Use `$this->escape()` or `htmlspecialchars()`
5. **Use prepared statements**: Already handled in base Model class

## Testing the Migration

1. Access the MVC route: `http://localhost/quraan-new/member-area/mvc/admin-home`
2. Verify functionality matches the original page
3. Check for any errors in logs
4. Test all features (forms, links, etc.)

## Next Steps

1. Start with one simple page (like admin-home)
2. Migrate related pages together
3. Gradually move all pages to MVC structure
4. Keep old files until migration is complete and tested

