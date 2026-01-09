# Route Names Guide

All routes in the MVC framework now have **names** instead of just patterns. This makes routes more maintainable and allows easy URL generation.

## Benefits

1. **Easy URL Generation**: Generate URLs by route name instead of hardcoding paths
2. **Better Maintenance**: Change route patterns without breaking URL generation
3. **Debugging**: Route names appear in 404 pages for easier debugging
4. **Type Safety**: Use route names in code instead of string literals

## Usage

### Defining Routes with Names

```php
// Syntax: $router->get('/pattern', 'Controller@method', 'route-name');
$router->get('/dashboard', 'Dashboard@index', 'dashboard');
$router->get('/list-of-active-students', 'ListOfActiveStudents@index', 'list-of-active-students');
```

### Generating URLs by Route Name

```php
// Get router instance (usually available in views/controllers)
global $router; // Make router available globally if needed

// Generate URL
$url = $router->url('dashboard');
// Returns: /member-area/mvc/index.php/dashboard

$url = $router->url('list-of-active-students');
// Returns: /member-area/mvc/index.php/list-of-active-students
```

### Available Route Names

All routes follow the pattern: route name = URL pattern (without leading slash)

**Examples:**
- `'dashboard'` → `/dashboard`
- `'list-of-active-students'` → `/list-of-active-students`
- `'admin-home'` → `/admin-home`
- `'parent-accounts'` → `/parent-accounts`

## Route Naming Convention

- Route names match the URL pattern (without leading slash)
- Use lowercase with hyphens: `list-of-active-students`
- Empty route (`/`) is named `'home'`
- Keep names descriptive and consistent

## 404 Pages

When a route is not found, the 404 page now shows:
- The requested URI
- All available routes with their **names** in brackets

Example:
```
Available Routes:
- GET /dashboard [dashboard]
- GET /list-of-active-students [list-of-active-students]
```

## Future Enhancements

You can extend this by:
1. Adding route groups with prefixes
2. Route middleware support
3. Route caching for performance
4. Helper functions for common routes

