# Finder - Laravel Real Estate & Directory Script

Finder is a powerful and versatile Laravel-based Real Estate & Directory script designed for flexibility and ease of use. It follows modern web design standards and is built with Laravel and Vite.

## 🚀 Installation Guide

Follow these steps to set up the project on your local machine.

### 📋 Prerequisites

Before you begin, ensure you have the following installed:
- **PHP**: ^8.3
- **Composer**: ^2.9
- **Node.js**: ^24.0
- **Database**: MySQL, PostgreSQL, or SQLite

---

### 🛠️ Step 1: Clone the Repository

```bash
git clone https://github.com/pixeleyez/finder-laravel.git
cd finder-laravel
```

### 📦 Step 2: Install Dependencies

Install PHP dependencies using Composer:
```bash
composer install
```

Install frontend dependencies using npm:
```bash
npm install
```

### ⚙️ Step 3: Environment Setup

Copy the example environment file and configure your environment variables:
```bash
cp .env.example .env
```
*(On Windows, use `copy .env.example .env`)*

### 🔑 Step 4: Generate Application Key

```bash
php artisan key:generate
```

### 💾 Step 5: Database Configuration

1. Create a new database in your database manager (like phpMyAdmin or TablePlus).
2. Open the `.env` file and update the following fields with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=finder_laravel
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 🏁 Step 6: Run Migrations & Seeders

Run the migrations to create the database tables and seed them with initial data:
```bash
php artisan migrate --seed
```


### 🚀 Step 7: Start the Application

Run the Laravel & Vite development server:
```bash
composer run dev
```

The application will be accessible at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🏗️ Technologies Used

- **Framework**: [Laravel](https://laravel.com)
- **Frontend Build Tool**: [Vite](https://vitejs.dev)
- **Styling**: [Bootstrap 5](https://getbootstrap.com)
- **JavaScript**: Vanilla JS & Various Plugins (Swiper, GLightbox, etc.)

## 📄 License

Finder is a premium product. Please refer to your license agreement for usage terms.

---
Developed by **SRBThemes**
