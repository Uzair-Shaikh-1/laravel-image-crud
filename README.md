# Laravel Product Management CRUD

A responsive product management application built with Laravel, Blade, CSS, and MySQL. The application allows users to create, view, edit, and delete products, including uploading product images.

## Features

- Create new products
- View all products in a responsive card layout
- Edit existing product details
- Delete products and their associated images
- Upload and display product images
- Form validation with error messages
- Success notifications after operations
- Responsive design for desktop, tablet, and mobile
- Shared Blade layout and separate CSS stylesheet

## Tech Stack

- **Backend:** Laravel, PHP
- **Frontend:** Blade, HTML, CSS
- **Database:** MySQL
- **File Storage:** Laravel public storage
- **Version Control:** Git and GitHub

## Requirements

Make sure you have the following installed:

- PHP version compatible with your Laravel version
- Composer
- MySQL
- Node.js and npm only if your project uses Vite or other frontend build tools

## Installation and Setup

### 1. Clone the repository

```bash
git clone YOUR_REPOSITORY_URL
cd YOUR_PROJECT_FOLDER
```

Replace the repository URL and folder name with your actual values.

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure environment variables

Create your local environment file:

```bash
cp .env.example .env
```

On Windows, you can also copy `.env.example` manually and rename the copy to `.env`.

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure the database

Create a MySQL database using phpMyAdmin or your preferred MySQL client.

Update the database settings in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Replace the example values with your own local database credentials.

### 5. Run migrations

```bash
php artisan migrate
```

This creates the database tables required by the application.

### 6. Set up image storage

Run the following command to make publicly stored images accessible:

```bash
php artisan storage:link
```

### 7. Start the development server

```bash
php artisan serve
```

Open the application at:

http://127.0.0.1:8000

## Project Structure

```text
project/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ProductController.php
│   └── Models/
│       └── Product.php
├── database/
│   └── migrations/
├── public/
│   ├── css/
│   │   └── app.css
│   └── storage/
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── products/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── edit.blade.php
├── routes/
│   └── web.php
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## How It Works

- **Create:** Submit a form to save product details and an optional image.
- **Read:** Retrieve and display products from the MySQL database.
- **Update:** Edit an existing product and optionally replace its image.
- **Delete:** Remove a product and its associated image from storage.

Laravel handles routing, validation, database operations, and file storage, while Blade renders the pages and CSS provides the responsive interface.

## Learning Objectives

This project demonstrates practical experience with:

- Laravel routing and controllers
- Eloquent ORM and database migrations
- Blade templates and reusable layouts
- Form validation and CSRF protection
- File uploads and public storage
- CRUD operations
- Responsive CSS and Git-based project management

## Future Improvements

- Search and filter products
- Pagination
- Product categories
- Authentication and authorization
- Automated tests

## License

This project is available for learning and portfolio purposes. Add a license file if you intend to distribute it under a specific open-source license.
