# Setecom — Local Setup Guide

This guide will walk you through setting up the **Setecom** project on your local computer using **Laragon**. It is written for junior developers who are just getting started with Laravel and Webpack (via Laravel Mix).

---

## 📋 Requirements

Before you start, make sure you have the following installed:

| Tool | Version | Download |
|------|---------|----------|
| [Laragon](https://laragon.org/download/) | Full (recommended) | laragon.org |
| [Node.js](https://nodejs.org/) | v14 or higher | nodejs.org |
| [Composer](https://getcomposer.org/) | v2 | getcomposer.org |
| Git | Latest | git-scm.com |

> **Tip:** Laragon already includes PHP, MySQL, and Apache. If you installed **Laragon Full**, you likely already have most of what you need!

---

## 🚀 Step-by-Step Setup

### Step 1 — Copy the Project into Laragon

1. Get the project ZIP file (it should be named something like `setecom.zip`).
2. Copy or move the ZIP file into the Laragon `www` folder:
   ```
   C:\laragon\www\
   ```
3. Right-click the ZIP file → **Extract Here** (using WinRAR, 7-Zip, or Windows built-in extractor).
4. Make sure the extracted folder is named **`setecom`** and is located at:
   ```
   C:\laragon\www\setecom\
   ```

> ⚠️ **Important:** The folder must be placed directly inside `C:\laragon\www\` and named exactly **`setecom`**. Otherwise Laragon won't be able to create the local URL correctly.

---

### Step 2 — Install PHP Dependencies (Composer)

This project uses PHP packages managed by **Composer**. Install them by running:

```bash
composer install
```

> This will read the `composer.json` file and download all the necessary PHP libraries into the `vendor/` folder. It may take a minute or two.

---

### Step 3 — Create the Environment File

Laravel uses a `.env` file to store environment settings like database credentials and app keys. Create yours by copying the example file:

```bash
cp .env.example .env
```

> **What is `.env`?** It's a configuration file that is NOT shared in Git (for security reasons). Each developer has their own copy.

---

### Step 4 — Generate the Application Key

Laravel requires a unique key to keep data secure. Generate it with:

```bash
php artisan key:generate
```

You will see a message like `Application key set successfully.` ✅

---

### Step 5 — Configure the Database

#### 5.1 — Create the Database in Laragon

> ⚠️ **Important:** The database **must** be named exactly **`setecom`**. Using a different name will prevent the project from connecting to the database and it will not work.

1. Open **Laragon** and click **Database** (or press `Ctrl+Alt+D`).
2. This opens **HeidiSQL** (a database client).
3. Right-click on the left panel → **Create New** → **Database**.
4. Name the database **`setecom`** (lowercase, exactly as written) and click **OK**.

#### 5.2 — Update the `.env` File

Open the `.env` file in your code editor and update the database section:

```env
APP_NAME=Setecom
APP_URL=http://setecom.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=setecom
DB_USERNAME=root
DB_PASSWORD=
```

> **Note:** Laragon's default MySQL user is `root` with an **empty password**. If you set a custom password during Laragon setup, enter it in `DB_PASSWORD`.

---

### Step 6 — Run the Database Migrations

Laravel uses **migrations** to create the database tables automatically. Run:

```bash
php artisan migrate
```

> **What is a migration?** Think of it as a version-controlled script that creates or modifies database tables. Each file in `database/migrations/` represents one change to the database structure.

If you also want to populate the database with initial sample data, run:

```bash
php artisan db:seed
```

---

### Step 7 — Install JavaScript Dependencies (npm)

This project uses **Laravel Mix** (which is built on top of **Webpack**) to compile CSS and JavaScript assets. First, install all Node.js packages:

```bash
npm install
```

> This will read the `package.json` file and download all required libraries into the `node_modules/` folder.

---

### Step 8 — Compile Frontend Assets

Now compile the CSS and JavaScript files so the project looks and works correctly in the browser.

#### For development (recommended while working locally):

```bash
npm run dev
```

#### To watch for changes automatically (great when you're actively editing files):

```bash
npm run watch
```

> **What does this do?** Laravel Mix reads `webpack.mix.js` and compiles SCSS files into `public/css/` and JavaScript files into `public/js/`. Without this step, the styles and scripts won't load correctly.

---

### Step 9 — Start the Local Server with Laragon

#### Option A — Automatic (Recommended)

Laragon detects projects in its `www` folder automatically. Simply:

1. Open **Laragon**.
2. Click **Start All** to start Apache and MySQL.
3. Open your browser and go to: **http://setecom.test**

> **Tip:** If `http://setecom.test` doesn't work, try clicking **Menu → Hosts → Add virtual host** in Laragon or restart Laragon after cloning the project.

#### Option B — Using Artisan (Alternative)

If you prefer to use Laravel's built-in server:

```bash
php artisan serve
```

Then open: **http://localhost:8000**

---

## 🗂️ Project Structure Overview

Here's a quick map of the most important folders to help you find your way around:

```
setecom/
├── app/              → PHP application logic (Models, Controllers, etc.)
├── config/           → Application configuration files
├── database/
│   ├── migrations/   → Database table definitions
│   └── seeders/      → Sample data for the database
├── public/           → Web root — compiled CSS/JS goes here
├── resources/
│   ├── sass/         → SCSS source files (compiled by Webpack)
│   ├── js/           → JavaScript source files
│   └── views/        → Blade template files (HTML)
├── routes/
│   ├── web.php       → Web routes (pages)
│   └── api.php       → API routes
├── webpack.mix.js    → Webpack / Laravel Mix configuration
├── .env              → Your local environment config (not in Git)
└── package.json      → Node.js dependencies
```

---

## ⚡ Quick Command Reference

| Command | What it does |
|---------|-------------|
| `composer install` | Install PHP dependencies |
| `php artisan key:generate` | Generate the app encryption key |
| `php artisan migrate` | Create database tables |
| `php artisan migrate:fresh` | Drop all tables and re-run migrations |
| `php artisan db:seed` | Populate the database with sample data |
| `npm install` | Install JavaScript dependencies |
| `npm run dev` | Compile assets once (development mode) |
| `npm run watch` | Compile assets and watch for changes |
| `npm run prod` | Compile assets for production (minified) |
| `php artisan serve` | Start a local development server |
| `php artisan tinker` | Open an interactive PHP console |

---

## 🐛 Common Issues & Solutions

### ❌ `php artisan` is not recognized
Make sure Laragon is running and that PHP is available in your terminal. In the Laragon terminal, PHP should already be in the PATH. Try reopening the Laragon terminal.

### ❌ Page shows a blank screen or 500 error
- Make sure you ran `php artisan key:generate`.
- Check that the `.env` file exists (not just `.env.example`).
- Check the log file at `storage/logs/laravel.log` for details.

### ❌ CSS/JS styles are missing
- Make sure you ran `npm run dev` or `npm run watch`.
- Check that the `public/css/app.css` and `public/js/` files exist after compilation.

### ❌ Database connection error
- Make sure Laragon's MySQL service is running (green light in Laragon).
- Verify that `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env` are correct.
- Confirm the database `setecom` exists in HeidiSQL.

### ❌ `npm install` or `npm run dev` fails
- Make sure Node.js v14 or higher is installed: run `node -v` to check.
- Try deleting `node_modules/` and running `npm install` again.

---

## 📄 License

This project is private and intended for internal use only.
