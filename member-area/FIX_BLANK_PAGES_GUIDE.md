# Fix Blank Pages Guide

## Quick Fix Pattern

For any PHP file showing a blank page, add this at the very top (after `<?php`):

```php
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

require("../includes/dbconnection.php");  // Adjust path as needed
require_once("../includes/mysql-compat.php");  // Adjust path as needed
```

## Files Already Fixed

### Admin Directory
- ✅ `admin/index.php`
- ✅ `admin/dashboard.php`
- ✅ `admin/admin-home-all.php`
- ✅ `admin/admin-home-all1.php`
- ✅ `admin/teacher-schedule.php`
- ✅ `admin/history-details.php`

### Accounts Directory
- ✅ `accounts/index.php`
- ✅ `accounts/parents-home.php`
- ✅ `accounts/classcheck.php`

### Employees Directory
- ✅ `employees/index.php`

## Pattern for Different Directory Levels

### Files in `member-area/admin/` or `member-area/accounts/`:
```php
require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");
```

### Files in `member-area/employees/teacher/`:
```php
require("../../includes/dbconnection.php");
require_once("../../includes/mysql-compat.php");
```

### Files in `member-area/` root:
```php
require("includes/dbconnection.php");
require_once("includes/mysql-compat.php");
```

## Automated Fix Script

A script is available at `_fix_all_pages.php` but use with caution - it modifies many files.

## What Each Fix Does

1. **Error Reporting**: Shows PHP errors instead of blank page
2. **MySQL Compatibility**: Allows old `mysql_*` functions to work
3. **Session Handling**: Proper session management
4. **Database Connection**: Ensures connection is available

## Testing

After adding the fix:
1. Refresh the page
2. You should see either:
   - The page loads correctly, OR
   - Error messages showing what's wrong

## Common Issues

### "Database connection not available"
- Check `includes/dbconnection.php` has correct credentials
- Verify database server is running

### "Header file not found"
- Check the `include("header.php")` path is correct
- Verify the header file exists

### Still blank page
- Check PHP error log: `C:\xampp\php\logs\php_error_log`
- Check Apache error log: `C:\xampp\apache\logs\error.log`
- Use `admin/show-errors.php` to diagnose

## Notes

- All database connections now use mysqli
- Old mysql_* functions work via compatibility layer
- Gradually migrate to prepared statements for security
- Error reporting should be disabled in production

