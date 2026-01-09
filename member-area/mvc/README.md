# MVC Framework for Member Area

## Quick Start

### 1. Access the MVC Application

The MVC framework is accessible via:
- Direct access: `http://localhost/quraan-new/member-area/mvc/index.php`
- Or configure URL rewriting (see below)

### 2. Current Routes

- `/admin-home` → AdminHomeController@index
- `/admin-home-all` → AdminHomeController@all (to be implemented)
- `/list-of-active-students` → StudentController@listActive (to be implemented)

### 3. Directory Structure

```
mvc/
├── Core/                    # Core framework files
│   ├── Controller.php      # Base controller class
│   ├── Model.php           # Base model class
│   ├── View.php            # View renderer
│   └── Router.php          # URL router
├── Controllers/            # Your controllers
├── Models/                 # Your models
├── Views/                  # Your view templates
│   └── layouts/           # Layout templates
├── bootstrap.php          # Framework initialization
├── index.php             # Entry point
└── README.md             # This file
```

## Creating a New Controller

1. Create file: `mvc/Controllers/YourController.php`
2. Extend Controller class
3. Add route in `index.php`

Example:
```php
<?php
class YourController extends Controller {
    public function index() {
        $data = ['message' => 'Hello World'];
        echo $this->view('your/view', $data);
    }
}
```

## Creating a New Model

1. Create file: `mvc/Models/YourModel.php`
2. Set table name and primary key
3. Add custom methods

Example:
```php
<?php
class YourModel extends Model {
    protected $table = 'your_table';
    protected $primaryKey = 'id';
    
    public function customMethod() {
        return $this->findAll();
    }
}
```

## Creating a View

1. Create file: `mvc/Views/your/view.php`
2. Access data passed from controller
3. Use `$this->escape()` for output escaping

Example:
```php
<h1><?php echo $this->escape($message); ?></h1>
```

## Migration Status

- [x] MVC Framework Core
- [x] Base Classes (Controller, Model, View, Router)
- [x] Example Controller (AdminHomeController)
- [x] Example Model (ClassHistoryModel)
- [ ] Full migration of admin pages
- [ ] Full migration of account pages
- [ ] Full migration of employee pages

## URL Rewriting (Optional)

To use clean URLs without `index.php`, add this to `.htaccess`:

```apache
RewriteEngine On
RewriteBase /quraan-new/member-area/mvc/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

## Benefits

✅ **Separation of Concerns**: Clean code organization
✅ **Security**: Built-in input validation and output escaping
✅ **Maintainability**: Easier to maintain and extend
✅ **Reusability**: Models and views can be reused
✅ **Testability**: Each component can be tested independently

## Migration Process

See `MVC_MIGRATION_GUIDE.md` for detailed migration instructions.

## Support

For questions or issues, refer to:
- `MVC_MIGRATION_GUIDE.md` - Detailed migration guide
- Existing examples in `Controllers/` and `Models/`

