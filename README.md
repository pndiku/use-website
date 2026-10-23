# Uganda Securities Exchange Platform

The public website and content management dashboard for the Uganda Securities Exchange (USE), built on Laravel 13.

<p align="center">
  <img src="images/screenshot.png" alt="Uganda Securities Exchange Homepage" style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
</p>

## Features

- **Public website**: homepage, listed securities, market statistics, news, events, annual reports, regulations, SCD forms and rules, and investor information pages
- **Admin dashboard** (`/manage`): manage news, events, securities, carousel slides, menus, site settings, documents, file uploads and users
- **Authentication**: email and password, or Google sign-in for existing accounts
- **Market data**: live delayed prices proxied from `scd.use.or.ug`

## Requirements

| Component  | Version                                  |
|------------|------------------------------------------|
| PHP        | 8.3 or newer, with Laravel's standard extensions plus `pdo_mysql`, `curl` and `fileinfo` |
| Database   | MySQL 8 (or MariaDB 10.6+, see [Database](#database)) |
| Web server | Apache with `mod_rewrite`, or Nginx with PHP-FPM |
| Composer   | Only needed to change dependencies; `app/vendor/` is committed |

## Repository Layout

The repository root is the web root. Requests for pages go through `index.php`, which loads the Laravel application from `app/`.

```
.
├── index.php        # Front controller: boots the Laravel app in app/
├── .htaccess        # Apache rewrites; blocks app/, dotfiles and SQL dumps
├── css/             # Static stylesheets
├── images/          # Public images and image uploads
├── uploads/         # Document uploads (PDF, Office files, ...)
├── use_db.sql       # Full database schema and data (MySQL dump)
├── use.sql          # Older, partial dump
├── migrate.sql      # One-off SQL migrations
└── app/             # Laravel application (never served directly)
    ├── app/         # Controllers, models, middleware
    ├── config/
    ├── resources/   # Blade views
    ├── routes/web.php
    ├── tests/       # Feature tests
    └── vendor/      # Composer dependencies (committed)
```

`images/` and `uploads/` each contain an `.htaccess` that stops scripts from running there.

## Local Setup

1. **Clone the repository**

   ```bash
   git clone <repository-url> use-exchange
   cd use-exchange
   ```

2. **Create the environment file**

   ```bash
   cp .env.example app/.env
   cd app
   php artisan key:generate
   ```

   Then set the database settings in `app/.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=use_db
   DB_USERNAME=use_admin
   DB_PASSWORD=your_secure_password
   ```

3. **Load the database** (see [Database](#database))

4. **Create an admin user**

   ```bash
   cd app
   php artisan tinker --execute="\App\Models\User::create(['name' => 'Site Admin', 'email' => 'you@example.com', 'password' => bcrypt('choose-a-strong-password'), 'role' => 'Admin', 'status' => 'Active']);"
   ```

5. **Serve the site** with Apache or Nginx pointed at the repository root (see [Deployment](#deployment)).
   `php artisan serve` is not suitable: it serves `app/public/` and does not see the root `css/`, `images/` and `uploads/` folders.

6. Open the site and sign in at `/login`. The admin dashboard is at `/manage`.

## Database

The schema lives in `use_db.sql`, a MySQL dump of the production database. The Laravel migrations in `app/database/migrations` do **not** match it (for example, the app's user table is `user`, not `users`), so load the dump instead of running `php artisan migrate`.

```bash
mysql -u root -p -e "CREATE DATABASE use_db"
mysql -u root -p use_db < use_db.sql
```

On MariaDB, convert MySQL 8's collation while loading:

```bash
sed 's/utf8mb4_0900_ai_ci/utf8mb4_unicode_ci/g' use_db.sql | mysql -u root -p use_db
```

`use_db.sql` contains real user accounts. Keep the repository private.

## Deployment

1. Install PHP 8.3+ and point the web server's document root at the repository root.
2. Create `app/.env` as in [Local Setup](#local-setup), with production values:

   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://your-domain
   ```

   `APP_DEBUG` must be `false`. The committed `vendor/` includes development tools (Ignition) that expose extra endpoints when debug mode is on.

3. Make the writable directories writable by the web server user:

   ```bash
   chown -R www-data:www-data app/storage app/bootstrap/cache images uploads
   chmod -R 775 app/storage app/bootstrap/cache images uploads
   ```

4. After each deploy, clear cached views and config:

   ```bash
   cd app
   php artisan config:clear
   php artisan view:clear
   ```

### Apache

The root `.htaccess` handles routing and access rules. The virtual host only needs to allow it:

```apache
<VirtualHost *:80>
    ServerName example.org
    DocumentRoot /var/www/use-exchange

    <Directory /var/www/use-exchange>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

```bash
sudo a2enmod rewrite headers
sudo systemctl reload apache2
```

### Nginx

Nginx ignores `.htaccess`, so the same rules are repeated here:

```nginx
server {
    listen 80;
    server_name example.org;
    root /var/www/use-exchange;
    index index.php;

    # Never serve the Laravel app, dotfiles or database dumps
    location ^~ /app/ { deny all; }
    location ~ /\.(?!well-known) { deny all; }
    location ~* \.(sql|md|lock|json|log|example)$ { deny all; }

    # Uploaded files are served as static files only
    location ~* ^/(uploads|images)/.*\.(php\d?|phtml|phar|html?|svg)$ { deny all; }

    location / {
        try_files $uri /index.php?$query_string;
    }

    location = /index.php {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root/index.php;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
    }

    # No other PHP file is an entry point
    location ~ \.php$ { return 404; }
}
```

### Check the deployment

These should all return **403**:

```bash
for path in /use_db.sql /app/.env /app/storage/logs/laravel.log /.git/config; do
  curl -s -o /dev/null -w "%{http_code} $path\n" "https://your-domain$path"
done
```

## Authentication and Access

- **Admins**: users with `role = 'Admin'` in the `user` table can open `/manage` and every `/admin/*` route. Other signed-in users get a 403.
- **Accounts**: there is no public sign-up. Admins create users from the dashboard (or with the command in [Local Setup](#local-setup)).
- **Google sign-in** (`/auth/google`): only works for an email address that already has an account. Configure it in `app/.env`:

  ```env
  GOOGLE_CLIENT_ID=...
  GOOGLE_CLIENT_SECRET=...
  GOOGLE_REDIRECT_URI=https://your-domain/auth/google/callback
  ```

- **Logout**: `POST /logout` (the dashboard's logout button).
- **Rate limits**: `/login` and `/subscribe` allow 10 requests per minute per client.

## File Uploads

Admins upload files at `/admin/files`. Images are saved to `images/`, everything else to `uploads/`, under random file names.

- **Allowed types**: jpg, jpeg, png, gif, webp, ico, pdf, doc, docx, xls, xlsx, ppt, pptx, csv, txt, mp4, mp3, zip. The list is `ALLOWED_EXTENSIONS` in `app/app/Http/Controllers/FileController.php`. Never add script or HTML types (php, phtml, html, svg): uploads are served from the web root.
- **Size limit**: 70 MB.

## Running Tests

The feature tests cover every public page, sign-in and logout, admin access rules, create/edit/delete for each admin section, and file uploads. They run against a MySQL or MariaDB database loaded from `use_db.sql`, inside transactions, so they leave no data behind.

```bash
mysql -u root -p -e "CREATE DATABASE use_test"
mysql -u root -p use_test < use_db.sql
cd app
DB_USERNAME=<user> DB_PASSWORD=<password> vendor/bin/phpunit
```

The test database name (`use_test`) is set in `app/phpunit.xml`.

## Updating Dependencies

`app/vendor/` is committed so the site can be deployed by copying files. After changing dependencies, commit `composer.json`, `composer.lock` and `vendor/` together:

```bash
cd app
composer update
composer audit
vendor/bin/phpunit
```

`composer.json` pins the PHP platform to 8.3 (`config.platform.php`) so that updates never pull in packages that need a newer PHP than production runs. Change it when the server's PHP version changes.

## Known Issues

- `/next` returns a server error: its view expects menu data that the route does not provide.
- `/subscribe` writes to a `subscriptions` table that does not exist in `use_db.sql`, so newsletter sign-ups fail.

## License

Proprietary - Uganda Securities Exchange

## Support

For technical support or questions, contact duncanmudulo@gmail.com
