# PlayStation Game Store

A vanilla PHP e-commerce application for a PlayStation game store. Built as a final project for Praktikum Web 2022 at Universitas Mulawarman.

## Overview

- **Backend**: PHP (native, no framework)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript (vanilla)

## Features

- Product catalog with categories (consoles, games, accessories)
- User authentication (login/register)
- Shopping cart
- Checkout and purchase history
- User profile management
- Admin panel (user management, product CRUD, purchase history)

## Getting Started

### Prerequisites

- PHP 8.0+
- MySQL
- Web server (Apache/Nginx) or PHP built-in server

### Installation

1. Clone the repository
2. Create the database:
   ```bash
   mysql -u root -p playstation_game_store < db/playstation_game_store.sql
   ```
3. Start the PHP server:
   ```bash
   php -S localhost:8000
   ```
4. Open `http://localhost:8000` in your browser

### Default Admin Account

- Username: `admin`
- Password: (set during initial setup or check database)

## Project Structure

```
/                    # Main pages (index, catalog, detail)
/admin/              # Admin panel
  /users/           # User CRUD
  /products/        # Product CRUD
  /history/         # Purchase history
/components/         # Reusable components
/db/                # Database schema
/payment/           # Cart & checkout
/resources/         # Static assets
config.php          # Database connection & helpers
```

## Contributors

- Risky Kurniawan (2009106050) - Back-end
- Fazri Rahmad Nor Gading (2009106031) - Front-end
- Alexander Januar Dienc Caesarea Andhika (2009106035) - Front-end

## License & Usage

Feel free to use this project for learning purposes. However, do not distribute or sell this code as your own. Always credit our work when referencing or using this project.

See [LICENSE](LICENSE) file.
