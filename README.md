## Overview
Lightweight PHP/MySQL demo that mimics a portion of the my.gov.uz document portal. It includes a public-facing landing page and a simple admin area for creating and downloading employee income/work history certificates. PDFs and QR codes are generated server-side using bundled libraries.

## Tech Stack
- PHP 7+/8+, MySQL/MariaDB
- Bootstrap, jQuery (static assets in `assets/` and `client/`)
- mPDF (in `vendor/`) for PDF rendering
- phpqrcode (in `qr/`) for QR code generation

## Project Layout (high level)
- `index.php` — static landing/shell copied from my.gov.uz.
- `Admin/` — admin UI (login, new certificate form, editing lists).
- `mysqli_connect.php` — database connection helper (update credentials here).
- `mygov.sql` — database schema and seed data.
- `pdf.php`, `pdff.php`, `qr*/` — PDF/QR helpers and cached artifacts.
- `assets/`, `client/`, `css/`, `images/`, `vendors/` — static styles/scripts/media.

## Getting Started
1) Requirements: PHP 7.4+ (CLI), MySQL 5.7+/MariaDB 10.4+.  
2) Database: create a database (default name `mygov`), then import `mygov.sql`.  
3) Configure DB: set host/user/password/db name in `mysqli_connect.php`.  
4) Serve: from the repo root, run `php -S localhost:8000` and open `http://localhost:8000`.  
5) Admin: visit `/Admin/` to log in; create a user record in the `admin` table if none exists.

## Docker (production-like)
This repo includes a production-friendly `Dockerfile` (PHP 8.2 + Apache + opcache) and a `docker-compose.yml` (app + MariaDB + volumes + healthchecks).

1) Configure environment:
- Copy `env.example` to `.env` (recommended) and change the passwords.
- If you cannot/won't use `.env`, you can keep `env.example` and `docker-compose.yml` will read it via `env_file`.

2) Start:
- Run `docker compose up -d --build`
- Open `http://localhost:8080`

3) Database initialization:
- On first run, MariaDB will import `mygov.sql` automatically.
- Data is persisted in the `db_data` volume.

### Environment variables
The app reads DB credentials from env (see `mysqli_connect.php`):
- `MYSQL_HOST` (default `localhost`)
- `MYSQL_DATABASE` (default `mygov`)
- `MYSQL_USER` (default `root`)
- `MYSQL_PASSWORD` (default empty)

## Notes
- Credentials are checked with plain SQL; change the default admin password after import and avoid exposing this demo publicly without hardening.
- Temporary/QR cache output is stored under `temp/` and `qr/cache/`; ensure the web user can write there if you regenerate assets.
- Vendor libraries are already committed; Composer install is optional unless you want to refresh dependencies.
- **`.gitignore`** is included to prevent committing sensitive files (`.env`), generated cache files (`cache/`, `temp/`, `qr/cache/`), user uploads (`uploude/`), and IDE/OS files. Always review `.gitignore` before committing.

## Common Tasks
- Add a certificate: log in via `/Admin/`, fill the “Yangi Hujjat qo'shish” form, submit to generate the record/PDF.
- Edit existing: use the edit pages in `Admin/` (e.g., `edit.php`, `editt.php`) to adjust stored data.
- Regenerate PDFs/QR: run through the admin flows or call the relevant `pdf*.php` scripts after updating data.
