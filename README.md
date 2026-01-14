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

## Notes
- Credentials are checked with plain SQL; change the default admin password after import and avoid exposing this demo publicly without hardening.
- Temporary/QR cache output is stored under `temp/` and `qr/cache/`; ensure the web user can write there if you regenerate assets.
- Vendor libraries are already committed; Composer install is optional unless you want to refresh dependencies.

## Common Tasks
- Add a certificate: log in via `/Admin/`, fill the “Yangi Hujjat qo'shish” form, submit to generate the record/PDF.
- Edit existing: use the edit pages in `Admin/` (e.g., `edit.php`, `editt.php`) to adjust stored data.
- Regenerate PDFs/QR: run through the admin flows or call the relevant `pdf*.php` scripts after updating data.
