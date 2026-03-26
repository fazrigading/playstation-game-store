# AGENTS.md - PlayStation Game Store

## Project Overview

This is a vanilla PHP e-commerce application for a PlayStation game store. It uses:

- **Language**: PHP (native, no framework)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript (vanilla)
- **Server**: Apache/Nginx with PHP

## Commands

### Running the Application

```bash
# Start a local PHP server (PHP 8.0+)
php -S localhost:8000
# Or use XAMPP/WAMP - place project in htdocs/www directory
```

### Database Setup

```bash
# Import the database schema
mysql -u root -p playstation_game_store < db/playstation_game_store.sql
```

### No Build/Lint/Tests

## This project has no automated testing, linting, or build pipeline. It's a vanilla PHP application from 2022

## Code Style Guidelines

### General Principles

- Write clean, readable code over clever code
- Use meaningful variable and function names
- Keep functions focused and single-purpose
- Comment complex logic, not obvious code

### PHP Style Conventions

#### File Structure

- Use `.php` extension for all PHP files
- Put PHP logic at the top, HTML output below
- Use `<?php` opening tag (not short `<?`)
- Always include closing `?>` at end of files with HTML

#### Naming Conventions

```php
// Functions: camelCase
function getUserData($userId) { }
// Variables: camelCase
$userName = "john";
// Constants: SCREAMING_SNAKE_CASE
define('SITE_ROOT', '/var/www/html');
// Classes (if used): PascalCase
class UserController { }
// SQL tables: snake_case
$query = "SELECT * FROM user_profiles";
```

#### Formatting

```php
// Indent with 4 spaces (not tabs)
// Opening brace on same line for functions/classes
function myFunction($param) {
    // 4 spaces indent
}
// Control structures - braces always required
if ($condition) {
    // code
} else {
    // code
}
// Use spaces around operators
$sum = $a + $b;
$isValid = ($value === true);
// Use semicolons - don't omit them
echo "Hello";
```

#### Database Operations

```php
// Always use prepared statements for user input
$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
// Escape user input with mysqli_real_escape_string
$username = mysqli_real_escape_string($db, $_POST['username']);
// Use mysqli_report for error handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
```

#### Error Handling

```php
// Use try-catch for database operations
try {
    $result = mysqli_query($db, $query);
} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());
    echo "An error occurred. Please try again.";
    exit;
}
// Validate all user input
if (empty($_POST['email'])) {
    echo "Email is required";
    exit;
}
// Use htmlspecialchars for output escaping
echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');
```

#### Security

- Never trust user input - always validate and sanitize
- Use password_hash() and password_verify() for passwords
- Use prepared statements for all SQL queries
- Escape output with htmlspecialchars
- Set secure cookie parameters (httponly, secure)
- CSRF tokens for forms (implement if adding new features)
- Input validation on both client AND server side

#### Session Management

```php
// Start sessions at the very top of files
session_start();
// Use session_regenerate_id on login
session_regenerate_id(true);
// Clear session on logout
$_SESSION = [];
session_destroy();
```

### SQL Conventions

- Keywords in UPPERCASE: SELECT, FROM, WHERE, etc.
- Table names in snake_case: user_profiles, order_items
- Use explicit column lists, avoid SELECT \*
- Use meaningful table aliases

### HTML/CSS Style

- Use semantic HTML5 elements
- Keep CSS in external files or style tags
- Use meaningful class names (BEM-like: block\_\_element--modifier)
- Inline styles only for quick prototyping

### JavaScript

- Use modern ES6+ syntax
- Put scripts at end of body or use defer
- Use const/let instead of var

---

## Architecture

### Folder Structure

```text
/                      # Root - main pages (index, catalog, detail, etc.)
/admin/                # Admin panel (users, products, history)
/admin/users/          # User CRUD operations
/admin/products/       # Product CRUD operations
/admin/history/        # Purchase history
/components/           # Reusable components (header, footer)
/db/                  # Database schema
/payment/             # Payment/cart handling
/resources/           # Static assets (images, etc.)
config.php            # Database connection and helper functions
```

### Key Files

- `config.php` - Database connection, helper functions (query, login, register, etc.)
- `auth.php` - Authentication handling
- `index.php` - Homepage
- `catalog.php` - Product catalog with filtering

### Database

- MySQL database: `playstation_game_store`
- Uses mysqli extension
- Connection on localhost:3306, user: root, no password (dev only)

---

## Adding New Features

### New Page

1. Create PHP file in root or appropriate subdirectory
2. Include header component
3. Write HTML content with inline PHP for dynamic data
4. Use query() function from config.php for database access

### New Database Table

1. Add SQL to db/playstation_game_store.sql
2. Create helper functions in config.php
3. Use prepared statements in code

### New Admin Panel

1. Create directory under /admin/
2. Create index.php for listing
3. Add create.php, update.php, delete.php as needed

---

## Important Notes

1. **No Tests**: This project has no automated tests. When adding features, manual testing is required.
2. **Security Issues**: This is a 2022 student project with known issues:
   - Some SQL injection vulnerabilities (use prepared statements)
   - Cookie-based auth with limited security
   - No CSRF protection
3. **Database Password**: The MySQL connection uses empty password for root. Change for production.
4. **Timezone**: Code uses Asia/Makassar (WITA). Adjust as needed.
