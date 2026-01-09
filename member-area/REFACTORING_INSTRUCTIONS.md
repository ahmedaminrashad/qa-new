# Refactoring Instructions for All Member-Area Files

## Quick Fix for Any PHP File

Add these lines at the very top of each PHP file (before any other code):

```php
<?php
// Enable error reporting and mysql compatibility
require_once(__DIR__ . '/includes/init.php');
// OR if file is in a subdirectory:
require_once(__DIR__ . '/../includes/init.php');
// OR:
require_once(__DIR__ . '/../../includes/init.php');
```

The `init.php` file will automatically:
- Enable error reporting
- Load database connection
- Load mysql compatibility layer
- Start session if needed

## Files Already Refactored

### Core Files
- ✅ `includes/dbconnection.php` - Main database connection (mysqli)
- ✅ `includes/session.php` - Session management
- ✅ `includes/session1.php` - Admin session management
- ✅ `includes/mysql-compat.php` - MySQL compatibility layer
- ✅ `includes/db-helpers.php` - Helper functions
- ✅ `includes/init.php` - Master initialization file

### Login Files
- ✅ `accounts/index.php` - Student/Parent login
- ✅ `admin/index.php` - Admin login
- ✅ `employees/index.php` - Employee login

### Dashboard/Home Files
- ✅ `accounts/parents-home.php` - Parent dashboard
- ✅ `admin/dashboard.php` - Admin dashboard
- ✅ `accounts/classcheck.php` - Class check page

### Database Connection Files
- ✅ `includes/dbconnection.php` - Main (mysqli)
- ✅ `admin/dbconnection.php` - Points to main
- ✅ `accounts/payments/dbconnection.php` - Points to main
- ✅ `employees/includes/dbconnection.php` - Points to main

## Remaining Files That Need Updates

### Database Connection Files (Update to point to main)
- [ ] `employees/teacher/dbconnection.php`
- [ ] `employees/quality-assurance-manager/dbconnection.php`
- [ ] `employees/billing/dbconnection.php`
- [ ] `employees/customer-service-representative/dbconnection.php`
- [ ] `employees/accounts/dbconnection.php`
- [ ] `employees/senior-manager/dbconnection.php`
- [ ] `employees/manager/dbconnection.php`
- [ ] `employees/monitor/dbconnection.php`

### Files Using mysql_* Functions
All files in the following directories still need the mysql compatibility layer:
- All files in `admin/` directory
- All files in `accounts/` directory
- All files in `employees/` directory

## How to Update a File

### Option 1: Use init.php (Recommended)
1. Add at the top of the file:
```php
<?php
require_once(__DIR__ . '/../includes/init.php'); // Adjust path as needed
```

2. Remove or comment out old includes:
```php
// OLD - Remove these:
// require("../includes/dbconnection.php");
// session_start();
// error_reporting(0);
```

### Option 2: Manual Update
1. Replace `mysql_*` functions with mysqli or use compatibility layer
2. Add error reporting
3. Use prepared statements for new code

## Security Improvements Made

1. **SQL Injection Prevention**: Login pages now use prepared statements
2. **Session Security**: Session regeneration on login, timeout tracking
3. **Error Handling**: Proper error logging instead of suppressing errors
4. **Password Security**: Utilities ready for password hashing (needs migration)

## Testing Checklist

After updating files, test:
- [ ] Login functionality works
- [ ] No PHP errors on pages
- [ ] Database queries execute correctly
- [ ] Sessions work properly
- [ ] No SQL injection vulnerabilities remain

## Notes

- The mysql compatibility layer (`mysql-compat.php`) allows old code to work but does NOT prevent SQL injection
- Gradually replace old mysql_* calls with prepared statements
- Update database connection files to use the main `includes/dbconnection.php`
- All files should include error reporting during development

## Priority Order

1. **High Priority**: Login pages, payment pages, authentication
2. **Medium Priority**: Dashboard pages, data display pages
3. **Low Priority**: Report pages, utility pages

## Getting Help

If you encounter errors:
1. Check that `includes/init.php` is included
2. Verify database connection works
3. Check PHP error logs
4. Use `show-errors.php` page to diagnose issues

